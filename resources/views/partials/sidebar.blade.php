<div class="bg-white border-end d-flex flex-column p-3" style="width: 260px;">
    <a href="/" class="d-flex align-items-center mb-4 mt-2 text-decoration-none text-primary">
        <i class="bi bi-briefcase-fill fs-3 me-2"></i>
        <span class="fs-4 fw-bold font-dm-sans">CareerConnect</span>
    </a>

    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
         <a href="{{ route('jobs.index') }}" class="sidebar-link {{ request()->routeIs('jobs.*') ? 'active' : '' }}">
        <i class="bi bi-search me-2"></i> Find Jobs
        </a>
        </li>
       <!-- Isse replace karein -->
      <li class="nav-item">
       <a href="{{ route('courses.index') }}" class="sidebar-link {{ request()->routeIs('courses.index') ? 'active' : '' }}">
        <i class="bi bi-journal-bookmark me-2"></i> Find Courses
       </a>
      </li>
        <li class="mt-3 mb-2 text-muted small fw-bold text-uppercase px-3">My Account</li>
        <li class="nav-item">
            <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <i class="bi bi-person me-2"></i> Profile & Resume
            </a>
        </li>
        <li class="nav-item">
         <a href="{{ route('applications.index') }}" class="sidebar-link {{ request()->routeIs('applications.index') ? 'active' : '' }}">
    <i class="bi bi-send me-2"></i> My Applications
    <span class="badge bg-primary rounded-pill float-end">{{ auth()->user()->applications->count() }}</span>
</a>
        </li>

    </ul>

    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-4 me-2 text-secondary"></i>
            <strong>{{ auth()->user()->name ?? 'User' }}</strong>
        </a>
        <ul class="dropdown-menu shadow">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>

