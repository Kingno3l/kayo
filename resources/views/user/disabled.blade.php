@extends('user.user_dashboard')
@section('user')
    @php
        $id = Auth::user()->id;
        $userId = App\Models\User::find($id);
        $status = $userId->status;
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
                <h4>Instructor Account is <span class="text-success">Active</span></h4>


                <div class="row dash-nft">
                    <div class="col-xxl-12">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-marketplace d-flex">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-18 lh-base mb-0">View and download your <br>
                                                <span class="text-success">Membership ID Card.</span>
                                            </h4>
                                            @if ($hasPaidDues)
                                                <p class="mb-0 mt-2 text-muted">Your ID Card is ready!</p>
                                                <div class="d-flex gap-3 mt-4">
                                                    <a href="{{ route('id-card.show') }}" class="btn btn-success">Download
                                                        Now</a>
                                                </div>
                                            @else
                                                <div class="text-danger pt-5">Kindly pay your yearly dues to access your
                                                    membership card.</div>
                                            @endif

                                        </div>
                                        <img src="assets/images/bg-d.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-height-100">
                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                    <i class="bx bx-dollar-circle text-primary"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ps-3">
                                                <h5 class="text-muted text-uppercase fs-13 mb-0">Yearly Dues</h5>
                                            </div>
                                        </div>
                                        <div class="mt-2 pt-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-0">#<span class="counter-value"
                                                    data-target="50000">50,000</span> </h4>

                                            @if ($hasPaidDues)
                                                <p class="mt-2 mb-0 text-muted"><span
                                                        class="badge bg-success-subtle text-success mb-0 me-1"> <span>
                                                            <i class="ri-arrow-down-line align-middle"></i> Your annual dues
                                                            are
                                                            up to date, continue to enjoy your membership benefits.

                                                        </span>

                                                </p>
                                            @else
                                                <p class="mt-2 mb-0 text-muted"><span
                                                        class="badge bg-danger-subtle text-danger mb-0 me-1"> <span>
                                                            <i class="ri-arrow-down-line align-middle"></i> Please make your
                                                            annual
                                                            dues payment to maintain your membership benefits.
                                                        </span> <a href="{{ route('pay') }}"
                                                            class="btn btn-success">Pay!</a>

                                                </p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->




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
