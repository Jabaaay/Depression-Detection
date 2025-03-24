<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Depression<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Manage Test -->
    <li class="nav-item {{ request()->routeIs('test*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('test.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Manage Test</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Patients -->
    <li class="nav-item {{ request()->routeIs('patients*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('patients.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Patients</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Reports -->
    <li class="nav-item {{ request()->routeIs('reports*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reports.index') }}">
            <i class="fas fa-fw fa-file-medical"></i>
            <span>Reports</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

