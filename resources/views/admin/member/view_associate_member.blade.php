@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Associate Members</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Associate Members</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table" id="associateMemberList">
                                {{-- <div class="row g-4 mb-3">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="table-responsive table-card mt-3 mb-1">
                                    @if ($users->isEmpty())
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Associate Members Found</h5>
                                            <p class="text-muted mb-0">We've searched all our records, but no associate
                                                members were found.</p>
                                        </div>
                                    @else
                                        {{-- <table class="table align-middle table-nowrap" id="associateMemberTable"> --}}
                                        <table class="table align-middle table-nowrap" id="associateMemberTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Date of Birth</th>
                                                    <th class="text-center">Age</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($users as $index => $user)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('member.details', $user->id) }}"
                                                                class="text-primary fw-semibold">
                                                                {{ $user->name }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">{{ $user->email }}</td>
                                                        <td class="text-center">{{ $user->date_of_birth }}</td>
                                                        <td class="text-center">
                                                            {{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
