<div class="bg-dark text-white border-end d-flex flex-column p-3 shadow" style="width: 260px; min-height: 100vh;">
    <!-- Logo -->
    <a href="/" class="d-flex align-items-center mb-4 mt-2 text-decoration-none text-white">
        <i class="bi bi-briefcase-fill fs-3 me-2 text-primary"></i>
        <span class="fs-4 fw-bold">Admin Panel</span>
    </a>

    <!-- Navigation Links -->
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-primary rounded' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard Overview
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.jobs.index') }}" class="nav-link text-white py-3 {{ request()->routeIs('admin.jobs.*') ? 'bg-primary rounded' : '' }}">
                <i class="bi bi-briefcase me-2"></i> Manage Jobs
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.courses.index') }}" class="nav-link text-white py-3 {{ request()->routeIs('admin.courses.*') ? 'bg-primary rounded' : '' }}">
                <i class="bi bi-journal-bookmark me-2"></i> Manage Courses
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link text-white py-3 {{ request()->routeIs('admin.users.*') ? 'bg-primary rounded' : '' }}">
                <i class="bi bi-people me-2"></i> Registered Users
            </a>
        </li>
    </ul>

    <!-- Logout at the Bottom -->
    <hr class="bg-light">
    <div class="mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100 py-2">
                <i class="bi bi-box-arrow-left me-2"></i> Logout Admin
            </button>
        </form>
    </div>
</div>