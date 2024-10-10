@extends('user.user_dashboard')
@section('user')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $member->name }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Member {{ $member->name }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <div class="d-flex flex-column h-100">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('member.info.profile', $member->id) }}" class="text-decoration-none">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-muted mb-0">{{ $member->name }}'s Profile</p>
                                                    <h2 class="mt-4 ff-secondary fw-semibold"><span>View Profile</span></h2>

                                                </div>
                                                <div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded-circle fs-2">
                                                            <i data-feather="users" class="text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div> <!-- end card-->
                                </a>
                            </div> <!-- end col-->




                            <div class="col-md-6">
                                <a href="{{ route('member.academic.qualifications', $member->id) }}"
                                    class="text-decoration-none">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-muted mb-0">{{ $member->name }}'s Academic
                                                        Qualification</p>
                                                    <h2 class="mt-4 ff-secondary fw-semibold"><span>View Academic
                                                            Qualifications</span></h2>

                                                </div>
                                                <div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded-circle fs-2">
                                                            <i data-feather="award" class="text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div> <!-- end card-->
                                </a>
                            </div> <!-- end col-->

                            <div class="col-md-6">
                                <a href="{{ route('member.employment.history', $member->id) }}"
                                    class="text-decoration-none">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-muted mb-0">{{ $member->name }}'s
                                                        Employment
                                                        History</p>
                                                    <h2 class="mt-4 ff-secondary fw-semibold"><span>View Employment
                                                            History</span></h2>

                                                </div>
                                                <div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded-circle fs-2">
                                                            <i data-feather="briefcase" class="text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div> <!-- end card-->
                                </a>

                            </div> <!-- end col-->

                         
                        </div> <!-- end row-->


                    </div>
                </div> <!-- end col-->

            </div> <!-- end row-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
