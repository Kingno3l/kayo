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



                                </div>
                                <h5 class="fs-16 mb-1">{{ $profileData->name }}</h5>
                                <p class="text-muted mb-0">Member</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->

                    

                    @if ($profileData->registration_number)
                        <div class="card ribbon-box border shadow-none overflow-hidden">
                            <div class="card-body text-muted">
                                <div class="ribbon ribbon-primary ribbon-shape trending-ribbon">
                                    <span class="trending-ribbon-text">Registration Number</span>
                                    <i class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
                                </div>
                                <h5 class="fs-14 text-end mb-3">
                                    {{ $profileData->registration_number }}
                                </h5>
                                <p class="mb-0">
                                    Please note that your registration number is assigned based on your initial country of
                                    registration and cannot be changed or reset if you update your country information. This
                                    number is generated only once and remains the same throughout your membership.
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
                                        Personal Details
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">

                                    <div class="row">

                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="exampleInputdate" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="exampleInputdate">
                                            </div>
                                        </div>

                                        <!-- Gender Dropdown -->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="genderInput" class="form-label">Gender</label>
                                                <select class="form-select mb-3" id="genderInput" name="gender"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->gender == '' ? 'selected' : '' }}>Select your
                                                        Gender</option>
                                                    <option value="Male"
                                                        {{ $profileData->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female"
                                                        {{ $profileData->gender == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Marital Status Dropdown -->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="maritalStatusInput" class="form-label">Marital Status</label>
                                                <select class="form-select mb-3" id="maritalStatusInput"
                                                    name="marital_status" aria-label="Default select example">
                                                    <option value=""
                                                        {{ $profileData->marital_status == '' ? 'selected' : '' }}>Select
                                                        your Marital Status</option>
                                                    <option value="Single"
                                                        {{ $profileData->marital_status == 'Single' ? 'selected' : '' }}>
                                                        Single</option>
                                                    <option value="Married"
                                                        {{ $profileData->marital_status == 'Married' ? 'selected' : '' }}>
                                                        Married</option>
                                                   
                                                </select>
                                            </div>
                                        </div>


                                        <form action="{{ route('profile-management.store') }}" method="POST">
                                            @csrf

                                            <!-- Academic Qualifications Section -->
                                            <div class="row" id="qualifications-container">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0 flex-grow-1">Academic Qualifications
                                                            </h4>
                                                            <button type="button" class="btn btn-success ms-auto"
                                                                onclick="addQualification()">Add Qualification</button>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="live-preview">
                                                                <div class="row qualification-item">
                                                                    <div class="col-lg-6">
                                                                        <label for="degreeInput"
                                                                            class="form-label">Degree</label>
                                                                        <select name="degree[]" class="form-control"
                                                                            id="degreeInput">
                                                                            <option value="" disabled selected>Select
                                                                                Degree</option>
                                                                            <option value="Bachelor of Science">Bachelor of
                                                                                Science (B.Sc.)</option>
                                                                            <option value="Bachelor of Arts">Bachelor of
                                                                                Arts (B.A.)</option>
                                                                            <option value="Master of Science">Master of
                                                                                Science (M.Sc.)</option>
                                                                            <option value="Master of Arts">Master of Arts
                                                                                (M.A.)</option>
                                                                            <option value="Doctor of Philosophy">Doctor of
                                                                                Philosophy (Ph.D.)</option>
                                                                            <option value="Diploma">Diploma</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="institutionInput"
                                                                            class="form-label">Institution</label>
                                                                        <input type="text" name="institution[]"
                                                                            class="form-control" id="institutionInput">
                                                                    </div>

                                                                   
                                                                    <div class="col-lg-6">
                                                                        <label for="gradeInput"
                                                                            class="form-label">Grade</label>
                                                                        <input type="text" name="grade[]"
                                                                            class="form-control" id="gradeInput">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Employment History Section -->
                                            <div class="row" id="employment-history-container">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0 flex-grow-1">Employment History</h4>
                                                            <button type="button" class="btn btn-success ms-auto"
                                                                onclick="addEmploymentHistory()">Add Employment</button>
                                                        </div>
                                                        <div class="row employment-history-item">
                                                            <!-- Existing fields... -->
                                                            <div class="col-lg-12">
                                                                <button type="button"
                                                                    class="btn btn-danger remove-btn d-none">Remove</button>
                                                            </div>
                                                        </div>

                                                        <div class="row qualification-item">
                                                            <!-- Existing fields... -->
                                                            <div class="col-lg-12">
                                                                <button type="button"
                                                                    class="btn btn-danger remove-btn d-none">Remove</button>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="live-preview">
                                                                <div class="row employment-history-item">
                                                                    <div class="col-lg-6">
                                                                        <label for="jobTitleInput" class="form-label">Job
                                                                            Title</label>
                                                                        <input type="text" name="job_title[]"
                                                                            class="form-control" id="jobTitleInput">
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="companyInput"
                                                                            class="form-label">Company</label>
                                                                        <input type="text" name="company[]"
                                                                            class="form-control" id="companyInput">
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="startDateInput"
                                                                            class="form-label">Start Date</label>
                                                                        <input type="date" name="start_date[]"
                                                                            class="form-control" id="startDateInput">
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="endDateInput" class="form-label">End
                                                                            Date</label>
                                                                        <input type="date" name="end_date[]"
                                                                            class="form-control" id="endDateInput">
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="responsibilitiesInput"
                                                                            class="form-label">Responsibilities</label>
                                                                        <textarea name="responsibilities[]" class="form-control" id="responsibilitiesInput" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Save Profile</button>
                                            </div>
                                        </form>

                                        <script>
                                            // Function to add a new qualification entry
                                            function addQualification() {
                                                const qualificationsContainer = document.getElementById('qualifications-container');
                                                const newQualificationItem = document.createElement('div');
                                                newQualificationItem.classList.add('row', 'qualification-item');
                                                newQualificationItem.innerHTML = `
        <div class="col-lg-6">
            <label for="degreeInput" class="form-label">Degree</label>
            <select name="degree[]" class="form-control">
                <option value="" disabled selected>Select Degree</option>
                <!-- Degree options... -->
            </select>
        </div>
        <div class="col-lg-6">
            <label for="institutionInput" class="form-label">Institution</label>
            <input type="text" name="institution[]" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="graduationYearInput" class="form-label">Graduation Year</label>
            <select name="graduation_year[]" class="form-control">
                <!-- Graduation year options... -->
            </select>
        </div>
        <div class="col-lg-6">
            <label for="gradeInput" class="form-label">Grade</label>
            <input type="text" name="grade[]" class="form-control">
        </div>
        <div class="col-lg-12">
            <button type="button" class="btn btn-danger remove-btn">Remove</button>
        </div>
    `;
                                                qualificationsContainer.appendChild(newQualificationItem);
                                                updateRemoveButtons();
                                            }

                                            // Function to add a new employment history entry
                                            function addEmploymentHistory() {
                                                const employmentHistoryContainer = document.getElementById('employment-history-container');
                                                const newEmploymentItem = document.createElement('div');
                                                newEmploymentItem.classList.add('row', 'employment-history-item');
                                                newEmploymentItem.innerHTML = `
        <div class="col-lg-6">
            <label for="jobTitleInput" class="form-label">Job Title</label>
            <input type="text" name="job_title[]" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="companyInput" class="form-label">Company</label>
            <input type="text" name="company[]" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="startDateInput" class="form-label">Start Date</label>
            <input type="date" name="start_date[]" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="endDateInput" class="form-label">End Date</label>
            <input type="date" name="end_date[]" class="form-control">
        </div>
        <div class="col-lg-12">
            <label for="responsibilitiesInput" class="form-label">Responsibilities</label>
            <textarea name="responsibilities[]" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-lg-12">
            <button type="button" class="btn btn-danger remove-btn">Remove</button>
        </div>
    `;
                                                employmentHistoryContainer.appendChild(newEmploymentItem);
                                                updateRemoveButtons();
                                            }

                                            // Function to update the visibility of remove buttons
                                            function updateRemoveButtons() {
                                                const qualificationItems = document.querySelectorAll('#qualifications-container .qualification-item');
                                                const employmentItems = document.querySelectorAll('#employment-history-container .employment-history-item');

                                                // Update qualification items
                                                qualificationItems.forEach((item, index) => {
                                                    item.querySelector('.remove-btn').classList.toggle('d-none', index === 0);
                                                });

                                                // Update employment history items
                                                employmentItems.forEach((item, index) => {
                                                    item.querySelector('.remove-btn').classList.toggle('d-none', index === 0);
                                                });
                                            }

                                            // Event delegation for remove buttons
                                            document.addEventListener('click', function(event) {
                                                if (event.target.classList.contains('remove-btn')) {
                                                    const item = event.target.closest('.row');
                                                    item.remove();
                                                    updateRemoveButtons();
                                                }
                                            });

                                            // Initial call to ensure existing entries have correct remove button visibility
                                            updateRemoveButtons();
                                        </script>





                                        <!--end tab-pane-->
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

            <script>
                // JavaScript to clone qualification fields
                document.getElementById('addQualificationBtn').addEventListener('click', function() {
                    // Find the first qualification item and clone it
                    let container = document.getElementById('qualifications-container');
                    let newQualification = container.querySelector('.qualification-item').cloneNode(true);

                    // Clear the input values in the cloned item
                    newQualification.querySelectorAll('input, select').forEach(input => input.value = '');

                    // Append the new qualification item to the container
                    container.appendChild(newQualification);
                });


                <
                !--JavaScript to Duplicate Employment History Section-- >
                document.getElementById('addEmploymentHistory').addEventListener('click', function() {
                    // Clone the first employment history item
                    var originalSection = document.querySelector('.employment-history-item');
                    var clonedSection = originalSection.cloneNode(true);

                    // Clear input fields in the cloned section
                    clonedSection.querySelectorAll('input').forEach(input => input.value = '');
                    clonedSection.querySelectorAll('textarea').forEach(textarea => textarea.value = '');

                    // Append cloned section to the container
                    document.getElementById('employment-history-container').appendChild(clonedSection);
                });
            </script>
        @endsection
