<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('admin.admin_dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.admin_dashboard') }}" role="button">
                        <i data-feather="home" class="icon-dual"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Menu</span></li>

                <!-- Members Directory -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('all.users', 'completed.registered.users', 'associate.members', 'student.members', 'members') ? 'active' : '' }}"
                        href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs('all.users', 'completed.registered.users', 'associate.members', 'student.members', 'members') ? 'true' : 'false' }}"
                        aria-controls="sidebarAuth">
                        <i data-feather="users" class="icon-dual"></i>
                        <span data-key="t-authentication">Members Directory</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('all.users', 'completed.registered.users', 'associate.members', 'student.members', 'members') ? 'show' : '' }}"
                        id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('all.users') }}"
                                    class="nav-link {{ request()->routeIs('all.users') ? 'active' : '' }}"
                                    data-key="t-all-users">View All Registered Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('completed.registered.users') }}"
                                    class="nav-link {{ request()->routeIs('completed.registered.users') ? 'active' : '' }}"
                                    data-key="t-completed-users">View Users with Completed Registrations</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('associate.members') }}"
                                    class="nav-link {{ request()->routeIs('associate.members') ? 'active' : '' }}"
                                    data-key="t-completed-users">View Associate Members</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('student.members') }}"
                                    class="nav-link {{ request()->routeIs('student.members') ? 'active' : '' }}"
                                    data-key="t-completed-users">View Student Members</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('members') }}"
                                    class="nav-link {{ request()->routeIs('members') ? 'active' : '' }}"
                                    data-key="t-completed-users">View Members</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Financial Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('annual.paid.users', 'annual.unpaid.users') ? 'active' : '' }}"
                        href="#financialManagement" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs('annual.paid.users', 'annual.unpaid.users') ? 'true' : 'false' }}"
                        aria-controls="financialManagement">
                        <i data-feather="credit-card" class="bx bx-money"></i>
                        <span data-key="t-authentication">Finances</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('annual.paid.users', 'annual.unpaid.users') ? 'show' : '' }}"
                        id="financialManagement">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="{{ route('annual.paid.users') }}"
                                    class="nav-link {{ request()->routeIs('annual.paid.users') ? 'active' : '' }}"
                                    data-key="t-financial-users">See Users Who Paid Annual Dues</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('annual.unpaid.users') }}"
                                    class="nav-link {{ request()->routeIs('annual.unpaid.users') ? 'active' : '' }}"
                                    data-key="t-financial-unpaid-users">See Users Who Are Yet To Pay Annual Dues</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link menu-link disabled text-muted" href="#" role="button"
                                    aria-disabled="true" style="pointer-events: none; opacity: 0.6;">
                                    <i data-feather="credit-card" class="bx bx-money"></i>
                                    <span>Coming Soon</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
