@extends('user.user_dashboard')
@section('user')
    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">

                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">



                                    <form method="post" action="{{ route('user.profile.update') }}"
                                        enctype="multipart/form-data" class="row pt-40px">
                                        @csrf


                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" type="file" name="photo"
                                                class="profile-img-file-input">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                            </label>
                                        </div>
                                </div>
                                <h5 class="fs-16 mb-1">{{ $profileData->name }}</h5>
                                <p class="text-muted mb-0">Member</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    @if ($socials)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Socials</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    @if ($socials->linkedin)
                                        <div>
                                            <a href="{{ strpos($socials->linkedin, 'http') === 0 ? $socials->linkedin : 'https://' . $socials->linkedin }}"
                                                class="avatar-xs d-block" target="_blank" rel="noopener noreferrer">
                                                <span class="avatar-title rounded-circle fs-16 bg-info text-light">
                                                    <i class="ri-linkedin-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                    @if ($socials->facebook)
                                        <div>
                                            <a href="{{ strpos($socials->facebook, 'http') === 0 ? $socials->facebook : 'https://' . $socials->facebook }}"
                                                class="avatar-xs d-block" target="_blank" rel="noopener noreferrer">
                                                <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                                    <i class="ri-facebook-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                    @if ($socials->instagram)
                                        <div>
                                            <a href="{{ strpos($socials->instagram, 'http') === 0 ? $socials->instagram : 'https://' . $socials->instagram }}"
                                                class="avatar-xs d-block" target="_blank" rel="noopener noreferrer">
                                                <span class="avatar-title rounded-circle fs-16 bg-danger text-light">
                                                    <i class="ri-instagram-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                    @if ($socials->snapchat)
                                        <div>
                                            <a href="{{ strpos($socials->snapchat, 'http') === 0 ? $socials->snapchat : 'https://' . $socials->snapchat }}"
                                                class="avatar-xs d-block" target="_blank" rel="noopener noreferrer">
                                                <span class="avatar-title rounded-circle fs-16 bg-warning text-light">
                                                    <i class="ri-snapchat-fill"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- end card body -->
                        </div>
                    @endif

                    @if ($profileData->registration_number)
                        <div class="card ribbon-box border shadow-none overflow-hidden">
                            <div class="card-body text-muted">
                                <div class="ribbon ribbon-success ribbon-shape trending-ribbon">
                                    <span class="trending-ribbon-text">Registration Number</span>
                                    <i class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
                                </div>
                                <h5 class="fs-14 text-end mb-3">
                                    {{ $profileData->registration_number }}
                                </h5>
                                <p class="mb-0">
                                    Please note that your registration number is assigned based on your initial country of
                                    registration and cannot be changed or reset if you update your country information. This
                                    number is generated only once and remains the same throughout your membership.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i>
                                        Profile Details
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    {{-- <form method="post" action="{{ route('user.profile.update') }}"
                                        enctype="multipart/form-data" class="row pt-40px"> 
                                    @csrf --}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Full
                                                    Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="firstnameInput" placeholder="Enter your firstname"
                                                    value="{{ $profileData->name }}">
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email
                                                    Address</label>
                                                <input type="email" class="form-control" name="email" id="emailInput"
                                                    placeholder="Enter your email" value="{{ $profileData->email }}">
                                            </div>
                                        </div>

                                        <!--end col-->
                                        @include('user._partials.countries')
                                        <!--end col-->
                                        @include('user._partials.phone_number')
                                        <!--end col-->

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="maritalStatusInput" class="form-label">Marital Status</label>
                                                <select class="form-select mb-3" id="maritalStatusInput"
                                                    name="marital_status" aria-label="Marital Status">
                                                    <option value=""
                                                        {{ $profileData->marital_status == '' ? 'selected' : '' }}>Select
                                                        Marital Status</option>
                                                    <option value="Single"
                                                        {{ $profileData->marital_status == 'Single' ? 'selected' : '' }}>
                                                        Single</option>
                                                    <option value="Married"
                                                        {{ $profileData->marital_status == 'Married' ? 'selected' : '' }}>
                                                        Married</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="genderInput" class="form-label">Gender</label>
                                                <select class="form-select mb-3" id="genderInput" name="gender"
                                                    aria-label="Gender">
                                                    <option value=""
                                                        {{ $profileData->gender == '' ? 'selected' : '' }}>Select Gender
                                                    </option>
                                                    <option value="Male"
                                                        {{ $profileData->gender == 'Male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ $profileData->gender == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="dobInput" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="dobInput"
                                                    name="date_of_birth" value="{{ $profileData->date_of_birth }}"
                                                    aria-label="Date of Birth">
                                            </div>
                                        </div>



                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="educationInput" class="form-label">Highest level of
                                                    Education</label>
                                                <select class="form-select mb-3" id="educationInput" name="education"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->education == '' ? 'selected' : '' }}>Select
                                                        your Education</option>
                                                    <option value="High School Diploma"
                                                        {{ $profileData->education == 'High School Diploma' ? 'selected' : '' }}>
                                                        High School Diploma</option>
                                                    <option value="Associate Degree"
                                                        {{ $profileData->education == 'Associate Degree' ? 'selected' : '' }}>
                                                        Associate Degree</option>
                                                    <option value="Bachelor’s Degree"
                                                        {{ $profileData->education == 'Bachelor’s Degree' ? 'selected' : '' }}>
                                                        Bachelor’s Degree</option>
                                                    <option value="Master’s Degree"
                                                        {{ $profileData->education == 'Master’s Degree' ? 'selected' : '' }}>
                                                        Master’s Degree</option>
                                                    <option value="Doctorate (Ph.D.)"
                                                        {{ $profileData->education == 'Doctorate (Ph.D.)' ? 'selected' : '' }}>
                                                        Doctorate (Ph.D.)</option>
                                                    <option value="Professional Certificate"
                                                        {{ $profileData->education == 'Professional Certificate' ? 'selected' : '' }}>
                                                        Professional Certificate</option>
                                                    <option value="Some College (No Degree)"
                                                        {{ $profileData->education == 'Some College (No Degree)' ? 'selected' : '' }}>
                                                        Some College (No Degree)</option>
                                                    <option value="Vocational Training"
                                                        {{ $profileData->education == 'Vocational Training' ? 'selected' : '' }}>
                                                        Vocational Training</option>
                                                    <option value="Online Course"
                                                        {{ $profileData->education == 'Online Course' ? 'selected' : '' }}>
                                                        Online Course</option>
                                                    <option value="Not Applicable"
                                                        {{ $profileData->education == 'Not Applicable' ? 'selected' : '' }}>
                                                        Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!--end col-->
                                       <div class="col-lg-4">
    <div class="mb-3">
        <label for="positionInput" class="form-label">Position</label>
        <select class="form-select mb-3" id="positionInput" name="position" aria-label="Default select example">
            <option value="" {{ old('position', $profileData->position) == '' ? 'selected' : '' }}>
                Select your Position
            </option>
            <option value="Broker/Agent" {{ old('position', $profileData->position) == 'Broker/Agent' ? 'selected' : '' }}>
                Broker/Agent
            </option>
            <option value="Underwriter" {{ old('position', $profileData->position) == 'Underwriter' ? 'selected' : '' }}>
                Underwriter
            </option>
            <option value="Business Development" {{ old('position', $profileData->position) == 'Business Development' ? 'selected' : '' }}>
                Business Development
            </option>
            <option value="Customer Service Representative" {{ old('position', $profileData->position) == 'Customer Service Representative' ? 'selected' : '' }}>
                Customer Service Representative
            </option>
            <option value="Claims Representative" {{ old('position', $profileData->position) == 'Claims Representative' ? 'selected' : '' }}>
                Claims Representative
            </option>
            <option value="Adjuster" {{ old('position', $profileData->position) == 'Adjuster' ? 'selected' : '' }}>
                Adjuster
            </option>
            <option value="Actuary" {{ old('position', $profileData->position) == 'Actuary' ? 'selected' : '' }}>
                Actuary
            </option>
            <option value="Regulator" {{ old('position', $profileData->position) == 'Regulator' ? 'selected' : '' }}>
                Regulator
            </option>
            <option value="Other" {{ old('position', $profileData->position) == 'Other' ? 'selected' : '' }}>
                Other
            </option>
        </select>
    </div>
</div>



                                        <!--end col-->



                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="employerInput" class="form-label">Employer</label>
                                                <select class="form-select mb-3" id="employerInput" name="employer"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->employer == '' ? 'selected' : '' }}>Select your
                                                        Employer</option>
                                                    <option value="Current Employer"
                                                        {{ $profileData->employer == 'Current Employer' ? 'selected' : '' }}>
                                                        Current Employer</option>
                                                    <option value="Previous Employer"
                                                        {{ $profileData->employer == 'Previous Employer' ? 'selected' : '' }}>
                                                        Previous Employer</option>
                                                    <option value="Self-Employed"
                                                        {{ $profileData->employer == 'Self-Employed' ? 'selected' : '' }}>
                                                        Self-Employed</option>
                                                    <option value="Freelancer"
                                                        {{ $profileData->employer == 'Freelancer' ? 'selected' : '' }}>
                                                        Freelancer</option>
                                                    <option value="Unemployed"
                                                        {{ $profileData->employer == 'Unemployed' ? 'selected' : '' }}>
                                                        Unemployed</option>
                                                    <option value="Retired"
                                                        {{ $profileData->employer == 'Retired' ? 'selected' : '' }}>Retired
                                                    </option>
                                                    <option value="Not Applicable"
                                                        {{ $profileData->employer == 'Not Applicable' ? 'selected' : '' }}>
                                                        Not Applicable</option>
                                                    <option value="Broker/Agent"
                                                        {{ $profileData->employer == 'Broker/Agent' ? 'selected' : '' }}>
                                                        Broker/Agent</option>
                                                    <option value="Underwriter"
                                                        {{ $profileData->employer == 'Underwriter' ? 'selected' : '' }}>
                                                        Underwriter</option>
                                                    <option value="Business Development"
                                                        {{ $profileData->employer == 'Business Development' ? 'selected' : '' }}>
                                                        Business Development</option>
                                                    <option value="Customer Service Representative"
                                                        {{ $profileData->employer == 'Customer Service Representative' ? 'selected' : '' }}>
                                                        Customer Service Representative</option>
                                                    <option value="Claims Representative"
                                                        {{ $profileData->employer == 'Claims Representative' ? 'selected' : '' }}>
                                                        Claims Representative</option>
                                                    <option value="Adjuster"
                                                        {{ $profileData->employer == 'Adjuster' ? 'selected' : '' }}>
                                                        Adjuster</option>
                                                    <option value="Actuary"
                                                        {{ $profileData->employer == 'Actuary' ? 'selected' : '' }}>Actuary
                                                    </option>
                                                    <option value="Regulator"
                                                        {{ $profileData->employer == 'Regulator' ? 'selected' : '' }}>
                                                        Regulator</option>
                                                    <option value="Others"
                                                        {{ $profileData->employer == 'Others' ? 'selected' : '' }}>Others
                                                    </option>
                                                </select>
                                            </div>
                                        </div>




                                        <!-- Hidden input fields for Current Employer -->
                                        <!-- Current Employer -->
                                        <div id="currentEmployerName"
                                            style="display: {{ $profileData->employer == 'Current Employer' ? 'block' : 'none' }};"
                                            class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="currentEmployerNameInput" class="form-label">Current Employer
                                                    Name</label>
                                                <input type="text" class="form-control" id="currentEmployerNameInput"
                                                    name="current_employer_name"
                                                    value="{{ $profileData->current_employer_name ?? '' }}"
                                                    placeholder="Enter Current Employer Name">
                                            </div>
                                        </div>
                                        <div id="currentEmployerDateJoined"
                                            style="display: {{ $profileData->employer == 'Current Employer' ? 'block' : 'none' }};"
                                            class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="currentEmployerDateInput" class="form-label">Date
                                                    Joined</label>
                                                <input type="date" class="form-control" id="currentEmployerDateInput"
                                                    name="current_employer_date"
                                                    value="{{ $profileData->current_employer_date ?? '' }}"
                                                    max="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>


                                        <!-- Hidden input fields for Previous Employer -->
                                        <!-- Previous Employer -->
                                        <div id="previousEmployerName"
                                            style="display: {{ $profileData->employer == 'Previous Employer' ? 'block' : 'none' }};"
                                            class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="previousEmployerNameInput" class="form-label">Previous
                                                    Employer Name</label>
                                                <input type="text" class="form-control" id="previousEmployerNameInput"
                                                    name="previous_employer_name"
                                                    value="{{ $profileData->previous_employer_name ?? '' }}"
                                                    placeholder="Enter Previous Employer Name">
                                            </div>
                                        </div>
                                        <div id="previousEmployerStartDate"
                                            style="display: {{ $profileData->employer == 'Previous Employer' ? 'block' : 'none' }};"
                                            class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="previousEmployerStartDateInput" class="form-label">Start
                                                    Date</label>
                                                <input type="date" class="form-control"
                                                    id="previousEmployerStartDateInput"
                                                    name="previous_employer_start_date"
                                                    value="{{ $profileData->previous_employer_start_date ?? '' }}"
                                                    max="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div id="previousEmployerEndDate"
                                            style="display: {{ $profileData->employer == 'Previous Employer' ? 'block' : 'none' }};"
                                            class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="previousEmployerEndDateInput" class="form-label">End
                                                    Date</label>
                                                <input type="date" class="form-control"
                                                    id="previousEmployerEndDateInput" name="previous_employer_end_date"
                                                    value="{{ $profileData->previous_employer_end_date ?? '' }}"
                                                    max="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>



                                        <!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-2">
                                                <label for="exampleFormControlTextarea" class="form-label">Short
                                                    Bio</label>
                                                <textarea class="form-control" name="short_bio" id="exampleFormControlTextarea" placeholder="Enter your description"
                                                    rows="3">{{ $profileData->short_bio }}</textarea>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-success">Update</button>

                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->


                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="true"
                                    aria-controls="collapseExample">
                                    Add Socials
                                </button>
                            </h5>
                        </div>

                        <div id="collapseExample" class="collapse" aria-labelledby="headingOne">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Socials</h5>
                                    </div>

                                </div>


                                <form action="{{ route('socials.store') }}" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-info text-light">
                                                <i class="ri-linkedin-fill"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control" name="linkedin"
                                            placeholder="www.linkedin.com/yips-africa"
                                            value="{{ old('linkedin', $socials->linkedin ?? '') }}">
                                    </div>

                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                                <i class="ri-facebook-fill"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control" name="facebook"
                                            placeholder="www.facebook.com/yips-africa"
                                            value="{{ old('facebook', $socials->facebook ?? '') }}">
                                    </div>

                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-danger text-light">
                                                <i class="ri-instagram-fill"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control" name="instagram"
                                            placeholder="www.instagram.com/yips-africa"
                                            value="{{ old('instagram', $socials->instagram ?? '') }}">
                                    </div>

                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-warning text-light">
                                                <i class="ri-snapchat-fill"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control" name="snapchat"
                                            placeholder="www.snapchat.com/yips-africa"
                                            value="{{ old('snapchat', $socials->snapchat ?? '') }}">
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <button type="submit" class="btn btn-success w-100">Save Socials</button>
                                    </div>
                                </form>




                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

    <script>
        document.getElementById('profile-img-file-input').addEventListener('change', function(event) {
            var file = event.target.files[0]; // Get the selected file
            if (file) {
                var reader = new FileReader(); // Initialize FileReader

                reader.onload = function(e) {
                    // Set the src attribute of the existing image to the selected image's data URL
                    document.querySelector('.user-profile-image').src = e.target.result;
                };

                reader.readAsDataURL(file); // Read the file as a DataURL to display the image
            }
        });

        //Javascript to hide and display current employer and previous employer records...

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Get the select element and the hidden input fields
        //     const employerSelect = document.getElementById('employerInput');

        //     // Current Employer fields
        //     const currentEmployerName = document.getElementById('currentEmployerName');
        //     const currentEmployerDateJoined = document.getElementById('currentEmployerDateJoined');

        //     // Previous Employer fields
        //     const previousEmployerName = document.getElementById('previousEmployerName');
        //     const previousEmployerStartDate = document.getElementById('previousEmployerStartDate');
        //     const previousEmployerEndDate = document.getElementById('previousEmployerEndDate');

        //     // Add an event listener to the select input
        //     employerSelect.addEventListener('change', function() {
        //         if (this.value === 'Current Employer') {
        //             // Show the Current Employer fields
        //             currentEmployerName.style.display = 'block';
        //             currentEmployerDateJoined.style.display = 'block';

        //             // Hide Previous Employer fields
        //             previousEmployerName.style.display = 'none';
        //             previousEmployerStartDate.style.display = 'none';
        //             previousEmployerEndDate.style.display = 'none';
        //         } else if (this.value === 'Previous Employer') {
        //             // Show the Previous Employer fields
        //             previousEmployerName.style.display = 'block';
        //             previousEmployerStartDate.style.display = 'block';
        //             previousEmployerEndDate.style.display = 'block';

        //             // Hide Current Employer fields
        //             currentEmployerName.style.display = 'none';
        //             currentEmployerDateJoined.style.display = 'none';
        //         } else {
        //             // Hide both Current and Previous Employer fields if other options are selected
        //             currentEmployerName.style.display = 'none';
        //             currentEmployerDateJoined.style.display = 'none';
        //             previousEmployerName.style.display = 'none';
        //             previousEmployerStartDate.style.display = 'none';
        //             previousEmployerEndDate.style.display = 'none';
        //         }
        //     });
        // });

        document.getElementById('employerInput').addEventListener('change', function() {
            var selectedEmployer = this.value;

            // Toggle visibility for current employer
            if (selectedEmployer === 'Current Employer') {
                document.getElementById('currentEmployerName').style.display = 'block';
                document.getElementById('currentEmployerDateJoined').style.display = 'block';
            } else if (selectedEmployer === 'Others') {
                document.getElementById('otherEmployer').style.display = 'block';

            } else {
                document.getElementById('currentEmployerName').style.display = 'none';
                document.getElementById('currentEmployerDateJoined').style.display = 'none';
            }

            // Toggle visibility for previous employer
            if (selectedEmployer === 'Previous Employer') {
                document.getElementById('previousEmployerName').style.display = 'block';
                document.getElementById('previousEmployerStartDate').style.display = 'block';
                document.getElementById('previousEmployerEndDate').style.display = 'block';
            } else {
                document.getElementById('previousEmployerName').style.display = 'none';
                document.getElementById('previousEmployerStartDate').style.display = 'none';
                document.getElementById('previousEmployerEndDate').style.display = 'none';
            }
        });

        // Trigger change event on page load to show the fields if values exist
        window.addEventListener('load', function() {
            var employerSelect = document.getElementById('employerInput');
            employerSelect.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
