<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfileManagement\Document;


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

    // public function showAcademicQualifications($id)
    // {
    //     $profileData = User::findOrFail($id);
    //     $socials = $profileData->socials()->first(); // Retrieve the first social record

    //     $academicQualifications = $profileData->academicQualifications;
    //     return view('admin.member.academic_qualifications', compact('profileData', 'academicQualifications', 'socials'));
    // }

    public function showAcademicQualifications($id)
    {
        $profileData = User::findOrFail($id);
        $socials = $profileData->socials()->first(); // Retrieve the first social record

        $academicQualifications = $profileData->academicQualifications;

        // Fetch uploaded files related to academic qualifications
        $uploadedFiles = Document::where('user_id', $id)
            ->where('documentable_type', 'academic qualification')
            ->get();

        return view('admin.member.academic_qualifications', compact('profileData', 'academicQualifications', 'socials', 'uploadedFiles'));
    }




    public function showEmploymentHistory($id)
    {
        $profileData = User::findOrFail($id);
        $employmentHistory = $profileData->employmentHistory;
        return view('admin.member.employment_history', compact('profileData', 'employmentHistory'));
    }

    public function showNextOfKin($id)
    {
        $profileData = User::findOrFail($id);
        $nextOfKin = $profileData->nextOfKin; 
        return view('admin.member.next_of_kin_referee', compact('profileData', 'nextOfKin'));
    }
}
