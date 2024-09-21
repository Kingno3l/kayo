@extends('user.user_dashboard')
@section('user')
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
                                    Member's registration number.
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
                                        Academic Qualification
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">S/N</th>
                                                <th class="text-center" scope="col">Name</th>
                                                <th class="text-center" scope="col">Degree Type</th>
                                                <th class="text-center" scope="col">Institution</th>
                                                <th class="text-center" scope="col">Graduation Year</th>
                                                <th class="text-center" scope="col">Grade</th>
                                                <th class="text-center" scope="col">Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($academicQualifications as $index => $qualification)
                                                <tr>
                                                    <th scope="row" class="text-center">{{ $index + 1 }}</th>
                                                    <td class="text-center">{{ $profileData->name }}</td>
                                                    <td class="text-center">{{ $qualification->degree }}</td>
                                                    <td class="text-center">{{ $qualification->institution }}</td>
                                                    <td class="text-center">{{ $qualification->graduation_year }}</td>
                                                    <td class="text-center">{{ $qualification->grade }}</td>
                                                    <td class="text-center">
                                                        {{ $qualification->created_at->format('M d, Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Uploaded File by Member</h5>
                                </div>
                            </div>

                            @if ($uploadedFiles->isEmpty())
                                <p>No files uploaded by the member.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($uploadedFiles as $file)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="{{ asset('profile_management/academic_qualification/' . $file->document) }}"
                                                    target="_blank" class="text-primary">
                                                    {{ $file->document }} <!-- This should be the filename you saved -->
                                                </a>
                                            </div>
                                            
                                        </li>
                                    @endforeach
                                </ul>
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
