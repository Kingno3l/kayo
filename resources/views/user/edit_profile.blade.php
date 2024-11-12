@extends('user.user_dashboard')
@section('user')

    <style>
        .rotate-icon {
            transition: transform 0.3s ease;
        }

        .btn[aria-expanded="true"] .rotate-icon {
            transform: rotate(180deg);
        }
    </style>
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
                                                    value="{{ $profileData->name }}" readonly>
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email
                                                    Address</label>
                                                <input type="email" class="form-control" name="email" id="emailInput"
                                                    placeholder="Enter your email" value="{{ $profileData->email }}"
                                                    readonly>
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
                                <button class="btn btn-link d-flex w-100 justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Add Socials
                                    <i class="ri-arrow-down-s-line rotate-icon"></i>
                                    <!-- Arrow icon aligned to the right -->
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
    </script>
@endsection
