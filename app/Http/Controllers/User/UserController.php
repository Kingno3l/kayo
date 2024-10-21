<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Payment\Payment;

use App\Models\ProfileManagement\Social;


class UserController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        $currentYear = date('Y');
        $hasPaidDues = Payment::where('user_id', $id)
            ->whereYear('created_at', $currentYear)
            ->exists();

        return view('user.index', compact('profileData', 'hasPaidDues'));
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $socials = Social::where('user_id', $id)->first(); // Retrieve the socials for the user

        return view('user.profile', compact('profileData', 'socials'));
    }

    public function userProfileEdit()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $socials = Social::where('user_id', $id)->first(); // Retrieve the socials for the user

        return view('user.edit_profile', compact('profileData', 'socials'));
    }

    public function showCompleteProfileForm(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $socials = Social::where('user_id', $id)->first(); // Retrieve the socials for the user

        return view('user.complete_profile', compact('profileData', 'socials'));
    }

    // public function userProfileSave(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $data = User::find($id);
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->education = $request->education;
    //     $data->position = $request->position;
    //     $data->employer = $request->employer;
    //     $data->short_bio = $request->short_bio;
    //     $data->country = $request->country;
    //     $data->phone = $request->phone;

    //     $data->country_code = $request->input('country_code');


    //     if ($request->file('photo')) {
    //         $file = $request->file('photo');
    //         @unlink(public_path('uploads/user_images/' . $data->photo));
    //         $filename = date('YmdHi') . $file->getClientOriginalName();
    //         $file->move(public_path('uploads/user_images'), $filename);
    //         $data['photo'] = $filename;
    //     }

    //     $data->save();

    //     $notification = array(
    //         'message' => 'User Profile Updated Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }

//     public function userProfilecomplete(Request $request)
// {
//     $id = Auth::user()->id;
//     $data = User::find($id);

//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255',
//         'education' => 'required|string|max:255',
//         'position' => 'required|string|max:255',
//         'employer' => 'required|string|max:255',
//         'country' => 'required|string|max:255',
//         'phone' => 'required|string|max:20',
//         'marital_status' => 'required|string|max:20',
//         'gender' => 'required|string|max:10',
//         'date_of_birth' => 'required|date',
//         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
//     ]);

//     // Updating user information from request
//     $data->name = $request->name;
//     $data->email = $request->email;
//     $data->education = $request->education;
//     $data->position = $request->position;
//     $data->employer = $request->employer;
//     $data->country = $request->country;
//     $data->phone = $request->phone;
//     $data->marital_status = $request->marital_status;
//     $data->gender = $request->gender;
//     $data->date_of_birth = $request->date_of_birth;

//     // Ensure that 'country_code' is used to generate the registration number
//     $country = $request->country;
//     $countryCodes = config('country_codes');

//     $countryCode = isset($countryCodes[$country]) ? $countryCodes[$country] : 'XX'; // Default to 'XX' if country not found

//     if (is_null($data->registration_number)) {
//         $rankingNumber = User::where('country', $country)->whereNotNull('registration_number')->count() + 1;
//         $formattedRankingNumber = str_pad($rankingNumber, 3, '0', STR_PAD_LEFT);  
//         $yearJoined = date('y');  

//         $data->registration_number = "YIP-{$countryCode}-{$formattedRankingNumber}-{$yearJoined}";
//     }

//     if ($request->file('photo')) {
//         $file = $request->file('photo');
//         @unlink(public_path('uploads/user_images/' . $data->photo));
//         $filename = date('YmdHi') . $file->getClientOriginalName();
//         $file->move(public_path('uploads/user_images'), $filename);
//         $data->photo = $filename;
//     }

//     try {
//         $data->save();
//     } catch (\Exception $e) {
//         return back()->withErrors(['error' => 'An error occurred while saving.']);
//     }

//     $notification = [
//         'message' => 'User Profile Saved Successfully.',
//         'alert-type' => 'success'
//     ];
    
//     return redirect()->route('dashboard')->with($notification);
// }

    public function userProfilecomplete(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Validation rules, including the required country field
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'education' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'employer' => 'required|string|max:255',
            'country' => 'required|string|max:255',  // Country name
            'country_code' => 'required|string|max:10',  // Country code
            'phone' => 'required|string|max:20',
            'marital_status' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
        ]);

        // Update user information with request data
        $data->name = $request->name;
        $data->email = $request->email;
        $data->education = $request->education;
        $data->position = $request->position;
        $data->employer = $request->employer;
        $data->country = $request->country;  // Save selected country name to the database
        $data->country_code = strtoupper($request->country_code);  // Convert to uppercase and save country code to the database
        $data->phone = $request->phone;
        $data->marital_status = $request->marital_status;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;

        // Handle country code logic for the registration number
        $country = $request->country;
        $countryCode = strtoupper($request->country_code);  // Ensure country code is in uppercase

        if (is_null($data->registration_number)) {
            $rankingNumber = User::where('country', $country)->whereNotNull('registration_number')->count() + 1;
            $formattedRankingNumber = str_pad($rankingNumber, 3, '0', STR_PAD_LEFT);
            $yearJoined = date('y');
            $data->registration_number = "YIP-{$countryCode}-{$formattedRankingNumber}-{$yearJoined}";
        }

        // Handle profile photo upload
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/user_images/' . $data->photo)); // Remove old photo if exists
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $filename);
            $data->photo = $filename;
        }

        // Save the updated user data
        try {
            $data->save();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while saving.']);
        }

        // Notify user of success and redirect
        $notification = [
            'message' => 'User Profile Saved Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard')->with($notification);
    }





    public function userProfileSave(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Updating user information from request
        $data->name = $request->name;
        $data->email = $request->email;
        $data->education = $request->education;
        $data->position = $request->position;
        $data->employer = $request->employer;
        $data->current_employer_name = $request->current_employer_name;
        $data->current_employer_date = $request->current_employer_date;
        $data->previous_employer_name = $request->previous_employer_name;
        $data->previous_employer_start_date = $request->previous_employer_start_date;
        $data->previous_employer_end_date = $request->previous_employer_end_date;
        $data->short_bio = $request->short_bio;
        $data->country = $request->country;
        $data->phone = $request->phone;
        $data->marital_status = $request->marital_status;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;

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



    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
        ;
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.change_password', compact('profileData'));
    }

    public function userPasswordUpdate(Request $request)
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

    public function disabled(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('user.disabled', compact('profileData'));
    }
    
}
