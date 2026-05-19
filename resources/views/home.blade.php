@extends('layouts.app')
@section('title', 'CareerConnect — Smart Job & Course Alerts')

@section('content')
<!-- Hero Section -->
<div class="bg-white py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold">🚀 AI-Powered Career Platform</span>
                <h1 class="display-3 fw-bold mb-4 font-dm-sans" style="line-height: 1.1;">Stop Searching. Start <span class="text-primary">Matching.</span></h1>
                <p class="lead text-muted mb-5 fs-5">Set your profile once. Our smart engine matches you with the best jobs and courses, delivering instant alerts straight to your dashboard.</p>
                
                <div class="d-flex gap-3">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow">Join for Free</a>
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-dark btn-lg px-4 py-3">Browse Jobs</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="https://img.freepik.com/free-vector/hiring-process-concept-illustration_114360-1110.jpg" class="img-fluid" alt="Hiring Illustration">
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="bg-light py-5 border-top border-bottom">
    <div class="container py-5 text-center">
        <h2 class="fw-bold mb-5">How CareerConnect Works</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-badge fs-3"></i>
                    </div>
                    <h5 class="fw-bold">1. Build Profile</h5>
                    <p class="text-muted small">Upload your resume and select your skills & interests in seconds.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                        <i class="bi bi-cpu fs-3"></i>
                    </div>
                    <h5 class="fw-bold">2. Smart Match</h5>
                    <p class="text-muted small">Our algorithm finds jobs and courses tailored to your specific profile.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                        <i class="bi bi-bell-fill fs-3"></i>
                    </div>
                    <h5 class="fw-bold">3. Get Alerts</h5>
                    <p class="text-muted small">Receive real-time notifications when a perfect opportunity matches your skills.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-white py-4 border-top">
    <div class="container text-center">
        <p class="text-muted mb-0">CareerConnect. Ayush Kumar</p>
    </div>
</footer>
@endsection