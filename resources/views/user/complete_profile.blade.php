<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Profile Settings | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">



</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">


        @php
            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);
        @endphp

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt=""
                                        height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>

                    <div class="d-flex align-items-center">



                        <div class="dropdown ms-1 topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="{{ asset('assets/images/flags/us.svg') }}"
                                    alt="Header Language" height="20" class="rounded">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language py-2"
                                    data-lang="en" title="English">
                                    <img src="{{ asset('assets/images/flags/us.svg') }}" alt="user-image"
                                        class="me-2 rounded" height="18">
                                    <span class="align-middle">English</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="fr"
                                    title="French">
                                    <img src="{{ asset('assets/images/flags/fr.svg') }}" alt="user-image"
                                        class="me-2 rounded" height="18">
                                    <span class="align-middle">français</span>
                                </a>


                            </div>
                        </div>





                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>



                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ $profileData->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Member</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ $profileData->name }}!</h6>
                                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>

                                <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Change Password</span></a>



                                <div class="dropdown-divider"></div>



                                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548"
                                style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <p class="text-center fw-bold text-danger m-2"> Welcome {{ $profileData->name }}, Kindly Complete
                        This
                        Section To Access Your Dashboard!!!
                    </p>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg profile-setting-img">
                            <img src="{{ asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img"
                                alt="">

                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card mt-n5">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                            <img src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                                alt="user-profile-image">



                                            <form method="post" action="{{ route('user.profile.complete') }}"
                                                enctype="multipart/form-data" class="row pt-40px">
                                                @csrf


                                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                    <input id="profile-img-file-input" type="file" name="photo"
                                                        class="profile-img-file-input">
                                                    <label for="profile-img-file-input"
                                                        class="profile-photo-edit avatar-xs">
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
                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                                role="tab">
                                                <i class="fas fa-home"></i>
                                                Profile Details
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">

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
                                                        <input type="email" class="form-control" name="email"
                                                            id="emailInput" placeholder="Enter your email"
                                                            value="{{ $profileData->email }}">
                                                    </div>
                                                </div>

                                                <!--end col-->
                                                @include('user._partials.countries')
                                               


                                                <!--end col-->
                                                {{-- @include('user._partials.phone_number') --}}
                                               <div class="col-lg-6">
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value="{{ old('phone', $profileData->phone) }}">
    </div>
</div>

                                                <!--end col-->



                                             <div class="col-lg-4">
    <div class="mb-3">
        <label for="maritalStatusInput" class="form-label">Marital Status</label>
        <select class="form-select mb-3" id="maritalStatusInput" name="marital_status" aria-label="Marital Status">
            <option value="" {{ old('marital_status', $profileData->marital_status) == '' ? 'selected' : '' }}>
                Select Marital Status
            </option>
            <option value="Single" {{ old('marital_status', $profileData->marital_status) == 'Single' ? 'selected' : '' }}>
                Single
            </option>
            <option value="Married" {{ old('marital_status', $profileData->marital_status) == 'Married' ? 'selected' : '' }}>
                Married
            </option>
            
        </select>
    </div>
</div>

<div class="col-lg-4">
    <div class="mb-3">
        <label for="genderInput" class="form-label">Gender</label>
        <select class="form-select mb-3" id="genderInput" name="gender" aria-label="Gender">
            <option value="" {{ old('gender', $profileData->gender) == '' ? 'selected' : '' }}>
                Select Gender
            </option>
            <option value="Male" {{ old('gender', $profileData->gender) == 'Male' ? 'selected' : '' }}>
                Male
            </option>
            <option value="Female" {{ old('gender', $profileData->gender) == 'Female' ? 'selected' : '' }}>
                Female
            </option>
        </select>
    </div>
</div>

<div class="col-lg-4">
    <div class="mb-3">
        <label for="dobInput" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dobInput" name="date_of_birth" value="{{ old('date_of_birth', $profileData->date_of_birth) }}" aria-label="Date of Birth">
    </div>
