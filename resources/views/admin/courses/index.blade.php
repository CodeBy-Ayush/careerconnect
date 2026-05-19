@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold">Manage Courses</h4>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add Course</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>Title</th><th>Provider</th><th>Price</th></tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->provider }}</td>
                    <td>{{ $course->is_free ? 'Free' : '$'.$course->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection