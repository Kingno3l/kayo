<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ProfileManagement;
use App\Models\ProfileManagement\AcademicQualification;
use App\Models\ProfileManagement\NextOfKinAndReferee;
use App\Models\ProfileManagement\EmploymentHistory;
use App\Models\ProfileManagement\Document;
use Carbon\Carbon;


class ProfileManagementController extends Controller
{
    public function profileManagement()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);



        // Fetch qualifications
        $qualifications = ProfileManagement::where('user_id', $id)
            ->where('type', 'qualification')
            ->get();

        // Fetch employment history
        $employmentHistory = ProfileManagement::where('user_id', $id)
            ->where('type', 'employment_history')
            ->get();


        return view('user.manage_profile', compact('profileData', 'qualifications', 'employmentHistory'));
    }

    public function profileManagementStore(Request $request)
    {
        $user = auth()->user(); // Assuming the user is logged in

        // Validate the form data
        $validatedData = $request->validate([
            'degree.*' => 'nullable|string|max:255',
            'institution.*' => 'nullable|string|max:255',
            'graduation_year.*' => 'nullable|integer',
            'grade.*' => 'nullable|string|max:255',

            'job_title.*' => 'nullable|string|max:255',
            'company.*' => 'nullable|string|max:255',
            'start_date.*' => 'nullable|date',
            'end_date.*' => 'nullable|date|after_or_equal:start_date.*',
            'responsibilities.*' => 'nullable|string',
        ]);

        // Save academic qualifications
        if ($request->degree) {
            foreach ($request->degree as $key => $degree) {
                if ($degree) {
                    ProfileManagement::create([
                        'user_id' => $user->id,
                        'type' => 'qualification',
                        'degree' => $degree,
                        'institution' => $request->institution[$key] ?? null,
                        'graduation_year' => $request->graduation_year[$key] ?? null,
                        'grade' => $request->grade[$key] ?? null,
                    ]);
                }
            }
        }

        // Save employment history
        if ($request->job_title) {
            foreach ($request->job_title as $key => $jobTitle) {
                if ($jobTitle) {
                    ProfileManagement::create([
                        'user_id' => $user->id,
                        'type' => 'employment_history',
                        'job_title' => $jobTitle,
                        'company' => $request->company[$key] ?? null,
                        'start_date' => $request->start_date[$key] ? Carbon::parse($request->start_date[$key]) : null,
                        'end_date' => $request->end_date[$key] ? Carbon::parse($request->end_date[$key]) : null,
                        'responsibilities' => $request->responsibilities[$key] ?? null,
                    ]);
                }
            }
        }

        $notification = array(
            'message' => 'Profile information saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
    
    public function profileManagementAcademicQualification()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        
        // Retrieve the academic qualifications for the specified user
        $qualifications = AcademicQualification::where('user_id', $id)->get();
        
        
        // Optionally, you can include the associated document if needed
        $document = Document::where('user_id', $id)
        ->where('documentable_type', 'academic qualification')
        ->first();
        
        return view('user.profile.academic_qualification', compact('profileData', 'qualifications', 'document'));
        
    }
    
    public function profileManagementAcademicQualificationStore(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'degree.*' => 'required|string',
            'institution.*' => 'required|string',
            'graduation_year.*' => 'required|integer',
            'grade.*' => 'nullable|string',
            'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Single file upload validation
        ]);

        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Delete the user's current academic qualifications if you're updating them
        AcademicQualification::where('user_id', $user->id)->delete();

        // Loop through each qualification and store them
        $degrees = $request->degree;
        $institutions = $request->institution;
        $graduation_years = $request->graduation_year;
        $grades = $request->grade;
        $document = $request->file('document'); // Get the uploaded file

        for ($i = 0; $i < count($degrees); $i++) {
            // Create a new academic qualification
            $qualification = new AcademicQualification();
            $qualification->user_id = $user->id;
            $qualification->degree = $degrees[$i];
            $qualification->institution = $institutions[$i];
            $qualification->graduation_year = $graduation_years[$i];
            $qualification->grade = $grades[$i] ?? null; // Allow nullable grade
            $qualification->save();
        }

        if ($document) {
            // Find the existing document entry for the user with the type 'academic qualification'
            $existingDoc = Document::where('user_id', $user->id)
                ->where('documentable_type', 'academic qualification')
                ->first();

            // If an existing document is found, delete it from the storage
            if ($existingDoc) {
                // Remove the old file from the storage
                @unlink(public_path('profile_management/academic_qualification/' . $existingDoc->document));

                // Optionally, delete the entry from the documents table
                $existingDoc->delete();
            }

            // Save the new document
            $filename = date('YmdHi') . $document->getClientOriginalName();
            $document->move(public_path('profile_management/academic_qualification'), $filename);

            // Create a new document record
            $doc = new Document();
            $doc->user_id = $user->id;
            $doc->documentable_type = 'academic qualification';
            $doc->document = $filename;
            $doc->save();
        }


        $notification = array(
            'message' => 'Academic Qualifications Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function profileManagementEmploymentHistory()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        // Retrieve the employment history for the specified user
        $employmentHistories = EmploymentHistory::where('user_id', $id)->get();

        // Optionally, you can include the associated document if needed
        $document = Document::where('user_id', $id)
            ->where('documentable_type', 'employment history')
            ->first();

        return view('user.profile.employment_history', compact('profileData', 'employmentHistories', 'document'));
    }

    public function profileManagementEmploymentHistoryStore(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'job_title.*' => 'required|string',
            'company.*' => 'required|string',
            'start_date.*' => 'required|date',
            'end_date.*' => 'nullable|date|after_or_equal:start_date.*',
            'responsibilities.*' => 'nullable|string',
            'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Single file upload validation
        ]);

        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Delete the user's current employment history if you're updating them
        EmploymentHistory::where('user_id', $user->id)->delete();

        // Loop through each employment history entry and store them
        $job_titles = $request->job_title;
        $companies = $request->company;
        $start_dates = $request->start_date;
        $end_dates = $request->end_date;
        $responsibilities = $request->responsibilities;
        $document = $request->file('document'); // Get the uploaded file

        for ($i = 0; $i < count($job_titles); $i++) {
            // Create a new employment history entry
            $employment = new EmploymentHistory();
            $employment->user_id = $user->id;
            $employment->job_title = $job_titles[$i];
            $employment->company = $companies[$i];
            $employment->start_date = $start_dates[$i];
            $employment->end_date = $end_dates[$i] ?? null; // Allow nullable end_date
            $employment->responsibilities = $responsibilities[$i] ?? null; // Allow nullable responsibilities
            $employment->save();
        }

        if ($document) {
            // Find the existing document entry for the user with the type 'employment history'
            $existingDoc = Document::where('user_id', $user->id)
                ->where('documentable_type', 'employment history')
                ->first();

            // If an existing document is found, delete it from the storage
            if ($existingDoc) {
                // Remove the old file from the storage
                @unlink(public_path('profile_management/employment_history/' . $existingDoc->document));

                // Optionally, delete the entry from the documents table
                $existingDoc->delete();
            }

            // Save the new document
            $filename = date('YmdHi') . $document->getClientOriginalName();
            $document->move(public_path('profile_management/employment_history'), $filename);

            // Create a new document record
            $doc = new Document();
            $doc->user_id = $user->id;
            $doc->documentable_type = 'employment history';
            $doc->document = $filename;
            $doc->save();
        }

        $notification = array(
            'message' => 'Employment History Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // public function nextOfKinAndReferee(){
    //     $id = Auth::user()->id;
    //     $profileData = User::find($id);
    //     return view('user.profile.next_of_kin_and_referee', compact('profileData'));

    // }
    public function nextOfKinAndReferee()
    {
        $userId = Auth::user()->id;
        // Fetch existing record or create a new instance if not found
        $profileData = NextOfKinAndReferee::where('user_id', $userId)->first();

        // If no record found, create a new instance with default values (optional)
        if (!$profileData) {
            $profileData = new NextOfKinAndReferee;
        }

        return view('user.profile.next_of_kin_and_referee', compact('profileData'));
    }


    // public function nextOfKinAndRefereeStore(Request $request)
    // {
    //     // Find the authenticated user
    //     $id = Auth::user()->id;
    //     $data = NextOfKinAndReferee::find($id);

    //     if (!$data) {
    //         $notification = array(
    //             'message' => 'User not found.',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->with($notification);
    //     }

    //     // Assign values directly from the request, matching the form field names and database column names
    //     $data->next_of_kin_full_name = $request->input('next_of_kin_full_name');
    //     $data->next_of_kin_relationship = $request->input('next_of_kin_relationship');
    //     $data->next_of_kin_email = $request->input('next_of_kin_email', null);
    //     $data->next_of_kin_phone = $request->input('next_of_kin_phone', null);
    //     $data->next_of_kin_address = $request->input('next_of_kin_address', null);

    //     $data->referee1_full_name = $request->input('referee1_fullname', null);
    //     $data->referee1_relationship = $request->input('referee1_relationship', null);
    //     $data->referee1_email = $request->input('referee1_email', null);
    //     $data->referee1_phone = $request->input('referee1_phone', null);
    //     $data->referee1_address = $request->input('referee1_address', null);

    //     $data->referee2_full_name = $request->input('referee2_fullname', null);
    //     $data->referee2_relationship = $request->input('referee2_relationship', null);
    //     $data->referee2_email = $request->input('referee2_email', null);
    //     $data->referee2_phone = $request->input('referee2_phone', null);
    //     $data->referee2_address = $request->input('referee2_address', null);

    //     // Save the data into the database
    //     $data->save();

    //     // Redirect with success message
    //     $notification = array(
    //         'message' => 'Referee and Next of Kin Data Saved Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }

    public function nextOfKinAndRefereeStore(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::id(); // Get the user's ID

        // Create or update the NextOfKinAndReferee record
        $data = NextOfKinAndReferee::updateOrCreate(
            ['user_id' => $userId], // Find the record by user_id
            [
                'next_of_kin_full_name' => $request->input('next_of_kin_full_name'),
                'next_of_kin_relationship' => $request->input('next_of_kin_relationship'),
                'next_of_kin_email' => $request->input('next_of_kin_email', null),
                'next_of_kin_phone' => $request->input('next_of_kin_phone', null),
                'next_of_kin_address' => $request->input('next_of_kin_address', null),
                'referee1_full_name' => $request->input('referee1_fullname', null),
                'referee1_relationship' => $request->input('referee1_relationship', null),
                'referee1_email' => $request->input('referee1_email', null),
                'referee1_phone' => $request->input('referee1_phone', null),
                'referee1_address' => $request->input('referee1_address', null),
                'referee2_full_name' => $request->input('referee2_fullname', null),
                'referee2_relationship' => $request->input('referee2_relationship', null),
                'referee2_email' => $request->input('referee2_email', null),
                'referee2_phone' => $request->input('referee2_phone', null),
                'referee2_address' => $request->input('referee2_address', null),
            ]
        );

        // Redirect with a success message
        return redirect()->back()->with([
            'message' => 'Referee and Next of Kin Data Saved Successfully',
            'alert-type' => 'success'
        ]);
    }








}
