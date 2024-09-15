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

                                        <form action="{{ route('profile-management.academic-qualification.store') }}"
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

                                                                    <div class="col-lg-6 mt-2">
                                                                        <label for="graduationYearInput"
                                                                            class="form-label">Graduation Year</label>
                                                                        <select name="graduation_year[]"
                                                                            class="form-control" id="graduationYearInput">
                                                                            <option value="" disabled selected>Select
                                                                                Graduation Year</option>
                                                                            <!-- Dynamically populate the last 50 years -->
                                                                            <script>
                                                                                const graduationYearSelect = document.getElementById('graduationYearInput');
                                                                                const currentYear = new Date().getFullYear();
                                                                                for (let year = currentYear; year >= currentYear - 50; year--) {
                                                                                    let option = document.createElement('option');
                                                                                    option.value = year;
                                                                                    option.text = year;
                                                                                    graduationYearSelect.appendChild(option);
                                                                                }
                                                                            </script>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2">
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


                                            {{-- <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title mb-0">Document Uploads</h4>
                                                        </div><!-- end card header -->

                                                        <div class="card-body">
                                                            <p class="text-muted">Upload proof of qualifications.</p>

                                                            <div class="dropzone">
                                                                <div class="fallback">
                                                                    <input name="document" type="file">

                                                                </div>
                                                                <div class="dz-message needsclick">
                                                                    <div class="mb-3">
                                                                        <i
                                                                            class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                                    </div>

                                                                    <h4>Drop files here or click to upload.</h4>
                                                                </div>
                                                            </div>

                                                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                                <li class="mt-2" id="dropzone-preview-list">
                                                                    <!-- This is used as the file preview template -->
                                                                    <div class="border rounded">
                                                                        <div class="d-flex p-2">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div class="avatar-sm bg-light rounded">
                                                                                    <img data-dz-thumbnail
                                                                                        class="img-fluid rounded d-block"
                                                                                        src="{{ asset('assets/images/new-document.png') }}"
                                                                                        alt="Dropzone-Image" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <div class="pt-1">
                                                                                    <h5 class="fs-14 mb-1" data-dz-name>
                                                                                        &nbsp;</h5>
                                                                                    <p class="fs-13 text-muted mb-0"
                                                                                        data-dz-size></p>
                                                                                    <strong class="error text-danger"
                                                                                        data-dz-errormessage></strong>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ms-3">
                                                                                <button data-dz-remove
                                                                                    class="btn btn-sm btn-primary">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <!-- end dropzon-preview -->
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div> <!-- end col -->
                                            </div> --}}
                                            <!-- end row -->


                                            {{--                                             
                                            <div class="row mt-2">
                                                <div class="col-lg-12">
                                                    <div class="justify-content-between d-flex align-items-center mb-3">
                                                        <h5 class="mb-0 pb-1 text-decoration-underline">Filepond</h5>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title mb-0">Multiple File Upload</h4>
                                                                </div><!-- end card header -->

                                                                <div class="card-body">
                                                                    <p class="text-muted">FilePond is a JavaScript library
                                                                        that
                                                                        optimizes multiple images for faster uploads and
                                                                        offers a great, accessible, silky
                                                                        smooth user experience.</p>
                                                                    <input type="file"
                                                                        class="filepond filepond-input-multiple" multiple
                                                                        name="filepond" data-allow-reorder="true"
                                                                        data-max-file-size="3MB" data-max-files="3">
                                                                </div>
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->
                                                        </div> <!-- end col -->

                                                       
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                                <!-- end col -->
                                            </div> --}}
                                            <!-- end row -->


<input type="file" name="document" id="">

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 mt-4">
                                                <button type="submit" class="btn btn-primary w-100">Update Academic
                                                    Qualification</button>
                                            </div>

                                        </form>





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
    // Function to add a new qualification entry
    function addQualification() {
        const qualificationsContainer = document.getElementById('qualifications-container');
        const newQualificationItem = document.createElement('div');
        newQualificationItem.classList.add('col-lg-12');
        newQualificationItem.innerHTML = `
            <div class="card">
                <div class="card-body">
                    <div class="row qualification-item">
                        <div class="col-lg-6">
                            <label for="degreeInput" class="form-label">Degree</label>
                            <select name="degree[]" class="form-control">
                                <option value="" disabled selected>Select Degree</option>
                                <option value="Bachelor of Science">Bachelor of Science (B.Sc.)</option>
                                <option value="Bachelor of Arts">Bachelor of Arts (B.A.)</option>
                                <option value="Master of Science">Master of Science (M.Sc.)</option>
                                <option value="Master of Arts">Master of Arts (M.A.)</option>
                                <option value="Doctor of Philosophy">Doctor of Philosophy (Ph.D.)</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="institutionInput" class="form-label">Institution</label>
                            <input type="text" name="institution[]" class="form-control">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="graduationYearInput" class="form-label">Graduation Year</label>
                            <select name="graduation_year[]" class="form-control">
                            </select>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="gradeInput" class="form-label">Grade</label>
                            <input type="text" name="grade[]" class="form-control">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <button type="button" class="btn btn-danger remove-btn">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        qualificationsContainer.appendChild(newQualificationItem);
        populateGraduationYear(newQualificationItem.querySelector('select[name="graduation_year[]"]'));
        updateRemoveButtons();
    }

    // Function to populate the Graduation Year dropdown dynamically
    function populateGraduationYear(selectElement) {
        const currentYear = new Date().getFullYear();
        const startYear = 1980; // You can adjust this to your preferred starting year

        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            selectElement.appendChild(option);
        }
    }

    // Function to update remove buttons' event listeners
    function updateRemoveButtons() {
        document.querySelectorAll('.remove-btn').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.qualification-item').remove();
            });
        });
    }

    // Initialize remove buttons event listeners on page load
    document.addEventListener('DOMContentLoaded', updateRemoveButtons);

    // JavaScript to clone qualification fields
    document.getElementById('addQualificationBtn').addEventListener('click', function() {
        // Find the first qualification item and clone it
        let container = document.getElementById('qualifications-container');
        let newQualification = container.querySelector('.qualification-item').cloneNode(true);

        // Clear the input values in the cloned item
        newQualification.querySelectorAll('input, select').forEach(input => input.value = '');

        // Append the new qualification item to the container
        container.appendChild(newQualification);
        populateGraduationYear(newQualification.querySelector('select[name="graduation_year[]"]'));
        updateRemoveButtons();
    });
</script>


        @endsection
