<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ProfileManagement;
use App\Models\ProfileManagement\AcademicQualification;
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

        // return view('edit-profile', [
        //     'qualifications' => $qualifications,
        //     'employmentHistory' => $employmentHistory
        // ]);


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

    // public function profileManagementAcademicQualificationStore(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'degree.*' => 'required|string',
    //         'institution.*' => 'required|string',
    //         'graduation_year.*' => 'required|integer',
    //         'grade.*' => 'nullable|string',
    //         'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Single file upload validation

    //     ]);

    //     // Retrieve the currently authenticated user (assuming academic qualifications belong to the user)
    //     $user = auth()->user();

    //     // Delete the user's current academic qualifications if you're updating them
    //     AcademicQualification::where('user_id', $user->id)->delete();

    //     // Loop through each qualification and store them
    //     $degrees = $request->degree;
    //     $institutions = $request->institution;
    //     $graduation_years = $request->graduation_year;
    //     $grades = $request->grade;
    //     $document = $request->file('document'); // Get the uploaded file


    //     for ($i = 0; $i < count($degrees); $i++) {
    //         // Create a new academic qualification
    //         $qualification = new AcademicQualification();
    //         $qualification->user_id = $user->id;
    //         $qualification->degree = $degrees[$i];
    //         $qualification->institution = $institutions[$i];
    //         $qualification->graduation_year = $graduation_years[$i];
    //         $qualification->grade = $grades[$i] ?? null; // Allow nullable grade

    //         if ($request->file('document')) {
    //             // Delete the old photo if it exists
    //             if ($qualification->document) {
    //                 @unlink(public_path('profile_management/academic_qualification/' . $qualification->document));
    //             }

    //             // Save the new photo
    //             $file = $request->file('document');
    //             $filename = date('YmdHi') . $file->getClientOriginalName();
    //             $file->move(public_path('profile_management/academic_qualification'), $filename);
    //             $qualification->document = $filename;
    //         }

    //         // Save the qualification
    //         $qualification->save();
    //     }

    //     $notification = array(
    //         'message' => 'Academic Qualifications Updated Successfully!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);

    // }

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



    // public function profileManagementAcademicQualificationStore(Request $request)
    // {

    //     $request->validate([
    //         'degree.*' => 'required|string',
    //         'institution.*' => 'required|string',
    //         'graduation_year.*' => 'required|integer',
    //         'grade.*' => 'nullable|string',
    //         'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Single file upload validation
    //     ]);

    //     // Retrieve the currently authenticated user (assuming academic qualifications belong to the user)
    //     $user = auth()->user();

    //     // Delete the user's current academic qualifications if you're updating them
    //     AcademicQualification::where('user_id', $user->id)->delete();

    //     // Retrieve all fields from the request
    //     $degrees = $request->degree;
    //     $institutions = $request->institution;
    //     $graduation_years = $request->graduation_year;
    //     $grades = $request->grade;
    //     $document = $request->file('document'); // Get the uploaded file

    //     for ($i = 0; $i < count($degrees); $i++) {
    //         // Create a new academic qualification
    //         $qualification = new AcademicQualification();
    //         $qualification->user_id = $user->id;
    //         $qualification->degree = $degrees[$i];
    //         $qualification->institution = $institutions[$i];
    //         $qualification->graduation_year = $graduation_years[$i];
    //         $qualification->grade = $grades[$i] ?? null; // Allow nullable grade


    //         if ($request->file('document')) {
    //             // Delete the old photo if it exists
    //             if ($qualification->document) {
    //                 @unlink(public_path('profile_management/academic_qualification/' . $qualification->document));
    //             }

    //             // Save the new photo
    //             $file = $request->file('document');
    //             $filename = date('YmdHi') . $file->getClientOriginalName();
    //             $file->move(public_path('profile_management/academic_qualification'), $filename);
    //             $qualification->document = $filename;
    //         }

    //         // Save the qualification
    //         $qualification->save();
    //     }

    //     $notification = array(
    //         'message' => 'Academic Qualifications Updated Successfully!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);

    // }

    // public function profileManagementAcademicQualificationStore(Request $request)
    // {
    //     $request->validate([
    //         'degree.*' => 'required|string',
    //         'institution.*' => 'required|string',
    //         'graduation_year.*' => 'required|integer',
    //         'grade.*' => 'nullable|string',
    //         'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Single file upload validation
    //     ]);

    //     // Retrieve the currently authenticated user
    //     $user = auth()->user();

    //     // Delete the user's current academic qualifications if you're updating them
    //     AcademicQualification::where('user_id', $user->id)->each(function ($qualification) {
    //         // Delete the old document if it exists
    //         if ($qualification->document && file_exists(public_path('profile_management/academic_qualification/' . $qualification->document))) {
    //             unlink(public_path('profile_management/academic_qualification/' . $qualification->document));
    //         }
    //     });

    //     // Retrieve all fields from the request
    //     $degrees = $request->degree;
    //     $institutions = $request->institution;
    //     $graduation_years = $request->graduation_year;
    //     $grades = $request->grade;
    //     $document = $request->file('document'); // Get the uploaded file

    //     foreach ($degrees as $i => $degree) {
    //         // Create a new academic qualification
    //         $qualification = new AcademicQualification();
    //         $qualification->user_id = $user->id;
    //         $qualification->degree = $degree;
    //         $qualification->institution = $institutions[$i];
    //         $qualification->graduation_year = $graduation_years[$i];
    //         $qualification->grade = $grades[$i] ?? null; // Allow nullable grade

    //         // Save the new document if available
    //         if ($document) {
    //             $filename = date('YmdHi') . '_' . $document->getClientOriginalName();
    //             $document->move(public_path('profile_management/academic_qualification'), $filename);
    //             $qualification->document = $filename;
    //         }

    //         // Save the qualification
    //         $qualification->save();
    //     }

    //     $notification = array(
    //         'message' => 'Academic Qualifications Updated Successfully!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }

    // public function profileManagementAcademicQualificationStore(Request $request)
    // {
    //     $request->validate([
    //         'degree.*' => 'required|string',
    //         'institution.*' => 'required|string',
    //         'graduation_year.*' => 'required|integer',
    //         'grade.*' => 'nullable|string',
    //         'document' => 'required|file|mimes:pdf|max:2048', // Single file upload validation
    //     ]);

    //     // Retrieve the currently authenticated user
    //     $user = auth()->user();

    //     // Delete the user's current academic qualifications if you're updating them
    //     AcademicQualification::where('user_id', $user->id)->each(function ($qualification) {
    //         // Delete the old document if it exists
    //         if ($qualification->document && file_exists(public_path('profile_management/academic_qualification/' . $qualification->document))) {
    //             unlink(public_path('profile_management/academic_qualification/' . $qualification->document));
    //         }
    //     });

    //     // Retrieve all fields from the request
    //     $degrees = $request->degree;
    //     $institutions = $request->institution;
    //     $graduation_years = $request->graduation_year;
    //     $grades = $request->grade;
    //     $document = $request->file('document'); // Get the uploaded file

    //     // Handle saving qualifications
    //     $qualification = new AcademicQualification();
    //     $qualification->user_id = $user->id;

    //     // Save as JSON if there are multiple entries
    //     if (is_array($degrees) && count($degrees) > 1) {
    //         $qualification->degree = json_encode($degrees);
    //         $qualification->institution = json_encode($institutions);
    //         $qualification->graduation_year = json_encode($graduation_years);
    //         $qualification->grade = json_encode($grades);
    //     } else {
    //         // Handle single qualification case
    //         $qualification->degree = $degrees[0] ?? null;
    //         $qualification->institution = $institutions[0] ?? null;
    //         $qualification->graduation_year = $graduation_years[0] ?? null;
    //         $qualification->grade = $grades[0] ?? null;
    //     }

    //     // Save the document if available
    //     if ($document) {
    //         $filename = date('YmdHi') . '_' . $document->getClientOriginalName();
    //         $document->move(public_path('profile_management/academic_qualification'), $filename);
    //         $qualification->document = $filename;
    //     }

    //     $qualification->save();

    //     $notification = array(
    //         'message' => 'Academic Qualifications Updated Successfully!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }





}
