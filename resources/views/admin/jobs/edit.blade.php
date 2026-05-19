@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0">Edit Job: {{ $job->title }}</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Job Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Company Name</label>
                                <input type="text" name="company" class="form-control" value="{{ $job->company }}" required>
                            </div>
                        </div>

                        <!-- Location, Type, Category Row -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ $job->location }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Job Type</label>
                                <select name="job_type" class="form-select">
                                    <option value="full-time" {{ $job->job_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="remote" {{ $job->job_type == 'remote' ? 'selected' : '' }}>Remote</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Category</label>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $job->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Required Skills</label>
                            <div class="d-flex flex-wrap gap-2 p-2 border rounded bg-light">
                                @foreach($skills as $skill)
                                    <input type="checkbox" class="btn-check" name="skills[]" id="skill{{ $skill->id }}" value="{{ $skill->id }}" 
                                        {{ $job->skills->contains($skill->id) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary btn-sm" for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $job->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Requirements</label>
                            <textarea name="requirements" class="form-control" rows="4" required>{{ $job->requirements }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success px-5 fw-bold">Update Job</button>
                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-link text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection