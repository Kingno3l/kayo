{{-- @extends('user.user_dashboard')

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
                                        Employment History
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employmentHistory" role="tabpanel">
                                    <div class="row">
                                        <form action="{{ route('profile-management.employment-history.store') }}"
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

                                            <!-- Employment History Section -->
                                            <div class="row" id="employment-history-container">
                                                <div class="col-lg-12 mt-2">
                                                    <div class="d-flex justify-content-end mb-3">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="addEmploymentHistory()">Add Employment</button>
                                                    </div>
                                                </div>

                                                @forelse ($employmentHistories as $index => $employment)
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0 flex-grow-1">Employment History
                                                                </h4>
                                                                <button type="button" class="btn btn-primary ms-2"
                                                                    onclick="toggleEditMode({{ $index }})"
                                                                    id="editButton{{ $index }}">Edit</button>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="live-preview">
                                                                    <div class="row employment-history-item">
                                                                        
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="positionInput{{ $index }}" class="form-label">Position</label>
                                                                                <select class="form-select mb-3" id="positionInput{{ $index }}" name="job_title[]" aria-label="Default select example">
                                                                                    <option value="" {{ old("job_title.$index", $employment->job_title) == '' ? 'selected' : '' }}>Select your Position</option>
                                                                                    <option value="Broker/Agent" {{ old("job_title.$index", $employment->job_title) == 'Broker/Agent' ? 'selected' : '' }}>Broker/Agent</option>
                                                                                    <option value="Underwriter" {{ old("job_title.$index", $employment->job_title) == 'Underwriter' ? 'selected' : '' }}>Underwriter</option>
                                                                                    <option value="Business Development" {{ old("job_title.$index", $employment->job_title) == 'Business Development' ? 'selected' : '' }}>Business Development</option>
                                                                                    <option value="Customer Service Representative" {{ old("job_title.$index", $employment->job_title) == 'Customer Service Representative' ? 'selected' : '' }}>Customer Service Representative</option>
                                                                                    <option value="Claims Representative" {{ old("job_title.$index", $employment->job_title) == 'Claims Representative' ? 'selected' : '' }}>Claims Representative</option>
                                                                                    <option value="Adjuster" {{ old("job_title.$index", $employment->job_title) == 'Adjuster' ? 'selected' : '' }}>Adjuster</option>
                                                                                    <option value="Actuary" {{ old("job_title.$index", $employment->job_title) == 'Actuary' ? 'selected' : '' }}>Actuary</option>
                                                                                    <option value="Regulator" {{ old("job_title.$index", $employment->job_title) == 'Regulator' ? 'selected' : '' }}>Regulator</option>
                                                                                    <option value="Other" {{ old("job_title.$index", $employment->job_title) == 'Other' ? 'selected' : '' }}>Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <label for="companyInput{{ $index }}"
                                                                                class="form-label">Company</label>
                                                                            <input type="text" name="company[]"
                                                                                class="form-control"
                                                                                id="companyInput{{ $index }}"
                                                                                value="{{ $employment->company }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- Still Employed Checkbox -->
                                                                        <div class="col-lg-12 mt-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input still-employed-checkbox"
                                                                                    type="checkbox"
                                                                                    id="stillEmployedCheck{{ $index }}"
                                                                                    name="still_employed[]"
                                                                                    {{ empty($employment->end_date) ? 'checked' : '' }}
                                                                                    disabled>
                                                                                <label class="form-check-label"
                                                                                    for="stillEmployedCheck{{ $index }}">Still
                                                                                    Employed</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Start Date -->
                                                                        <div class="col-lg-6">
                                                                            <label for="startDateInput{{ $index }}"
                                                                                class="form-label">Start Date</label>
                                                                            <input type="date" name="start_date[]"
                                                                                class="form-control"
                                                                                id="startDateInput{{ $index }}"
                                                                                value="{{ $employment->start_date }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- End Date -->
                                                                        <div class="col-lg-6 end-date-container"
                                                                            style="{{ empty($employment->end_date) ? 'display:none;' : '' }}">
                                                                            <label for="endDateInput{{ $index }}"
                                                                                class="form-label">End Date</label>
                                                                            <input type="date" name="end_date[]"
                                                                                class="form-control end-date-input"
                                                                                id="endDateInput{{ $index }}"
                                                                                value="{{ $employment->end_date }}"
                                                                                {{ empty($employment->end_date) ? 'disabled' : '' }}>
                                                                        </div>

                                                                        @if ($index > 0)
                                                                            <div class="col-lg-12 mt-2">
                                                                                <button type="button"
                                                                                    class="btn btn-danger remove-btn">Remove</button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row employment-history-item">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="positionInputNew" class="form-label">Position</label>
                                                                            <select class="form-select mb-3" id="positionInputNew" name="job_title[]" aria-label="Default select example">
                                                                                <option value="">Select your Position</option>
                                                                                <option value="Broker/Agent">Broker/Agent</option>
                                                                                <option value="Underwriter">Underwriter</option>
                                                                                <option value="Business Development">Business Development</option>
                                                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                                                <option value="Claims Representative">Claims Representative</option>
                                                                                <option value="Adjuster">Adjuster</option>
                                                                                <option value="Actuary">Actuary</option>
                                                                                <option value="Regulator">Regulator</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label class="form-label">Company</label>
                                                                        <input type="text" name="company[]"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="form-check">
                                                                            <input
                                                                                class="form-check-input still-employed-checkbox"
                                                                                type="checkbox" id="stillEmployedCheckNew"
                                                                                name="still_employed[]">
                                                                            <label class="form-check-label"
                                                                                for="stillEmployedCheckNew">Still
                                                                                Employed</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2">
                                                                        <label class="form-label">Start Date</label>
                                                                        <input type="date" name="start_date[]"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 end-date-container">
                                                                        <label class="form-label">End Date</label>
                                                                        <input type="date" name="end_date[]"
                                                                            class="form-control end-date-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 mt-4">
                                                <button type="submit" class="btn btn-primary w-100">Update Employment
                                                    History</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript functions for handling form logic
                // Toggle edit mode for fields
                function toggleEditMode(index) {
                    const jobTitleField = document.getElementById(`positionInput${index}`);
                    const companyField = document.getElementById(`companyInput${index}`);
                    const startDateField = document.getElementById(`startDateInput${index}`);
                    const endDateField = document.getElementById(`endDateInput${index}`);
                    const stillEmployedCheckbox = document.getElementById(`stillEmployedCheck${index}`);
                    const editButton = document.getElementById(`editButton${index}`);

                    const isReadOnly = jobTitleField.hasAttribute('readonly');

                    jobTitleField.toggleAttribute('readonly');
                    companyField.toggleAttribute('readonly');
                    startDateField.toggleAttribute('readonly');
                    stillEmployedCheckbox.disabled = !isReadOnly;

                    if (isReadOnly) {
                        endDateField.disabled = stillEmployedCheckbox.checked;
                        editButton.style.display = 'none';

                        const saveButton = document.createElement('button');
                        saveButton.type = "button";
                        saveButton.className = "btn btn-success ms-2";
                        saveButton.id = `saveButton${index}`;
                        saveButton.innerText = "Save";
                        saveButton.onclick = function() { saveChanges(index); };

                        editButton.parentNode.appendChild(saveButton);
                    }
                }

                function saveChanges(index) {
                    const jobTitleField = document.getElementById(`positionInput${index}`);
                    const companyField = document.getElementById(`companyInput${index}`);
                    const startDateField = document.getElementById(`startDateInput${index}`);
                    const endDateField = document.getElementById(`endDateInput${index}`);
                    const stillEmployedCheckbox = document.getElementById(`stillEmployedCheck${index}`);
                    const saveButton = document.getElementById(`saveButton${index}`);
                    const editButton = document.getElementById(`editButton${index}`);

                    jobTitleField.setAttribute('readonly', true);
                    companyField.setAttribute('readonly', true);
                    startDateField.setAttribute('readonly', true);
                    stillEmployedCheckbox.disabled = true;
                    endDateField.disabled = true;

                    saveButton.remove();
                    editButton.style.display = 'inline-block';
                }

                let employmentCounter = {{ $employmentHistories->count() > 0 ? $employmentHistories->count() : 1 }};

                function addEmploymentHistory() {
                    const employmentHistoryContainer = document.getElementById('employment-history-container');
                    const newEmploymentHistoryItem = document.createElement('div');
                    newEmploymentHistoryItem.classList.add('col-lg-12');
                    newEmploymentHistoryItem.innerHTML = `
                        <div class="card">
                            <div class="card-body">
                                <div class="row employment-history-item">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Position</label>
                                            <select class="form-select mb-3" name="job_title[${employmentCounter}]" aria-label="Default select example">
                                                <option value="">Select your Position</option>
                                                <option value="Broker/Agent">Broker/Agent</option>
                                                <option value="Underwriter">Underwriter</option>
                                                <option value="Business Development">Business Development</option>
                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                <option value="Claims Representative">Claims Representative</option>
                                                <option value="Adjuster">Adjuster</option>
                                                <option value="Actuary">Actuary</option>
                                                <option value="Regulator">Regulator</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Company</label>
                                        <input type="text" name="company[${employmentCounter}]" class="form-control">
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div class="form-check">
                                            <input class="form-check-input still-employed-checkbox" type="checkbox" id="stillEmployedCheck${employmentCounter}" name="still_employed[${employmentCounter}]">
                                            <label class="form-check-label" for="stillEmployedCheck${employmentCounter}">Still Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date[${employmentCounter}]" class="form-control">
                                    </div>
                                    <div class="col-lg-6 mt-2 end-date-container">
                                        <label class="form-label">End Date</label>
                                        <input type="date" name="end_date[${employmentCounter}]" class="form-control end-date-input">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <button type="button" class="btn btn-danger remove-btn">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    employmentHistoryContainer.appendChild(newEmploymentHistoryItem);
                    employmentCounter++;
                    updateRemoveButtons();
                    initializeStillEmployedCheckboxes();
                }

                function updateRemoveButtons() {
                    document.querySelectorAll('.remove-btn').forEach(button => {
                        button.removeEventListener('click', handleRemoveClick);
                        button.addEventListener('click', handleRemoveClick);
                    });
                }

                function handleRemoveClick(event) {
                    const button = event.target;
                    const card = button.closest('.card');
                    if (card) {
                        card.parentElement.remove();
                    }
                }

                function initializeStillEmployedCheckboxes() {
                    document.querySelectorAll('.still-employed-checkbox').forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const employmentHistoryItem = checkbox.closest('.employment-history-item');
                            const endDateContainer = employmentHistoryItem.querySelector('.end-date-container');
                            const endDateInput = employmentHistoryItem.querySelector('.end-date-input');
                            if (checkbox.checked) {
                                endDateInput.value = '';
                                endDateInput.disabled = true;
                                endDateContainer.style.display = 'none';
                            } else {
                                endDateInput.disabled = false;
                                endDateContainer.style.display = 'block';
                            }
                        });
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    updateRemoveButtons();
                    initializeStillEmployedCheckboxes();
                });
            </script>
        @endsection --}}


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
                                        Employment History
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employmentHistory" role="tabpanel">
                                    <div class="row">
                                        <form action="{{ route('profile-management.employment-history.store') }}"
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

                                            <!-- Employment History Section -->
                                            <div class="row" id="employment-history-container">
                                                <div class="col-lg-12 mt-2">
                                                    <div class="d-flex justify-content-end mb-3">
                                                        <button type="button" class="btn btn-success"
                                                            onclick="addEmploymentHistory()">Add Employment</button>
                                                    </div>
                                                </div>

                                                @forelse ($employmentHistories as $index => $employment)
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0 flex-grow-1">Employment History
                                                                </h4>
                                                                <button type="button" class="btn btn-primary ms-2"
                                                                    onclick="toggleEditMode({{ $index }})"
                                                                    id="editButton{{ $index }}">Edit</button>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="live-preview">
                                                                    <div class="row employment-history-item">
                                                                        
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="positionInput{{ $index }}" class="form-label">Position</label>
                                                                                <select class="form-select mb-3" id="positionInput{{ $index }}" name="job_title[]" aria-label="Default select example" style="pointer-events: none;">
                                                                                    <option value="" {{ old("job_title.$index", $employment->job_title) == '' ? 'selected' : '' }}>Select your Position</option>
                                                                                    <option value="Broker/Agent" {{ old("job_title.$index", $employment->job_title) == 'Broker/Agent' ? 'selected' : '' }}>Broker/Agent</option>
                                                                                    <option value="Underwriter" {{ old("job_title.$index", $employment->job_title) == 'Underwriter' ? 'selected' : '' }}>Underwriter</option>
                                                                                    <option value="Business Development" {{ old("job_title.$index", $employment->job_title) == 'Business Development' ? 'selected' : '' }}>Business Development</option>
                                                                                    <option value="Customer Service Representative" {{ old("job_title.$index", $employment->job_title) == 'Customer Service Representative' ? 'selected' : '' }}>Customer Service Representative</option>
                                                                                    <option value="Claims Representative" {{ old("job_title.$index", $employment->job_title) == 'Claims Representative' ? 'selected' : '' }}>Claims Representative</option>
                                                                                    <option value="Adjuster" {{ old("job_title.$index", $employment->job_title) == 'Adjuster' ? 'selected' : '' }}>Adjuster</option>
                                                                                    <option value="Actuary" {{ old("job_title.$index", $employment->job_title) == 'Actuary' ? 'selected' : '' }}>Actuary</option>
                                                                                    <option value="Regulator" {{ old("job_title.$index", $employment->job_title) == 'Regulator' ? 'selected' : '' }}>Regulator</option>
                                                                                    <option value="Other" {{ old("job_title.$index", $employment->job_title) == 'Other' ? 'selected' : '' }}>Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <label for="companyInput{{ $index }}"
                                                                                class="form-label">Company</label>
                                                                            <input type="text" name="company[]"
                                                                                class="form-control"
                                                                                id="companyInput{{ $index }}"
                                                                                value="{{ $employment->company }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- Still Employed Checkbox -->
                                                                        <div class="col-lg-12 mt-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input still-employed-checkbox"
                                                                                    type="checkbox"
                                                                                    id="stillEmployedCheck{{ $index }}"
                                                                                    name="still_employed[]"
                                                                                    {{ empty($employment->end_date) ? 'checked' : '' }}
                                                                                    disabled>
                                                                                <label class="form-check-label"
                                                                                    for="stillEmployedCheck{{ $index }}">Still
                                                                                    Employed</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Start Date -->
                                                                        <div class="col-lg-6">
                                                                            <label for="startDateInput{{ $index }}"
                                                                                class="form-label">Start Date</label>
                                                                            <input type="date" name="start_date[]"
                                                                                class="form-control"
                                                                                id="startDateInput{{ $index }}"
                                                                                value="{{ $employment->start_date }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- End Date -->
                                                                        <div class="col-lg-6 end-date-container"
                                                                            style="{{ empty($employment->end_date) ? 'display:none;' : '' }}">
                                                                            <label for="endDateInput{{ $index }}"
                                                                                class="form-label">End Date</label>
                                                                            <input type="date" name="end_date[]"
                                                                                class="form-control end-date-input"
                                                                                id="endDateInput{{ $index }}"
                                                                                value="{{ $employment->end_date }}"
                                                                                {{ empty($employment->end_date) ? 'disabled' : '' }}>
                                                                        </div>

                                                                        @if ($index > 0)
                                                                            <div class="col-lg-12 mt-2">
                                                                                <button type="button"
                                                                                    class="btn btn-danger remove-btn">Remove</button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row employment-history-item">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="positionInputNew" class="form-label">Position</label>
                                                                            <select class="form-select mb-3" id="positionInputNew" name="job_title[]" aria-label="Default select example">
                                                                                <option value="">Select your Position</option>
                                                                                <option value="Broker/Agent">Broker/Agent</option>
                                                                                <option value="Underwriter">Underwriter</option>
                                                                                <option value="Business Development">Business Development</option>
                                                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                                                <option value="Claims Representative">Claims Representative</option>
                                                                                <option value="Adjuster">Adjuster</option>
                                                                                <option value="Actuary">Actuary</option>
                                                                                <option value="Regulator">Regulator</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label class="form-label">Company</label>
                                                                        <input type="text" name="company[]"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="form-check">
                                                                            <input
                                                                                class="form-check-input still-employed-checkbox"
                                                                                type="checkbox" id="stillEmployedCheckNew"
                                                                                name="still_employed[]">
                                                                            <label class="form-check-label"
                                                                                for="stillEmployedCheckNew">Still
                                                                                Employed</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2">
                                                                        <label class="form-label">Start Date</label>
                                                                        <input type="date" name="start_date[]"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 end-date-container">
                                                                        <label class="form-label">End Date</label>
                                                                        <input type="date" name="end_date[]"
                                                                            class="form-control end-date-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 mt-4">
                                                <button type="submit" class="btn btn-primary w-100">Update Employment
                                                    History</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript functions for handling form logic
                function toggleEditMode(index) {
                    const positionField = document.getElementById(`positionInput${index}`);
                    const companyField = document.getElementById(`companyInput${index}`);
                    const startDateField = document.getElementById(`startDateInput${index}`);
                    const endDateField = document.getElementById(`endDateInput${index}`);
                    const stillEmployedCheckbox = document.getElementById(`stillEmployedCheck${index}`);
                    const editButton = document.getElementById(`editButton${index}`);

                    const isReadOnly = companyField.hasAttribute('readonly');

                    // Toggle readonly attribute and enable dropdown interaction
                    companyField.toggleAttribute('readonly');
                    startDateField.toggleAttribute('readonly');
                    stillEmployedCheckbox.disabled = !isReadOnly;
                    
                    if (isReadOnly) {
                        positionField.style.pointerEvents = 'auto'; // Enable dropdown
                        endDateField.disabled = stillEmployedCheckbox.checked;
                        editButton.style.display = 'none'; // Hide "Edit" button

                        // Create "Save" button
                        const saveButton = document.createElement('button');
                        saveButton.type = "button";
                        saveButton.className = "btn btn-success ms-2";
                        saveButton.id = `saveButton${index}`;
                        saveButton.innerText = "Save";
                        saveButton.onclick = function() { saveChanges(index); };
                        // editButton.parentNode.appendChild(saveButton);
                    } else {
                        positionField.style.pointerEvents = 'none'; // Disable dropdown
                        endDateField.disabled = true;
                        const saveButton = document.getElementById(`saveButton${index}`);
                        if (saveButton) saveButton.remove();
                        editButton.style.display = 'inline-block'; // Show "Edit" button
                    }
                }

                function saveChanges(index) {
                    const positionField = document.getElementById(`positionInput${index}`);
                    const companyField = document.getElementById(`companyInput${index}`);
                    const startDateField = document.getElementById(`startDateInput${index}`);
                    const endDateField = document.getElementById(`endDateInput${index}`);
                    const stillEmployedCheckbox = document.getElementById(`stillEmployedCheck${index}`);
                    const saveButton = document.getElementById(`saveButton${index}`);
                    const editButton = document.getElementById(`editButton${index}`);

                    // Re-enable readonly and disable dropdown interaction
                    positionField.style.pointerEvents = 'none';
                    companyField.setAttribute('readonly', true);
                    startDateField.setAttribute('readonly', true);
                    stillEmployedCheckbox.disabled = true;
                    endDateField.disabled = true;
                    
                    saveButton.remove();
                    editButton.style.display = 'inline-block';
                }

                let employmentCounter = {{ $employmentHistories->count() > 0 ? $employmentHistories->count() : 1 }};

                function addEmploymentHistory() {
                    const employmentHistoryContainer = document.getElementById('employment-history-container');
                    const newEmploymentHistoryItem = document.createElement('div');
                    newEmploymentHistoryItem.classList.add('col-lg-12');
                    newEmploymentHistoryItem.innerHTML = `
                        <div class="card">
                            <div class="card-body">
                                <div class="row employment-history-item">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Position</label>
                                            <select class="form-select mb-3" name="job_title[${employmentCounter}]" aria-label="Default select example">
                                                <option value="">Select your Position</option>
                                                <option value="Broker/Agent">Broker/Agent</option>
                                                <option value="Underwriter">Underwriter</option>
                                                <option value="Business Development">Business Development</option>
                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                <option value="Claims Representative">Claims Representative</option>
                                                <option value="Adjuster">Adjuster</option>
                                                <option value="Actuary">Actuary</option>
                                                <option value="Regulator">Regulator</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Company</label>
                                        <input type="text" name="company[${employmentCounter}]" class="form-control">
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div class="form-check">
                                            <input class="form-check-input still-employed-checkbox" type="checkbox" id="stillEmployedCheck${employmentCounter}" name="still_employed[${employmentCounter}]">
                                            <label class="form-check-label" for="stillEmployedCheck${employmentCounter}">Still Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date[${employmentCounter}]" class="form-control">
                                    </div>
                                    <div class="col-lg-6 mt-2 end-date-container">
                                        <label class="form-label">End Date</label>
                                        <input type="date" name="end_date[${employmentCounter}]" class="form-control end-date-input">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <button type="button" class="btn btn-danger remove-btn">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    employmentHistoryContainer.appendChild(newEmploymentHistoryItem);
                    employmentCounter++;
                    updateRemoveButtons();
                    initializeStillEmployedCheckboxes();
                }

                function updateRemoveButtons() {
                    document.querySelectorAll('.remove-btn').forEach(button => {
                        button.removeEventListener('click', handleRemoveClick);
                        button.addEventListener('click', handleRemoveClick);
                    });
                }

                function handleRemoveClick(event) {
                    const button = event.target;
                    const card = button.closest('.card');
                    if (card) {
                        card.parentElement.remove();
                    }
                }

                function initializeStillEmployedCheckboxes() {
                    document.querySelectorAll('.still-employed-checkbox').forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const employmentHistoryItem = checkbox.closest('.employment-history-item');
                            const endDateContainer = employmentHistoryItem.querySelector('.end-date-container');
                            const endDateInput = employmentHistoryItem.querySelector('.end-date-input');
                            if (checkbox.checked) {
                                endDateInput.value = '';
                                endDateInput.disabled = true;
                                endDateContainer.style.display = 'none';
                            } else {
                                endDateInput.disabled = false;
                                endDateContainer.style.display = 'block';
                            }
                        });
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    updateRemoveButtons();
                    initializeStillEmployedCheckboxes();
                });
            </script>
        @endsection
