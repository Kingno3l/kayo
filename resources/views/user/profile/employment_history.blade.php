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
                <h4 class="card-title mb-0 flex-grow-1">Employment History</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="row employment-history-item">
                        <div class="col-lg-6">
                            <label for="jobTitleInput{{ $index }}" class="form-label">Job Title</label>
                            <input type="text" name="job_title[]" class="form-control" id="jobTitleInput{{ $index }}" value="{{ $employment->job_title }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="companyInput{{ $index }}" class="form-label">Company</label>
                            <input type="text" name="company[]" class="form-control" id="companyInput{{ $index }}" value="{{ $employment->company }}">
                        </div>
                        
                        <!-- Still Employed Checkbox -->
                        <div class="col-lg-12 mt-4">
                            <div class="form-check">
                                <input
                                    class="form-check-input still-employed-checkbox"
                                    type="checkbox"
                                    id="stillEmployedCheck{{ $index }}"
                                    name="still_employed[]"
                                    {{ empty($employment->end_date) ? 'checked' : '' }}>
                                <label class="form-check-label" for="stillEmployedCheck{{ $index }}">
                                    Still Employed
                                </label>
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="col-lg-6">
                            <label for="startDateInput{{ $index }}" class="form-label">Start Date</label>
                            <input type="date" name="start_date[]" class="form-control" id="startDateInput{{ $index }}" value="{{ $employment->start_date }}">
                        </div>

                        <!-- End Date, hidden if 'Still Employed' is checked -->
                        <div class="col-lg-6 end-date-container" style="{{ empty($employment->end_date) ? 'display:none;' : '' }}">
                            <label for="endDateInput{{ $index }}" class="form-label">End Date</label>
                            <input type="date" name="end_date[]" class="form-control end-date-input" id="endDateInput{{ $index }}" value="{{ $employment->end_date }}">
                        </div>

                        <div class="col-lg-12">
                            <label for="responsibilitiesInput{{ $index }}" class="form-label">Responsibilities</label>
                            <textarea name="responsibilities[]" class="form-control" id="responsibilitiesInput{{ $index }}" rows="3">{{ $employment->responsibilities }}</textarea>
                        </div>

                        @if ($index > 0)
                            <div class="col-lg-12 mt-2">
                                <button type="button" class="btn btn-danger remove-btn">Remove</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <!-- Empty form for new employment history -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row employment-history-item">
                    <div class="col-lg-6">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title[]" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Company</label>
                        <input type="text" name="company[]" class="form-control">
                    </div>
                    
                    <div class="col-lg-12 mt-4">
                        <div class="form-check">
                            <input
                                class="form-check-input still-employed-checkbox"
                                type="checkbox"
                                id="stillEmployedCheckNew"
                                name="still_employed[]">
                            <label class="form-check-label" for="stillEmployedCheckNew">
                                Still Employed
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date[]" class="form-control">
                    </div>

                    <div class="col-lg-6 mt-2 end-date-container">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date[]" class="form-control end-date-input">
                    </div>

                    <div class="col-lg-12 mt-2">
                        <label class="form-label">Responsibilities</label>
                        <textarea name="responsibilities[]" class="form-control" rows="3"></textarea>
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
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div><!-- End Page-content -->


            <script>
                // Function to add a new employment history entry
                function addEmploymentHistory() {
                    const employmentHistoryContainer = document.getElementById('employment-history-container');
                    const newEmploymentHistoryItem = document.createElement('div');
                    newEmploymentHistoryItem.classList.add('col-lg-12');
                    newEmploymentHistoryItem.innerHTML = `
        <div class="card">
            <div class="card-body">
                <div class="row employment-history-item">
                    <div class="col-lg-6">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title[]" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Company</label>
                        <input type="text" name="company[]" class="form-control">
                    </div>
                    <div class="col-lg-6 mt-2">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date[]" class="form-control">
                    </div>
                    <div class="col-lg-6 mt-2">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date[]" class="form-control">
                    </div>
                    <div class="col-lg-12 mt-2">
                        <label class="form-label">Responsibilities</label>
                        <textarea name="responsibilities[]" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <button type="button" class="btn btn-danger remove-btn">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    `;
                    employmentHistoryContainer.appendChild(newEmploymentHistoryItem);
                    updateRemoveButtons();
                }

                // Function to update remove buttons' event listeners
                function updateRemoveButtons() {
                    document.querySelectorAll('.remove-btn').forEach(button => {
                        button.removeEventListener('click', handleRemoveClick); // Remove old event listeners
                        button.addEventListener('click', handleRemoveClick);
                    });
                }

                // Handler function for remove button click
                function handleRemoveClick(event) {
                    // Find the closest card and remove it
                    const button = event.target;
                    const card = button.closest('.card');
                    if (card) {
                        card.parentElement.remove(); // Remove the entire col-lg-12
                    }
                }

                // Initialize remove buttons event listeners on page load
                document.addEventListener('DOMContentLoaded', updateRemoveButtons);
            </script>
        </div>
    </div>

    <script>
        // Function to initialize still employed checkbox behavior
        function initializeStillEmployedCheckboxes() {
            document.querySelectorAll('.still-employed-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const employmentHistoryItem = checkbox.closest('.employment-history-item');
                    const endDateContainer = employmentHistoryItem.querySelector('.end-date-container');
                    const endDateInput = employmentHistoryItem.querySelector('.end-date-input');

                    if (checkbox.checked) {
                        // Hide and disable the end date if still employed
                        endDateInput.value = ''; // Clear any previously set value
                        endDateInput.disabled = true;
                        endDateContainer.style.display = 'none';
                    } else {
                        // Show and enable the end date if not still employed
                        endDateInput.disabled = false;
                        endDateContainer.style.display = 'block';
                    }
                });
            });
        }

        // Call the function when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeStillEmployedCheckboxes();
        });

        // Ensure that you call the function whenever a new employment history entry is added dynamically


        // Function to initialize still employed checkbox behavior
        function initializeStillEmployedCheckboxes() {
            document.querySelectorAll('.still-employed-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const employmentHistoryItem = checkbox.closest('.employment-history-item');
                    const endDateContainer = employmentHistoryItem.querySelector('.end-date-container');
                    const endDateInput = employmentHistoryItem.querySelector('.end-date-input');

                    if (checkbox.checked) {
                        // Hide and disable the end date if still employed
                        endDateInput.value = ''; // Clear any previously set value
                        endDateInput.disabled = true;
                        endDateContainer.style.display = 'none';
                    } else {
                        // Show and enable the end date if not still employed
                        endDateInput.disabled = false;
                        endDateContainer.style.display = 'block';
                    }
                });
            });
        }

        // Call the function when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeStillEmployedCheckboxes();
        });

        // Ensure that you call the function whenever a new employment history entry is added dynamically
    </script>


@endsection
