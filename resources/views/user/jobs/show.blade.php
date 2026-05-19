@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 mb-4">
                <h2 class="fw-bold mb-1">{{ $job->title }}</h2>
                <p class="text-muted fs-5">{{ $job->company }} • {{ $job->location }}</p>
                <hr>
                
                <h5 class="fw-bold">About the Role</h5>
                <p>{!! nl2br(e($job->description)) !!}</p>

                <h5 class="fw-bold mt-4">Requirements</h5>
                <p>{!! nl2br(e($job->requirements)) !!}</p>

                <h5 class="fw-bold mt-4">Skills Required</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($job->skills as $skill)
                        <span class="badge bg-light text-dark border">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-3">Ready to apply?</h4>
                <p class="text-muted small">Make sure your resume is updated in your profile settings before submitting.</p>
                
                @auth
                    @if(auth()->user()->hasApplied($job))
                        <button class="btn btn-success w-100 py-2 disabled">
                            <i class="bi bi-check-circle me-2"></i>Already Applied
                        </button>
                    @else
                        <form action="{{ route('jobs.apply', $job) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Apply Now</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-100 py-2 fw-bold">Login to Apply</a>
                @endauth

                <div class="mt-4 pt-4 border-top">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Job Type:</span>
                        <span class="fw-bold text-capitalize">{{ $job->job_type }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Salary:</span>
                        <span class="fw-bold text-success">${{ number_format($job->salary_min) }} - ${{ number_format($job->salary_max) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection