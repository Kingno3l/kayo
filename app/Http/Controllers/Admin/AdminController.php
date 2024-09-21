<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;



class AdminController extends Controller
{
    public function adminDashboard(){
        $completedUsers = User::whereNotNull('name')
            ->whereNotNull('email')
            ->whereNotNull('photo')
            ->whereNotNull('phone')
            ->whereNotNull('country')
            ->whereNotNull('country_code')
            ->whereNotNull('registration_number')
            ->whereNotNull('marital_status')
            ->whereNotNull('gender')
            ->whereNotNull('date_of_birth')
            ->whereNotNull('employer')
            ->whereNotNull('position')
            ->whereNotNull('education')
            ->whereNotNull('short_bio')
            ->whereHas('payments')
            ->whereHas('academicQualifications')
            ->whereHas('employmentHistory')
            ->whereHas('nextOfKinAndReferee')
            ->whereHas('socials')
            ->with([
                'payments',
                'academicQualifications',
                'employmentHistory',
                'nextOfKinAndReferee',
                'socials'
            ])
            ->get();

        // Calculate total number of completed users
        $totalCompletedUsers = $completedUsers->count();

        // Total number of all registered users
        $totalRegisteredUsers = User::count();

        // Get the current year
        $currentYear = Carbon::now()->year;

        // Fetch users who have paid dues for the current year
        $paidDuesUsers = User::whereHas('payments', function ($query) use ($currentYear) {
            $query->whereYear('created_at', $currentYear);
        })->get();

        // Total number of users who have paid dues
        $totalPaidDuesUsers = $paidDuesUsers->count();


        return view('admin.index', compact('totalCompletedUsers', 'totalRegisteredUsers', 'totalPaidDuesUsers'));	
    }

    public function adminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function adminProfileSave(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Updating user information from request
        $data->name = $request->name;
        $data->email = $request->email;
        $data->education = $request->education;
        $data->position = $request->position;
        $data->employer = $request->employer;
        $data->short_bio = $request->short_bio;
        $data->country = $request->country;
        $data->phone = $request->phone;

        // Ensure that 'country_code' is used to generate the registration number
        $country = $request->country;

        // Define a map of countries to ISO codes
        $countryCodes = config('country_codes');


        // Check if the country is in the map
        $countryCode = isset($countryCodes[$country]) ? $countryCodes[$country] : 'XX'; // Default to 'XX' if country not found

        // Generate the registration number only if it doesn't already exist
        if (is_null($data->registration_number)) {
            // Ranking number: count users from the same country who already have a registration number
            $rankingNumber = User::where('country', $country)
                ->whereNotNull('registration_number')
                ->count() + 1;

            // Format the ranking number to 3 digits
            $formattedRankingNumber = str_pad($rankingNumber, 3, '0', STR_PAD_LEFT);  // E.g., '001'
            $yearJoined = date('y');  // Last two digits of the current year (e.g., '21' for 2021)

            // Generate the registration number
            $data->registration_number = "YIP-{$countryCode}-{$formattedRankingNumber}-{$yearJoined}";
        }

        // If a photo is uploaded, handle it
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $filename);
            $data->photo = $filename;
        }

        // Save the updated data
        $data->save();

        // Return the generated registration number for debugging
        // return $data->registration_number;

        // Optionally, if everything works, you can remove the debug return and use this notification:

        $notification = array(
            'message' => 'User Profile Updated Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
        ;
    }

    public function adminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function adminPasswordUpdate(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Did Not Match',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }



        //update password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
