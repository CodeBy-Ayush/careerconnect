@extends('layouts.admin') <!-- Humne layout badal diya -->

@section('content')
<div class="row g-4">
    <!-- Stats Cards -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 text-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-briefcase fs-3"></i>
                </div>
                <h2 class="fw-bold mb-0">{{ $stats['total_jobs'] }}</h2>
                <p class="text-muted small mb-0">Total Jobs Posted</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 text-center">
                <div class="bg-dark bg-opacity-10 text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-people fs-3"></i>
                </div>
                <h2 class="fw-bold mb-0">{{ $stats['total_users'] }}</h2>
                <p class="text-muted small mb-0">Registered Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 text-center">
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-send fs-3"></i>
                </div>
                <h2 class="fw-bold mb-0">{{ $stats['total_apps'] }}</h2>
                <p class="text-muted small mb-0">Total Applications</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="fw-bold mb-0">Recent Platform Activity</h6>
            </div>
            <div class="card-body p-4">
                <p class="text-muted small">Platform is running smoothly. No system issues reported.</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Post a New Job</a>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-dark">Manage Jobs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection