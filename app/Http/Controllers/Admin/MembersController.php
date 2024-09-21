<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class MembersController extends Controller
{
    public function memberDetails($id)
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
        return view('admin.member.index', compact('member'));
    }

    public function showProfile($id)
    {
        $profileData = User::findOrFail($id);
        $socials = $profileData->socials()->first(); // Retrieve the first social record

        return view('admin.member.profile', compact('profileData', 'socials'));
    }

    public function showAcademicQualifications($id)
    {
        $member = User::findOrFail($id);
        $academicQualifications = $member->academicQualifications; 
        return view('admin.member.academic_qualifications', compact('member', 'academicQualifications'));
    }

    public function showEmploymentHistory($id)
    {
        $member = User::findOrFail($id);
        $employmentHistory = $member->employmentHistory;
        return view('admin.member.employment_history', compact('member', 'employmentHistory'));
    }

    public function showNextOfKin($id)
    {
        $member = User::findOrFail($id);
        $nextOfKin = $member->nextOfKin; 
        return view('admin.member.next_of_kin_referee', compact('member', 'nextOfKin'));
    }
}
