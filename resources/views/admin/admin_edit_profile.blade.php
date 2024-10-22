@extends('admin.admin_dashboard')
@section('admin')
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



                                    <form method="post" action="{{ route('admin.profile.update') }}"
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

                    @if($profileData->registration_number)
    <div class="card ribbon-box border shadow-none overflow-hidden">
        <div class="card-body text-muted">
            <div class="ribbon ribbon-primary ribbon-shape trending-ribbon">
                <span class="trending-ribbon-text">Registration Number</span> 
                <i class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
            </div>
            <h5 class="fs-14 text-end mb-3">
                {{ $profileData->registration_number }}
            </h5>
            <p class="mb-0">
                Please note that your registration number is assigned based on your initial country of registration and cannot be changed or reset if you update your country information. This number is generated only once and remains the same throughout your membership.
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
                                                <label for="educationInput" class="form-label">Highest level of Education</label>
                                                <select class="form-select mb-3" id="educationInput" name="education"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->education == '' ? 'selected' : '' }}>Select
                                                        your Highest level of Education</option>
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
                                                <select class="form-select mb-3" id="positionInput" name="position"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->position == '' ? 'selected' : '' }}>Select
                                                        your Position</option>
                                                    <option value="Intern"
                                                        {{ $profileData->position == 'Intern' ? 'selected' : '' }}>
                                                        Intern</option>
                                                    <option value="Junior Developer"
                                                        {{ $profileData->position == 'Junior Developer' ? 'selected' : '' }}>
                                                        Junior Developer</option>
                                                    <option value="Software Engineer"
                                                        {{ $profileData->position == 'Software Engineer' ? 'selected' : '' }}>
                                                        Software Engineer</option>
                                                    <option value="Senior Software Engineer"
                                                        {{ $profileData->position == 'Senior Software Engineer' ? 'selected' : '' }}>
                                                        Senior Software Engineer</option>
                                                    <option value="Project Manager"
                                                        {{ $profileData->position == 'Project Manager' ? 'selected' : '' }}>
                                                        Project Manager</option>
                                                    <option value="Team Lead"
                                                        {{ $profileData->position == 'Team Lead' ? 'selected' : '' }}>
                                                        Team Lead</option>
                                                    <option value="Product Manager"
                                                        {{ $profileData->position == 'Product Manager' ? 'selected' : '' }}>
                                                        Product Manager</option>
                                                    <option value="Marketing Manager"
                                                        {{ $profileData->position == 'Marketing Manager' ? 'selected' : '' }}>
                                                        Marketing Manager</option>
                                                    <option value="Sales Executive"
                                                        {{ $profileData->position == 'Sales Executive' ? 'selected' : '' }}>
                                                        Sales Executive</option>
                                                    <option value="Human Resources Manager"
                                                        {{ $profileData->position == 'Human Resources Manager' ? 'selected' : '' }}>
                                                        Human Resources Manager</option>
                                                    <option value="Administrative Assistant"
                                                        {{ $profileData->position == 'Administrative Assistant' ? 'selected' : '' }}>
                                                        Administrative Assistant</option>
                                                    <option value="CEO"
                                                        {{ $profileData->position == 'CEO' ? 'selected' : '' }}>CEO
                                                    </option>
                                                    <option value="CTO"
                                                        {{ $profileData->position == 'CTO' ? 'selected' : '' }}>CTO
                                                    </option>
                                                    <option value="CFO"
                                                        {{ $profileData->position == 'CFO' ? 'selected' : '' }}>CFO
                                                    </option>
                                                    <option value="Consultant"
                                                        {{ $profileData->position == 'Consultant' ? 'selected' : '' }}>
                                                        Consultant</option>
                                                    <option value="Other"
                                                        {{ $profileData->position == 'Other' ? 'selected' : '' }}>Other
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
                                                        {{ $profileData->employer == '' ? 'selected' : '' }}>Select
                                                        your Employer</option>
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
                                                        {{ $profileData->employer == 'Retired' ? 'selected' : '' }}>
                                                        Retired</option>
                                                    <option value="Not Applicable"
                                                        {{ $profileData->employer == 'Not Applicable' ? 'selected' : '' }}>
                                                        Not Applicable</option>
                                                </select>
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
                                                <button type="submit" class="btn btn-primary">Updates</button>
                                                <button type="button" class="btn btn-soft-secondary">Cancel</button>
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
                </div>
                <!--end col-->
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
    </script>
@endsection
