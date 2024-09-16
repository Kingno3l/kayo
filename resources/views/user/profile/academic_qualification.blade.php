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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#academicQualification"
                                        role="tab">
                                        <i class="fas fa-graduation-cap"></i>
                                        Academic Qualification
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="academicQualification" role="tabpanel">
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

                                            <!-- Academic Qualification Section -->
                                            <div class="row" id="academic-qualification-container">
                                                <div class="col-lg-12 mt-2">
                                                    <div class="d-flex justify-content-end mb-3">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="addAcademicQualification()">Add Qualification</button>
                                                    </div>
                                                </div>

                                                @forelse ($qualifications as $index => $qualification)
                                                    <div class="col-lg-12 academic-qualification-item" data-index="{{ $index }}">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0 flex-grow-1">Academic
                                                                    Qualification
                                                                </h4>
                                                                <button type="button" class="btn btn-danger btn-sm ms-2"
                                                                    onclick="removeAcademicQualification({{ $index }})">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="live-preview">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <label for="degreeInput{{ $index }}"
                                                                                class="form-label">Degree</label>
                                                                            <select name="degree[]" class="form-control"
                                                                                id="degreeInput{{ $index }}">
                                                                                <option value="" disabled selected>
                                                                                    Select Degree</option>
                                                                                <option value="Bachelor of Science"
                                                                                    {{ $qualification->degree == 'Bachelor of Science' ? 'selected' : '' }}>
                                                                                    Bachelor of Science (B.Sc.)</option>
                                                                                <option value="Bachelor of Arts"
                                                                                    {{ $qualification->degree == 'Bachelor of Arts' ? 'selected' : '' }}>
                                                                                    Bachelor of Arts (B.A.)</option>
                                                                                <option value="Master of Science"
                                                                                    {{ $qualification->degree == 'Master of Science' ? 'selected' : '' }}>
                                                                                    Master of Science (M.Sc.)</option>
                                                                                <option value="Master of Arts"
                                                                                    {{ $qualification->degree == 'Master of Arts' ? 'selected' : '' }}>
                                                                                    Master of Arts (M.A.)</option>
                                                                                <option value="Doctor of Philosophy"
                                                                                    {{ $qualification->degree == 'Doctor of Philosophy' ? 'selected' : '' }}>
                                                                                    Doctor of Philosophy (Ph.D.)</option>
                                                                                <option value="Diploma"
                                                                                    {{ $qualification->degree == 'Diploma' ? 'selected' : '' }}>
                                                                                    Diploma</option>
                                                                                <option value="Other"
                                                                                    {{ $qualification->degree == 'Other' ? 'selected' : '' }}>
                                                                                    Other</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label
                                                                                for="institutionInput{{ $index }}"
                                                                                class="form-label">Institution</label>
                                                                            <input type="text" name="institution[]"
                                                                                class="form-control"
                                                                                id="institutionInput{{ $index }}"
                                                                                value="{{ $qualification->institution }}">
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            <label
                                                                                for="academicYearInput{{ $index }}"
                                                                                class="form-label">Graduation Year</label>
                                                                            <select name="graduation_year[]"
                                                                                class="form-control"
                                                                                id="academicYearInput{{ $index }}">
                                                                                @for ($year = 1980; $year <= date('Y'); $year++)
                                                                                    <option value="{{ $year }}"
                                                                                        {{ $qualification->graduation_year == $year ? 'selected' : '' }}>
                                                                                        {{ $year }}</option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            <label for="gradeInput{{ $index }}"
                                                                                class="form-label">Grade</label>
                                                                            <input type="text" name="grade[]"
                                                                                class="form-control"
                                                                                id="gradeInput{{ $index }}"
                                                                                value="{{ $qualification->grade }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <!-- Empty form for new academic qualification -->
                                                    <div class="col-lg-12 academic-qualification-item" data-index="0">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label class="form-label">Degree</label>
                                                                        <select name="degree[]"
                                                                            class="form-control">
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
                                                                        <label class="form-label">Institution</label>
                                                                        <input type="text" name="institution[]"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2">
                                                                        <label class="form-label">Graduation Year</label>
                                                                        <select name="graduation_year[]"
                                                                            class="form-control">
                                                                            @for ($year = 1980; $year <= date('Y'); $year++)
                                                                                <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2">
                                                                        <label class="form-label">Grade</label>
                                                                        <input type="text" name="grade[]"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                                                                        <input type="file" name="document" id="">

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 mt-4">
                                                <button type="submit" class="btn btn-primary w-100">Update Academic
                                                    Qualifications</button>
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

            <script>
                // Function to add a new academic qualification entry
                function addAcademicQualification() {
                    const academicQualificationContainer = document.getElementById('academic-qualification-container');
                    const index = academicQualificationContainer.querySelectorAll('.academic-qualification-item').length;
                    const newAcademicQualificationItem = document.createElement('div');
                    newAcademicQualificationItem.classList.add('col-lg-12', 'academic-qualification-item');
                    newAcademicQualificationItem.setAttribute('data-index', index);
                    newAcademicQualificationItem.innerHTML = `
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Academic Qualification</h4>
                                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeAcademicQualification(${index})">Remove</button>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label">Degree</label>
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
                                            <label class="form-label">Institution</label>
                                            <input type="text" name="institution[]" class="form-control">
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <label class="form-label">Graduation Year</label>
                                            <select name="graduation_year[]" class="form-control">
                                                @for ($year = 1980; $year <= date('Y'); $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <label class="form-label">Grade</label>
                                            <input type="text" name="grade[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    academicQualificationContainer.appendChild(newAcademicQualificationItem);
                }

                // Function to remove an academic qualification entry
                function removeAcademicQualification(index) {
                    const academicQualificationItems = document.querySelectorAll('.academic-qualification-item');
                    if (academicQualificationItems.length > 1) {
                        academicQualificationItems[index].remove();
                    } else {
                        alert('At least one academic qualification entry is required.');
                    }
                }
            </script>
@endsection
