@extends('admin.admin_dashboard')
@section('admin')
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Admin - YIPs</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Admin - YIPs</li>
                            </ol>
                        </div>

                    </div>
                </div>

                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
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

                                <h4 class="fs-16 mb-1">{{ $greeting }}, {{ $profileData->name }}!</h4>
                                <p class="text-muted mb-0">Here's what's happening with your store
                                    today.</p>
                            </div>

                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card crm-widget">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-3 row-cols-md-3 row-cols-1 g-0">
    <div class="col">
        <div class="py-4 px-3">
            <h5 class="text-muted text-uppercase fs-13">Registered User Completed
                <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
            </h5>
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="ri-user-follow-line display-6 text-muted"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h2 class="mb-0">
                        <span class="counter-value" data-target="{{ $totalCompletedUsers }}">{{ $totalCompletedUsers }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col">
        <div class="mt-3 mt-md-0 py-4 px-3">
            <h5 class="text-muted text-uppercase fs-13">Total Registered Users
                <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
            </h5>
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="ri-group-line display-6 text-muted"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h2 class="mb-0">
                        <span class="counter-value" data-target="{{ $totalRegisteredUsers }}">{{ $totalRegisteredUsers }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col">
        <div class="mt-3 mt-md-0 py-4 px-3">
            <h5 class="text-muted text-uppercase fs-13">Total Users Annual Due Paid
                <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i>
            </h5>
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="ri-money-dollar-circle-line display-6 text-muted"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h2 class="mb-0">
                        <span class="counter-value" data-target="{{ $totalPaidDuesUsers }}">{{ $totalPaidDuesUsers }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
@endsection