</div>




                                             <div class="col-lg-4">
    <div class="mb-3">
        <label for="educationInput" class="form-label">Highest level of Education</label>
        <select class="form-select mb-3" id="educationInput" name="education" aria-label="Default select example">
            <option value="" {{ old('education', $profileData->education) == '' ? 'selected' : '' }}>
                Select your Highest level of Education
            </option>
            <option value="High School Diploma" {{ old('education', $profileData->education) == 'High School Diploma' ? 'selected' : '' }}>
                High School Diploma
            </option>
            <option value="Associate Degree" {{ old('education', $profileData->education) == 'Associate Degree' ? 'selected' : '' }}>
                Associate Degree
            </option>
            <option value="Bachelor’s Degree" {{ old('education', $profileData->education) == 'Bachelor’s Degree' ? 'selected' : '' }}>
                Bachelor’s Degree
            </option>
            <option value="Master’s Degree" {{ old('education', $profileData->education) == 'Master’s Degree' ? 'selected' : '' }}>
                Master’s Degree
            </option>
            <option value="Doctorate (Ph.D.)" {{ old('education', $profileData->education) == 'Doctorate (Ph.D.)' ? 'selected' : '' }}>
                Doctorate (Ph.D.)
            </option>
            <option value="Professional Certificate" {{ old('education', $profileData->education) == 'Professional Certificate' ? 'selected' : '' }}>
                Professional Certificate
            </option>
            <option value="Some College (No Degree)" {{ old('education', $profileData->education) == 'Some College (No Degree)' ? 'selected' : '' }}>
                Some College (No Degree)
            </option>
            <option value="Vocational Training" {{ old('education', $profileData->education) == 'Vocational Training' ? 'selected' : '' }}>
                Vocational Training
            </option>
            <option value="Online Course" {{ old('education', $profileData->education) == 'Online Course' ? 'selected' : '' }}>
                Online Course
            </option>
            <option value="Not Applicable" {{ old('education', $profileData->education) == 'Not Applicable' ? 'selected' : '' }}>
                Not Applicable
            </option>
        </select>
    </div>
</div>

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
                                                        <select class="form-select mb-3" id="employerInput"
                                                            name="employer" aria-label="Default select example">
                                                            <option value=""
                                                                {{ $profileData->employer == '' ? 'selected' : '' }}>
                                                                Select your
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
                                                                {{ $profileData->employer == 'Retired' ? 'selected' : '' }}>
                                                                Retired
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
                                                                {{ $profileData->employer == 'Actuary' ? 'selected' : '' }}>
                                                                Actuary
                                                            </option>
                                                            <option value="Regulator"
                                                                {{ $profileData->employer == 'Regulator' ? 'selected' : '' }}>
                                                                Regulator</option>
                                                            <option value="Others"
                                                                {{ $profileData->employer == 'Others' ? 'selected' : '' }}>
                                                                Others
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
                                                        <label for="currentEmployerNameInput"
                                                            class="form-label">Current Employer
                                                            Name</label>
                                                        <input type="text" class="form-control"
                                                            id="currentEmployerNameInput" name="current_employer_name"
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
                                                        <input type="date" class="form-control"
                                                            id="currentEmployerDateInput" name="current_employer_date"
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
                                                        <label for="previousEmployerNameInput"
                                                            class="form-label">Previous
                                                            Employer Name</label>
                                                        <input type="text" class="form-control"
                                                            id="previousEmployerNameInput"
                                                            name="previous_employer_name"
                                                            value="{{ $profileData->previous_employer_name ?? '' }}"
                                                            placeholder="Enter Previous Employer Name">
                                                    </div>
                                                </div>
                                                <div id="previousEmployerStartDate"
                                                    style="display: {{ $profileData->employer == 'Previous Employer' ? 'block' : 'none' }};"
                                                    class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="previousEmployerStartDateInput"
                                                            class="form-label">Start
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
                                                        <label for="previousEmployerEndDateInput"
                                                            class="form-label">End
                                                            Date</label>
                                                        <input type="date" class="form-control"
                                                            id="previousEmployerEndDateInput"
                                                            name="previous_employer_end_date"
                                                            value="{{ $profileData->previous_employer_end_date ?? '' }}"
                                                            max="{{ date('Y-m-d') }}">
                                                    </div>
                                                </div>



                                                <!--end col-->

                                                <div class="col-lg-12">
    <div class="mb-3 pb-2">
        <label for="exampleFormControlTextarea" class="form-label">Short Bio</label>
        <textarea class="form-control" name="short_bio" id="exampleFormControlTextarea" placeholder="Enter your description" rows="3">{{ old('short_bio', $profileData->short_bio) }}</textarea>
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


                        </div>
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div><!-- End Page-content -->


            @include('user._partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>





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


    <!-- jQuery (required for Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core Plugins -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/plugins.js') }}"></script> --}}

    <!-- File Uploads -->
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>

    <!-- Form Libraries -->
    <script src="{{ asset('assets/libs/multi.js/multi.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>

    <!-- Form Initialization -->
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-input-spin.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/flag-input.init.js') }}"></script> --}}

    <!-- ApexCharts (Charts and Dashboard) -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-crm.init.js') }}"></script>

    <!-- Toastr JS (After jQuery) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Toastr Notifications -->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>


</body>

</html>
