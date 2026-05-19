<header class="bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center sticky-top">
    <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h5>
    
    <div class="d-flex align-items-center">
        <!-- Notification Dropdown -->
        <div class="dropdown me-3">
            <button class="btn btn-light position-relative border-0 bg-transparent" data-bs-toggle="dropdown">
                <i class="bi bi-bell fs-5 text-secondary"></i>
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="width: 12px; height: 12px;"></span>
                @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="width: 320px;">
                <li class="px-3 py-2 border-bottom d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-muted small">Notifications</span>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <form action="{{ route('notifications.read-all') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link btn-sm text-decoration-none p-0">Mark all read</button>
                        </form>
                    @endif
                </li>
                
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <li class="border-bottom">
                        <div class="dropdown-item py-2 px-3 text-wrap bg-primary bg-opacity-10">
                            <div class="fw-bold small">{{ $notification->data['title'] }}</div>
                            <div class="text-muted mb-2" style="font-size: 0.75rem;">{{ $notification->data['message'] }}</div>
                            
                            <div class="d-flex gap-2">
                                <!-- Check if it is a job or course -->
                                @if(isset($notification->data['job_slug']) && $notification->data['job_slug'] != '#')
                                    <a href="{{ route('jobs.show', $notification->data['job_slug']) }}" class="btn btn-sm btn-primary py-0 px-2 small">View</a>
                                @else
                                    <a href="#" class="btn btn-sm btn-primary py-0 px-2 small">View Course</a>
                                @endif
                                
                                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary py-0 px-2 small">Dismiss</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-3 py-4 text-center text-muted small">No new notifications.</li>
                @endforelse
            </ul>
        </div>
        
        <div class="d-none d-md-block">
            <span class="fw-bold small">{{ auth()->user()->name }}</span>
            <span class="badge bg-light text-dark ms-2">{{ ucfirst(auth()->user()->role) }}</span>
        </div>
    </div>
</header>