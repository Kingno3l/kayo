<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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

    public function completedRegisteredUsers()
    {

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

    public function associateMembers()
    {
        // Calculate the minimum date of birth for users aged 40 years and above
        $minDateOfBirth = Carbon::now()->subYears(40)->format('Y-m-d');

        // Retrieve users with date_of_birth less than or equal to $minDateOfBirth
        $users = DB::table('users')
            ->where('date_of_birth', '<=', $minDateOfBirth)
            ->get();

        // Return the view with the list of associate members
        return view('admin.member.view_associate_member', compact('users'));
    }

    // public function studentMembers()
    // {
    //     // Get the current year
    //     $currentYear = Carbon::now()->year;

    //     // Retrieve users whose graduation year is greater than the current year
    //     $users = DB::table('users')
    //         ->join('academic_qualifications', 'users.id', '=', 'academic_qualifications.user_id')
    //         ->where('academic_qualifications.graduation_year', '>', $currentYear)
    //         ->select('users.*', 'academic_qualifications.graduation_year')
    //         ->get();

    //     // Return the view with the list of student members
    //     return view('admin.member.view_student_member', compact('users'));
    // }

    public function studentMembers()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Retrieve users who qualify as student members
        $users = DB::table('users')
            ->join('academic_qualifications', 'users.id', '=', 'academic_qualifications.user_id')
            ->whereIn('academic_qualifications.degree', ['Bachelor of Arts', 'Bachelor of Science']) // Only consider specific degrees
            ->where('academic_qualifications.graduation_year', '>', $currentYear) // Graduation year must be greater than the current year
            ->select('users.*', 'academic_qualifications.degree', 'academic_qualifications.graduation_year')
            ->get();

        // Return the view with the list of student members
        return view('admin.member.view_student_member', compact('users'));
    }



    // public function members()
    // {
    //     // Calculate the maximum date of birth for age 39 years
    //     $maxDateOfBirth = Carbon::now()->subYears(39)->format('Y-m-d');

    //     // Retrieve users not more than 39 years old and graduation_year not greater than the current year
    //     $users = DB::table('users')
    //         ->join('academic_qualifications', 'users.id', '=', 'academic_qualifications.user_id')
    //         ->where('users.date_of_birth', '>=', $maxDateOfBirth) // Users younger than or equal to 39
    //         ->where('academic_qualifications.graduation_year', '<=', Carbon::now()->year) // Graduation year up to current year
    //         ->select('users.id', 'users.name', 'users.email', 'users.date_of_birth', 'academic_qualifications.graduation_year')
    //         ->get();

    //     // Return the view with the list of users
    //     return view('admin.member.view_member', compact('users'));
    // }

    // public function members()
    // {
    //     // Calculate the maximum date of birth for age 39 years
    //     $maxDateOfBirth = Carbon::now()->subYears(39)->format('Y-m-d');
    //     $currentYear = Carbon::now()->year;

    //     // Retrieve users who are not student members and are not older than 39 years
    //     $users = DB::table('users')
    //         ->join('academic_qualifications', 'users.id', '=', 'academic_qualifications.user_id')
    //         ->where('users.date_of_birth', '>=', $maxDateOfBirth) // Not older than 39
    //         ->where(function ($query) use ($currentYear) {
    //             $query->whereNotIn('academic_qualifications.degree', ['Bachelor of Arts', 'Bachelor of Science']) // Exclude student degrees
    //                 ->orWhere('academic_qualifications.graduation_year', '<=', $currentYear); // Graduation year up to the current year
    //         })
    //         ->select('users.id', 'users.name', 'users.email', 'users.date_of_birth', 'academic_qualifications.graduation_year')
    //         ->get();

    //     // Debugging: Uncomment to see the actual query generated by Laravel
    //     // dd($users);

    //     // Return the view with the list of users
    //     return view('admin.member.view_member', compact('users'));
    // }
    public function members()
    {
        $maxDateOfBirth = Carbon::now()->subYears(39)->format('Y-m-d');
        $currentYear = Carbon::now()->year;

        // Subquery to exclude users with Bachelor's degree and future graduation year
        $excludedUserIds = DB::table('academic_qualifications')
            ->whereIn('degree', ['Bachelor of Arts', 'Bachelor of Science'])
            ->where('graduation_year', '>', $currentYear)
            ->pluck('user_id'); // Get user IDs to exclude

        // Main query to retrieve eligible members with the latest graduation year
        $users = DB::table('users')
            ->join('academic_qualifications', 'users.id', '=', 'academic_qualifications.user_id')
            ->where('users.date_of_birth', '>=', $maxDateOfBirth) // Not older than 39
            ->whereNotIn('users.id', $excludedUserIds) // Exclude users with disqualifying Bachelor's records
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.date_of_birth',
                DB::raw('MAX(academic_qualifications.graduation_year) as graduation_year') // Latest graduation year
            )
            ->groupBy('users.id', 'users.name', 'users.email', 'users.date_of_birth') // Group by user to avoid duplicates
            ->get();

        // Return the view with the list of users
        return view('admin.member.view_member', compact('users'));
    }






}
