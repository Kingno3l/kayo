@extends('user.user_dashboard')

@section('user')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Profile Header -->
            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <!-- Profile Card -->
                    <div class="card mt-n5">
                        <div class="card-body p-4 text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                <img src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                            </div>
                            <h5 class="fs-16 mb-1">{{ $profileData->name }}</h5>
                            <p class="text-muted mb-0">Member</p>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#employmentHistory"
                                        role="tab">
                                        <i class="fas fa-briefcase"></i>
                                        Document Uploads
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employmentHistory" role="tabpanel">
                                    <div class="row">

                        

                                        <form action="{{ route('profile-management.document-upload.store') }}"
                                            method="POST" enctype="multipart/form-data">
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

                                            <!-- Means of Identification Section -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0 flex-grow-1">Upload Means of
                                                                Identification</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="live-preview">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="identificationInput"
                                                                            class="form-label">Means of
                                                                            Identification</label>
                                                                        <select name="means_of_identification"
                                                                            class="form-control" id="identificationInput"
                                                                            required>
                                                                            <option value="" selected disabled>Select Means of
                                                                                Identification</option>
                                                                            <option value="National ID"
                                                                                {{ trim($meansOfIdentificationType) == 'National ID' ? 'selected' : '' }}>
                                                                                National ID
                                                                            </option>
                                                                            <option value="Driver's License"
                                                                                {{ trim($meansOfIdentificationType) == "Driver's License" ? 'selected' : '' }}>
                                                                                Driver's License
                                                                            </option>
                                                                            <option value="International Passport"
                                                                                {{ trim($meansOfIdentificationType) == 'International Passport' ? 'selected' : '' }}>
                                                                                International Passport
                                                                            </option>
                                                                            <option value="Voter's Card"
                                                                                {{ trim($meansOfIdentificationType) == "Voter's Card" ? 'selected' : '' }}>
                                                                                Voter's Card
                                                                            </option>
                                                                            <option value="Other"
                                                                                {{ trim($meansOfIdentificationType) == 'Other' ? 'selected' : '' }}>
                                                                                Other
                                                                            </option>
                                                                        </select>


                                                                    </div>

                                                                    <div class="col-lg-6 mt-4">
                                                                        @php
                                                                            $meansOfIdDocType = old(
                                                                                'means_of_identification',
                                                                                $meansOfIdentificationType,
                                                                            );
                                                                            $existingIdDoc = $documents
                                                                                ->where(
                                                                                    'documentable_type',
                                                                                    'means of id - ' .
                                                                                        $meansOfIdDocType,
                                                                                )
                                                                                ->first();
                                                                        @endphp
                                                                        @if ($existingIdDoc)
                                                                            <p>Current Document: <a
                                                                                    href="{{ asset('profile_management/identification/' . $existingIdDoc->document) }}"
                                                                                    target="_blank">{{ $existingIdDoc->document }}</a>
                                                                            </p>
                                                                        @endif
                                                                        <input type="file" name="meansofid"
                                                                            {{ $existingIdDoc ? '' : 'required' }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Other Relevant Document Section -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0 flex-grow-1">Other Relevant Document
                                                            </h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="live-preview">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="otherInput" class="form-label">Other
                                                                            Document</label>
                                                                        <input type="text" name="other"
                                                                            class="form-control" id="otherInput"
                                                                            value="{{ old('other', $documentName) }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="col-lg-6 mt-4">
                                                                        <input type="file" name="other_document">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 mt-4">
                                                <button type="submit" class="btn btn-primary w-100">Upload
                                                    Documents</button>
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
                <!-- container-fluid -->
            </div><!-- End Page-content -->



        </div>
    </div>
@endsection
