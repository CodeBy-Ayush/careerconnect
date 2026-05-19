@extends('layouts.dashboard')
@section('page_title', 'My Profile')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Avatar Section -->
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" 
                             class="rounded-circle me-3" width="80" height="80" style="object-fit: cover;">
                        <div>
                            <label class="form-label fw-bold">Profile Photo</label>
                            <input type="file" name="avatar" class="form-control form-control-sm">
                        </div>
                    </div>

                    <!-- Personal Info -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $user->location }}" placeholder="e.g. New York, Remote">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Bio</label>
                        <textarea name="bio" class="form-control" rows="3">{{ $user->bio }}</textarea>
                    </div>

                    <!-- Skills Section -->
                    <h5 class="mt-4 mb-3 border-bottom pb-2">Professional Skills</h5>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">Select all that apply</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <input type="checkbox" class="btn-check" name="skills[]" id="skill{{ $skill->id }}" value="{{ $skill->id }}" 
                                    {{ $user->skills->contains($skill->id) ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary btn-sm" for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Career Interests Section (ADDED HERE) -->
                    <h5 class="mt-4 mb-3 border-bottom pb-2">Career Interests</h5>
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-primary small text-uppercase">{{ $category->name }}</label>
                                <div class="ps-2">
                                    @foreach($category->interests as $interest)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" 
                                                   value="{{ $interest->id }}" id="interest{{ $interest->id }}"
                                                   {{ $user->interests->contains($interest->id) ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="interest{{ $interest->id }}">
                                                {{ $interest->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-5 fw-bold">Save All Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Resume Sidebar Section -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">My Resumes</h5>
                
                @forelse($user->resumes as $resume)
                    <div class="d-flex align-items-center justify-content-between p-2 border rounded mb-2 bg-light">
                        <div class="text-truncate" style="max-width: 150px;">
                            <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                            <span class="small">{{ $resume->file_name }}</span>
                        </div>
                        <form action="{{ route('resume.destroy', $resume) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-link text-danger p-0" onclick="return confirm('Delete this resume?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-muted small">No resumes uploaded yet.</p>
                @endforelse

                <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data" class="mt-3 pt-3 border-top">
                    @csrf
                    <label class="form-label small fw-bold">Upload New (PDF/DOC)</label>
                    <input type="file" name="resume" class="form-control form-control-sm mb-2" required>
                    <button class="btn btn-dark btn-sm w-100">Upload Resume</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection