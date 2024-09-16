@extends('user.user_dashboard')
@section('user')
    @if (session()->has('error'))
        {{ session()->get('error') }}
    @endif

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pricing</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Pricing</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <div class="text-center mb-4">
                        <h4 class="fw-semibold fs-22">Membership Dues</h4>
                        <p class="text-muted mb-4 fs-15">This is due annually, and it is non-refundable.
                        </p>

                        <div class="d-inline-flex">
                            <ul class="nav nav-pills arrow-navtabs plan-nav rounded mb-3 p-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-semibold active" id="month-tab" data-bs-toggle="pill"
                                        data-bs-target="#month" type="button" role="tab"
                                        aria-selected="true">Annually</button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="row justify-content-center">

                        <div class="col-lg-4">
                            <div class="card pricing-box ribbon-box right">
                                <div class="card-body p-4 m-2">
                                    <div class="ribbon-two ribbon-two-success"><span>Dues</span></div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">Membership Dues</h5>
                                                <p class="text-muted mb-0">Annual Payment</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                    <i class="ri-medal-line fs-20"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <h2><sup><small>#</small></sup> 50,000<span
                                                    class="fs-13 text-muted">/Yearly</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled vstack gap-3 text-muted">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>15</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Customers
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>

                                        <form action="{{ route('pay') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="email" value="{{ $profileData->email }}">
                                            <input type="hidden" name="id" value="{{ $profileData->id }}">

                                            <div class="mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary w-100 waves-effect waves-light"
                                                    {{ $hasPaid ? 'disabled' : '' }}>
                                                    {{ $hasPaid ? 'Payment already made for this year' : 'Pay!' }}
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->


        </div>
        <!-- container-fluid -->
    </div>
@endsection
