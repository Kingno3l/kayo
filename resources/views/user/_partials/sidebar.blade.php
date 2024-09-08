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

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                       <li class="nav-item">
    <a class="nav-link menu-link" href="" role="button">
        <i data-feather="home" class="icon-dual"></i> 
        <span data-key="t-dashboards">Dashboard</span>
    </a>
</li> <!-- end Dashboard Menu -->

                       
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Menu</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i data-feather="users" class="icon-dual"></i> <span
                                    data-key="t-authentication">Members Directory</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
    <a href="#allUsers" class="nav-link" data-key="t-all-users"> View All Registered Users</a>
</li>
<li class="nav-item">
    <a href="#completedUsers" class="nav-link" data-key="t-completed-users"> View Users with Completed Registrations</a>
</li>
<li class="nav-item">
    <a href="#financialUsers" class="nav-link" data-key="t-financial-users"> View Users with Financial Transactions</a>
</li>

                                    
                                </ul>
                            </div>
                        </li>

                       
                      
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>