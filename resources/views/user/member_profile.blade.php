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



                                </div>
                                <h5 class="fs-16 mb-1">{{ $profileData->name }}</h5>
                                <p class="text-muted mb-0">Member</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->


                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Profile Details</h5>
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
                                            {{-- <td class="text-muted">
                                                {!! !empty($profileData->phone) && !empty($profileData->country_code)
                                                    ? $profileData->country_code . ' ' . $profileData->phone
                                                    : '<em>No record for this</em>' !!}
                                            </td> --}}
                                             <td class="text-muted">
                                                {!! !empty($profileData->phone)
                                                    ? $profileData->phone
                                                    : '<em>No record for this</em>' !!}
                                            </td>

                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Country:</th>
                                            <td class="text-muted">
                                                {!! !empty($profileData->country) ? $profileData->country : '<em>No record for this</em>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Employer:</th>
                                            <td class="text-muted">
                                                {!! !empty($profileData->employer) ? $profileData->employer : '<em>No record for this</em>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Position:</th>
                                            <td class="text-muted">
                                                {!! !empty($profileData->position) ? $profileData->position : '<em>No record for this</em>' !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="ps-0" scope="row">Education:</th>
                                            <td class="text-muted">
                                                {!! !empty($profileData->education) ? $profileData->education : '<em>No record for this</em>' !!}

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

                        <div class="col-xxl-9">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Short Bio</h5>
                                    <p>
                                        {!! !empty($profileData->short_bio) ? $profileData->short_bio : '<em>No record for this</em>' !!}
                                    </p>
                                    <div class="row mt-4">
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-user-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Designation:</p>
                                                    <h6 class="text-truncate mb-0">Member</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
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

                                    </div>
                                    
                                </div>
                                
                            @endif
                        </div>
                        <div class="col-md-6">
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



                        </div>
                        
                    </div>


                </div>
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

@endsection
