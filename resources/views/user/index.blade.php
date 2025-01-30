@extends('user.user_dashboard')
@section('user')
    {{-- @php
        $id = Auth::user()->id;
        $userId = App\Models\User::find($id);
        $status = $userId->status;
        $dateOfBirth = $userId->date_of_birth; // Get the user's date_of_birth
$age = \Carbon\Carbon::parse($dateOfBirth)->age; // Calculate age

// Check academic qualifications
$qualification = App\Models\ProfileManagement\AcademicQualification::where('user_id', $id)->latest()->first();
        $graduationYear = $qualification ? $qualification->graduation_year : null;
        $currentYear = \Carbon\Carbon::now()->year; // Get the current year
    @endphp --}}

    @php
    $id = Auth::user()->id;
    $userId = App\Models\User::find($id);
            $status = $userId->status;

    $dateOfBirth = $userId->date_of_birth; // Get the user's date_of_birth
    $age = \Carbon\Carbon::parse($dateOfBirth)->age; // Calculate age

    // Get the current year
    $currentYear = \Carbon\Carbon::now()->year;

    // Check academic qualifications
    $qualification = App\Models\ProfileManagement\AcademicQualification::where('user_id', $id)
        ->whereIn('degree', ['Bachelor of Arts', 'Bachelor of Science'])  // Only check for BA or BS
        ->orderBy('graduation_year', 'desc') // Get the most recent qualification
        ->first();
    
    // Check if the user has a valid degree and graduation year
    $isEligibleForMembership = $qualification && $qualification->graduation_year <= $currentYear;
    
    // Check if the user has a valid degree and is eligible as a student member
    $isStudentMember = $qualification && $qualification->graduation_year > $currentYear;

@endphp


    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">YIPS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">YIPS</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">

                            @php
                                // Get the current hour in 24-hour format
                                $currentHour = date('H');

                                // Determine the part of the day based on the current hour
                                if ($currentHour >= 5 && $currentHour < 12) {
                                    $greeting = 'Good Morning';
                                } elseif ($currentHour >= 12 && $currentHour < 17) {
                                    $greeting = 'Good Afternoon';
                                } else {
                                    $greeting = 'Good Evening';
                                }
                            @endphp
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">{{ $greeting }}, {{ $profileData->name }}</h4>
                                <p class="text-muted mb-0">Here's what's your dashboard looks like today.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            @if ($status === '1')
                <h4>User Account is <span class="text-success">Active</span></h4>


                <div class="row dash-nft">
                    <div class="col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-marketplace d-flex">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-18 lh-base mb-0">View and download your <br>
                                                <span class="text-success">Membership ID Card. <a
                                                        href="{{ route('id-card.show') }}"
                                                        class="btn btn-success">Here!</a></span>
                                            </h4>

                                            {{-- @if ($hasProfileDetails)
                                                <p class="mb-0 mt-2 text-muted">Your ID Card is ready!</p>
                                                <div class="d-flex gap-3 mt-4">
                                                    <a href="{{ route('id-card.show') }}" class="btn btn-success">Download
                                                        Now</a>
                                                </div>
                                            @else
                                                <div class="text-danger pt-5">Kindly pay your yearly dues to access your
                                                    membership card.</div>
                                            @endif --}}

                                        </div>
                                        <img src="assets/images/bg-d.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->



                            {{-- @if ($graduationYear && $graduationYear > $currentYear)
                                <div class="card overflow-hidden shadow-none">
                                    <div class="card-body bg-primary-subtle">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm">
                                                    <div
                                                        class="avatar-title bg-primary bg-opacity-10 text-primary rounded-circle fs-17">
                                                        <i class="ri-book-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-16">You are a student member.</h6>
                                                <p class="text-muted mb-0">Your graduation year is {{ $graduationYear }}.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($age < 40)
                                <div class="card overflow-hidden shadow-none">
                                    <div class="card-body bg-success-subtle">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm">
                                                    <div
                                                        class="avatar-title bg-success bg-opacity-10 text-success rounded-circle fs-17">
                                                        <i class="ri-user-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-16">You are {{ $age }} years old.</h6>
                                                <p class="text-muted mb-0">You are a member.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card overflow-hidden shadow-none">
                                    <div class="card-body bg-warning-subtle">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm">
                                                    <div
                                                        class="avatar-title bg-warning bg-opacity-10 text-warning rounded-circle fs-17">
                                                        <i class="ri-gift-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-16">You are {{ $age }} years old.</h6>
                                                <p class="text-muted mb-0">You are an associate member.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif --}}

                          @if (!$isEligibleForMembership)
    <!-- Not Eligible for Membership -->
    <div class="card overflow-hidden shadow-none">
        <div class="card-body bg-danger-subtle">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avatar-sm">
                        <div class="avatar-title bg-danger bg-opacity-10 text-danger rounded-circle fs-17">
                            <i class="ri-alert-line"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="fs-16">Membership Not Allowed</h6>
                    <p class="text-muted mb-0">You do not have the necessary academic qualifications to become a member.</p>
                </div>
            </div>
        </div>
    </div>
@elseif ($isStudentMember)
    <!-- Student Member -->
    <div class="card overflow-hidden shadow-none">
        <div class="card-body bg-primary-subtle">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avatar-sm">
                        <div class="avatar-title bg-primary bg-opacity-10 text-primary rounded-circle fs-17">
                            <i class="ri-book-line"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="fs-16">You are a student member.</h6>
                    <p class="text-muted mb-0">Your graduation year is beyond {{ $currentYear }}.</p>
                </div>
            </div>
        </div>
    </div>
@elseif ($age <= 39)
    <!-- Regular Member -->
    <div class="card overflow-hidden shadow-none">
        <div class="card-body bg-success-subtle">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avatar-sm">
                        <div class="avatar-title bg-success bg-opacity-10 text-success rounded-circle fs-17">
                            <i class="ri-user-line"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="fs-16">You are {{ $age }} years old.</h6>
                    <p class="text-muted mb-0">You are a member.</p>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Associate Member -->
    <div class="card overflow-hidden shadow-none">
        <div class="card-body bg-warning-subtle">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avatar-sm">
                        <div class="avatar-title bg-warning bg-opacity-10 text-warning rounded-circle fs-17">
                            <i class="ri-gift-line"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="fs-16">You are {{ $age }} years old.</h6>
                    <p class="text-muted mb-0">You are an associate member.</p>
                </div>
            </div>
        </div>
    </div>
@endif

                        </div>







                    </div><!--end row-->


                </div><!--end col-->


        </div>
    @else
        <h4>Member Account is blocked and therefore <span class="text-danger">Inactive</span></h4>
        <p class="text-danger"> <b>Kindly contact administor for further details.</b></p>
        @endif
    </div>
    <!-- container-fluid -->
    </div>
@endsection
