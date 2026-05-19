@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="fw-bold">Discover Your Next Opportunity</h1>
            <p class="text-muted">Browse thousands of jobs matched to your skills.</p>
            
            <form action="{{ route('jobs.index') }}" method="GET" class="d-flex mt-4">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by job title or company..." value="{{ request('search') }}">
                <button class="btn btn-primary px-4">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($jobs as $job)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary">{{ $job->job_type }}</span>
                            <span class="text-muted small"><i class="bi bi-clock"></i> {{ $job->created_at->diffForHumans() }}</span>
                        </div>
                        <h5 class="fw-bold mb-1">{{ $job->title }}</h5>
                        <p class="text-secondary mb-3">{{ $job->company }} • {{ $job->location }}</p>
                        
                        <div class="mb-3">
                            @foreach($job->skills->take(3) as $skill)
                                <span class="badge border text-dark fw-normal">{{ $skill->name }}</span>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="fw-bold text-success">
                                ${{ number_format($job->salary_min/1000) }}k - ${{ number_format($job->salary_max/1000) }}k
                            </span>
                            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-sm btn-outline-primary px-3">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search fs-1 text-muted"></i>
                <p class="mt-3 text-muted">No jobs found matching your criteria.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection