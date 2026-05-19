@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3"><h5 class="mb-0 fw-bold">Add New Course</h5></div>
        <div class="card-body p-4">
            <form action="{{ route('admin.courses.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Course Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Provider Name</label>
                        <input type="text" name="provider" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" name="price" class="form-control" value="0" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Level</label>
                        <select name="level" class="form-select">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                        </select>
                    </div>
                    <div class="mb-3">
              <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3" required></textarea>
</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course URL</label>
                    <input type="url" name="url" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary px-4">Save Course</button>
            </form>
        </div>
    </div>
</div>
@endsection