@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">All Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">


                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">

                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S1</th>
                                                <th class="text-center sort" data-sort="customer_name">Full Name</th>
                                                <th class="text-center sort" data-sort="email">Email</th>
                                                <th class="text-center sort" data-sort="phone">Phone</th>
                                                <th class="text-center sort" data-sort="date">Joined Date</th>
                                                <th class="text-center sort" data-sort="status">Online Status</th>
                                                <th class="text-center sort" data-sort="registration_number">Registration
                                                    Number</th>
                                                <th class="text-center sort" data-sort="country">Country</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($completedUsers as $key => $item)
                                                <tr>

                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ !empty($item->photo) ? url('uploads/user_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                                                    alt="" class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1 customer_name">
                                                                <a href="{{ route('member.details', $item->id) }}">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td class="text-center email">{{ $item->email }}</td>
                                                    <td class="text-center phone">{{ $item->country_code }}
                                                        {{ $item->phone }}</td>
                                                    <td class="text-center date">{{ $item->created_at->format('d M, Y') }}
                                                    </td>
                                                    <td class="text-center status">
                                                        @if ($item->UserOnline())
                                                            <span
                                                                class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger-subtle text-danger text-uppercase">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                                        @endif
                                                    </td>
                                                    @php
                                                        // Retrieve the country code using the country name
                                                        $countryCode = isset($countryCodes[$item->country])
                                                            ? strtolower($countryCodes[$item->country])
                                                            : 'default';
                                                    @endphp

                                                 <td class="text-center registration_number">
    {{ str_replace('-', '/', $item->registration_number) }}
</td>

                                                    <td class="text-center country">
                                                        <img src="{{ asset('assets/images/flags/' . $countryCode . '.svg') }}"
                                                            alt="{{ $item->country }}"
                                                            style="width: 24px; height: 16px; margin-right: 5px;">
                                                        {{ $item->country }}
                                                    </td>



                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched all our records, but we did not find
                                                any.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2" style="display: flex;">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0">
                                            <li class="active"><a class="page" href="#" data-i="1"
                                                    data-page="8">1</a></li>
                                            <li><a class="page" href="#" data-i="2" data-page="8">2</a>
                                            </li>
                                        </ul>
                                        <a class="page-item pagination-next" href="javascript:void(0);">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->









                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- HTML Button -->

    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            $('#notify-button').on('click', function() {
                toastr.success('This is a success message!', 'Success');
                console.log('Button clicked'); // Debugging line
            });
        });
    </script>

    <!-- Jquery -->
    <script>
        $(document).ready(function() {
            $('.status-toggle').on('change', function() {
                var userId = $(this).data('user-id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('update.user.status') }}",
                    method: 'POST',
                    data: {
                        user_id: userId,
                        is_checked: isChecked ? 1 : 0,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response); // Log the response to ensure it's received

                        if (response['alert-type'] === 'success') {
                            toastr.success(response.message); // Show success message
                        } else if (response['alert-type'] === 'error') {
                            toastr.error(response.message); // Show error message if applicable
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log the error for debugging
                        toastr.error('An error occurred while updating the user status.');
                    }
                });
            });
        });
    </script>
@endsection
