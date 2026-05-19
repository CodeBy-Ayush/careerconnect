@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="fw-bold">Level Up Your Skills</h2>
            <p class="text-muted">Explore hand-picked courses based on your interests.</p>
        </div>
    </div>

    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <span class="badge bg-success bg-opacity-10 text-success mb-2">{{ $course->category->name }}</span>
                    <h6 class="fw-bold mb-1">{{ $course->title }}</h6>
                    <p class="text-muted small mb-3">{{ $course->provider }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="fw-bold">{{ $course->is_free ? 'Free' : '$'.$course->price }}</span>
                        <a href="{{ $course->url }}" target="_blank" class="btn btn-sm btn-dark">View Course</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection