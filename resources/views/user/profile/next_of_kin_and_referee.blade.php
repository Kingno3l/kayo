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
                                        Next of Kin and Referee Information
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employmentHistory" role="tabpanel">
                                    <div class="row">
                                      <form action="{{ route('profile-management.next-of-kin-and-referee.store') }}" method="POST" enctype="multipart/form-data">
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

    <!-- Next of Kin Section -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Next of Kin</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Fullname" class="form-label">Full Name</label>
                                <input type="text" name="next_of_kin_full_name"
                                       placeholder="Next of Kin Full Name"
                                       class="form-control"
                                       id="Fullname"
                                       value="{{ old('next_of_kin_full_name', $profileData->next_of_kin_full_name) }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="relationshipInput" class="form-label">Relationship</label>
                                <select name="next_of_kin_relationship"
                                        class="form-control"
                                        id="relationshipInput">
                                    <option value="" disabled>Select Relationship</option>
                                    <option value="Parent" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Parent' ? 'selected' : '' }}>Parent</option>
                                    <option value="Sibling" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Sibling' ? 'selected' : '' }}>Sibling</option>
                                    <option value="Spouse" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                    <option value="Child" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Child' ? 'selected' : '' }}>Child</option>
                                    <option value="Friend" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Friend' ? 'selected' : '' }}>Friend</option>
                                    <option value="Colleague" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Colleague' ? 'selected' : '' }}>Colleague</option>
                                    <option value="Other" {{ old('next_of_kin_relationship', $profileData->next_of_kin_relationship) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="next_of_kin_email"
                                       placeholder="Next of Kin Email"
                                       class="form-control"
                                       id="email"
                                       value="{{ old('next_of_kin_email', $profileData->next_of_kin_email) }}">
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="phone" class="form-label">Next of Kin Phone Number</label>
                                <input type="tel" name="next_of_kin_phone"
                                       class="form-control"
                                       id="phone"
                                       placeholder="Kindly include country code"
                                       value="{{ old('next_of_kin_phone', $profileData->next_of_kin_phone) }}">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="address" class="form-label">Next of Kin Address</label>
                                <textarea name="next_of_kin_address"
                                          class="form-control"
                                          id="address"
                                          rows="3">{{ old('next_of_kin_address', $profileData->next_of_kin_address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Referee 1 Section -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Referee 1</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="referee1FullName" class="form-label">Full Name</label>
                                <input type="text" name="referee1_full_name"
                                       placeholder="Referee 1 Full Name"
                                       class="form-control"
                                       id="referee1FullName"
                                       value="{{ old('referee1_full_name', $profileData->referee1_full_name) }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="referee1Relationship" class="form-label">Relationship</label>
                                <select name="referee1_relationship"
                                        class="form-control"
                                        id="referee1Relationship">
                                    <option value="" disabled>Select Relationship</option>
                                    <option value="Parent" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Parent' ? 'selected' : '' }}>Parent</option>
                                    <option value="Sibling" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Sibling' ? 'selected' : '' }}>Sibling</option>
                                    <option value="Spouse" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                    <option value="Child" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Child' ? 'selected' : '' }}>Child</option>
                                    <option value="Friend" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Friend' ? 'selected' : '' }}>Friend</option>
                                    <option value="Colleague" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Colleague' ? 'selected' : '' }}>Colleague</option>
                                    <option value="Other" {{ old('referee1_relationship', $profileData->referee1_relationship) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="referee1Email" class="form-label">Email</label>
                                <input type="email" name="referee1_email"
                                       placeholder="Referee 1 Email"
                                       class="form-control"
                                       id="referee1Email"
                                       value="{{ old('referee1_email', $profileData->referee1_email) }}">
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="referee1Phone" class="form-label">Phone Number</label>
                                <input type="tel" name="referee1_phone"
                                       class="form-control"
                                       id="referee1Phone"
                                       placeholder="Kindly include country code"
                                       value="{{ old('referee1_phone', $profileData->referee1_phone) }}">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="referee1Address" class="form-label">Address</label>
                                <textarea name="referee1_address"
                                          class="form-control"
                                          id="referee1Address"
                                          rows="3">{{ old('referee1_address', $profileData->referee1_address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Referee 2 Section -->
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Referee 2</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="referee2FullName" class="form-label">Full Name</label>
                                <input type="text" name="referee2_full_name"
                                       placeholder="Referee 2 Full Name"
                                       class="form-control"
                                       id="referee2FullName"
                                       value="{{ old('referee2_full_name', $profileData->referee2_full_name) }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="referee2Relationship" class="form-label">Relationship</label>
                                <select name="referee2_relationship"
                                        class="form-control"
                                        id="referee2Relationship">
                                    <option value="" disabled>Select Relationship</option>
                                    <option value="Parent" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Parent' ? 'selected' : '' }}>Parent</option>
                                    <option value="Sibling" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Sibling' ? 'selected' : '' }}>Sibling</option>
                                    <option value="Spouse" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                    <option value="Child" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Child' ? 'selected' : '' }}>Child</option>
                                    <option value="Friend" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Friend' ? 'selected' : '' }}>Friend</option>
                                    <option value="Colleague" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Colleague' ? 'selected' : '' }}>Colleague</option>
                                    <option value="Other" {{ old('referee2_relationship', $profileData->referee2_relationship) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="referee2Email" class="form-label">Email</label>
                                <input type="email" name="referee2_email"
                                       placeholder="Referee 2 Email"
                                       class="form-control"
                                       id="referee2Email"
                                       value="{{ old('referee2_email', $profileData->referee2_email) }}">
                            </div>

                            <div class="col-lg-6 mt-2">
                                <label for="referee2Phone" class="form-label">Phone Number</label>
                                <input type="tel" name="referee2_phone"
                                       class="form-control"
                                       id="referee2Phone"
                                       placeholder="Kindly include country code"
                                       value="{{ old('referee2_phone', $profileData->referee2_phone) }}">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="referee2Address" class="form-label">Address</label>
                                <textarea name="referee2_address"
                                          class="form-control"
                                          id="referee2Address"
                                          rows="3">{{ old('referee2_address', $profileData->referee2_address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="col-lg-12 mt-4">
        <button type="submit" class="btn btn-primary w-100">Update Next of Kin and Referees</button>
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
