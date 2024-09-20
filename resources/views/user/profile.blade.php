@extends('user.user_dashboard')
@section('user')
    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            <img src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                alt="user-img" class="img-thumbnail rounded-circle" />
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{ $profileData->name }}</h3>
                            <p class="text-white text-opacity-75">Member</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                        class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                    {!! !empty($profileData->country) ? $profileData->country : '<em> Update your profile </em>' !!}</div>
                                <div><i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                    {!! !empty($profileData->employer) ? $profileData->employer : '<em>Update your profile</em>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->


                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex profile-wrapper">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                        role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Overview</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="flex-shrink-0">
                                <a href="{{ route('user.profile.edit') }}" class="btn btn-success"><i
                                        class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">


                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Full Name :</th>
                                                                <td class="text-muted">{{ $profileData->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">E-mail :</th>
                                                                <td class="text-muted">{{ $profileData->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Mobile:</th>
                                                                <td class="text-muted">
                                                                    {!! !empty($profileData->phone) && !empty($profileData->country_code)
                                                                        ? $profileData->country_code . ' ' . $profileData->phone
                                                                        : '<em>Update your profile</em>' !!}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Country:</th>
                                                                <td class="text-muted">
                                                                    {!! !empty($profileData->country) ? $profileData->country : '<em>Update your profile</em>' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Employer:</th>
                                                                <td class="text-muted">
                                                                    {!! !empty($profileData->employer) ? $profileData->employer : '<em>Update your profile</em>' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Position:</th>
                                                                <td class="text-muted">
                                                                    {!! !empty($profileData->position) ? $profileData->position : '<em>Update your profile</em>' !!}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th class="ps-0" scope="row">Education:</th>
                                                                <td class="text-muted">
                                                                    {!! !empty($profileData->education) ? $profileData->education : '<em>Update your profile</em>' !!}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Joined Date</th>
                                                                <td class="text-muted">
                                                                    {{ $profileData->created_at->format('d M Y') }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                         <div class="card">
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
                                @endif
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-info text-light">
                                            <i class="ri-linkedin-fill"></i>
                                        </span>
                                    </div>
                                    <input type="url" class="form-control" name="linkedin"
                                        placeholder="www.linkedin.com/yips-africa">
                                </div>
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                            <i class="ri-facebook-fill"></i>
                                        </span>
                                    </div>
                                    <input type="url" class="form-control" name="facebook"
                                        placeholder="www.facebook.com/yips-africa">
                                </div>
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-danger text-light">
                                            <i class="ri-instagram-fill"></i>
                                        </span>
                                    </div>
                                    <input type="url" class="form-control" name="instagram"
                                        placeholder="www.instagram.com/yips-africa">
                                </div>
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-warning text-light">
                                            <i class="ri-snapchat-fill"></i>
                                        </span>
                                    </div>
                                    <input type="url" class="form-control" name="snapchat"
                                        placeholder="www.snapchat.com/yips-africa">
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <button type="submit" class="btn btn-success w-100">Save
                                        Socials</button>
                                </div>
                            </form>



                        </div>
                    </div>

                                        @if ($socials)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Socials</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @if ($socials->linkedin)
                                                            <div>
                                                                <a href="{{ strpos($socials->linkedin, 'http') === 0 ? $socials->linkedin : 'https://' . $socials->linkedin }}"
                                                                    class="avatar-xs d-block" target="_blank"
                                                                    rel="noopener noreferrer">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-info text-light">
                                                                        <i class="ri-linkedin-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @if ($socials->facebook)
                                                            <div>
                                                                <a href="{{ strpos($socials->facebook, 'http') === 0 ? $socials->facebook : 'https://' . $socials->facebook }}"
                                                                    class="avatar-xs d-block" target="_blank"
                                                                    rel="noopener noreferrer">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                                                        <i class="ri-facebook-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @if ($socials->instagram)
                                                            <div>
                                                                <a href="{{ strpos($socials->instagram, 'http') === 0 ? $socials->instagram : 'https://' . $socials->instagram }}"
                                                                    class="avatar-xs d-block" target="_blank"
                                                                    rel="noopener noreferrer">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-danger text-light">
                                                                        <i class="ri-instagram-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @if ($socials->snapchat)
                                                            <div>
                                                                <a href="{{ strpos($socials->snapchat, 'http') === 0 ? $socials->snapchat : 'https://' . $socials->snapchat }}"
                                                                    class="avatar-xs d-block" target="_blank"
                                                                    rel="noopener noreferrer">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-warning text-light">
                                                                        <i class="ri-snapchat-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div><!-- end card body -->
                                            </div>
                                        @endif


                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Registration Number</h5>
                                                <div class="d-flex flex-wrap gap-2">



                                                    @if ($profileData->registration_number)
                                                        <div class="card ribbon-box border shadow-none overflow-hidden">
                                                            <div class="card-body text-muted">
                                                                <div
                                                                    class="ribbon ribbon-success ribbon-shape trending-ribbon">
                                                                    <span class="trending-ribbon-text">Registration
                                                                        Number</span>
                                                                    <i
                                                                        class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
                                                                </div>
                                                                <h5 class="fs-14 text-end mb-3">
                                                                    {{ $profileData->registration_number }}
                                                                </h5>
                                                                <p class="mb-0">
                                                                    Please note that your registration number is assigned
                                                                    based on your initial country of registration and cannot
                                                                    be changed or reset if you update your country
                                                                    information. This number is generated only once and
                                                                    remains the same throughout your membership.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div><!-- end card body -->
                                        </div>


                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">About</h5>
                                                <p>{!! !empty($profileData->short_bio) ? $profileData->short_bio : '<em>Update your profile</em>' !!}</p>
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                <div
                                                                    class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                    <i class="ri-user-2-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Designation :</p>
                                                                <h6 class="text-truncate mb-0">Member</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-body-->
                                        </div><!-- end card -->


                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
