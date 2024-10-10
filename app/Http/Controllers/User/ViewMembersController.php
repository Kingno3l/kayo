<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ViewMembersController extends Controller
{
    public function allMembers(){
        // Fetch all users where role is 'user'
        $allUser = User::where('role', 'user')->latest()->get();

        // Define a map of countries to ISO codes
        $countryCodes = config('country_codes');

        // Pass the $allUser and $countryCodes to the view
        return view('user.all_users', compact('allUser', 'countryCodes'));
    }

    public function memberInfoDetails($id)
    {
        // Retrieve the member details using the provided ID
        $member = User::find($id);

        // Check if the member exists
        if (!$member) {

            $notification = [
                'message' => 'Member not found!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        // Return a view with the member's details
        return view('user.member_index', compact('member'));
    }

    public function showInfoProfile($id)
    {
        $profileData = User::findOrFail($id);
        $socials = $profileData->socials()->first(); // Retrieve the first social record

        return view('user.member_profile', compact('profileData', 'socials'));
    }
}
