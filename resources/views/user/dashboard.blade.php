@extends('layouts.dashboard')
@section('title', 'My Feed')
@section('page_title', 'My Personalized Feed')

@section('content')
<!-- Stats Section -->
<div class="row mb-4">
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary">
                    <i class="bi bi-send-fill fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">{{ $stats['applied_count'] }}</h4>
                    <span class="text-muted small">Applications</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3 text-success">
                    <i class="bi bi-stars fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">{{ $stats['skills_count'] }}</h4>
                    <span class="text-muted small">Added Skills</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recommended Jobs -->
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Recommended for your profile</h5>
            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-link text-decoration-none">Browse all</a>
        </div>
        
        <div class="row">
            @forelse($recommendedJobs as $job)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <span class="badge bg-light text-primary border mb-2">{{ $job->category->name }}</span>
                            <h6 class="fw-bold mb-1">{{ $job->title }}</h6>
                            <p class="text-muted small mb-3">{{ $job->company }} • {{ $job->location }}</p>
                            
                            <div class="mb-3">
                                @foreach($job->skills->take(2) as $skill)
                                    <span class="badge border text-dark fw-normal" style="font-size: 0.7rem;">{{ $skill->name }}</span>
                                @endforeach
                            </div>

                            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-sm btn-primary w-100 py-2">Apply Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-5 text-center bg-light">
                        <i class="bi bi-briefcase fs-1 text-muted"></i>
                        <p class="mt-3 text-muted">Complete your profile to get matches.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm mt-2">Add Skills & Interests</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection