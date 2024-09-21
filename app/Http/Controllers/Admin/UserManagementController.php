<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagementController extends Controller
{
    public function allUsers()
    {
        // Fetch all users where role is 'user'
        $allUser = User::where('role', 'user')->latest()->get();

        // Define a map of countries to ISO codes
        $countryCodes = config('country_codes');

        // Pass the $allUser and $countryCodes to the view
        return view('admin.user.all_user', compact('allUser', 'countryCodes'));
    }


    public function updateUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0);

        // Find the user
        $user = User::find($userId);

        if ($user) {
            $user->status = $isChecked;
            $user->save();

            // Success notification
            $notification = [
                'message' => 'User status updated successfully!',
                'alert-type' => 'success'
            ];
        } else {
            // Error notification if user not found
            $notification = [
                'message' => 'User not found!',
                'alert-type' => 'error'
            ];
        }

        // Return the notification as JSON response
        return response()->json($notification);
    }

    public function completedRegisteredUsers(){

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
            // Ensure the user has at least one payment
            ->whereHas('payments')
            // Ensure the user has at least one academic qualification
            ->whereHas('academicQualifications')
            // Ensure the user has at least one employment history
            ->whereHas('employmentHistory')
            // Ensure the user has at least one next of kin and referee
            ->whereHas('nextOfKinAndReferee')
            // Ensure the user has at least one social media profile
            ->whereHas('socials')
            ->with([
                'payments',
                'academicQualifications',
                'employmentHistory',
                'nextOfKinAndReferee',
                'socials'
            ])
            ->get();

        $countryCodes = config('country_codes');

        return view('admin.user.completed_registered_users', compact('completedUsers', 'countryCodes'));
    }

}
