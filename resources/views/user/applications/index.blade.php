@extends('layouts.dashboard')
@section('page_title', 'My Applications')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Job Details</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $app)
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="fw-bold">{{ $app->job->title }}</div>
                                        <div class="text-muted small">{{ $app->job->company }}</div>
                                    </td>
                                    <td>{{ $app->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @php
                                            $statusClass = [
                                                'pending' => 'bg-warning text-dark',
                                                'reviewed' => 'bg-info text-white',
                                                'shortlisted' => 'bg-primary text-white',
                                                'rejected' => 'bg-danger text-white',
                                                'hired' => 'bg-success text-white'
                                            ][$app->status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge {{ $statusClass }} text-capitalize">{{ $app->status }}</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('jobs.show', $app->job->slug) }}" class="btn btn-sm btn-outline-primary">View Job</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-send-exclamation fs-1"></i>
                                        <p class="mt-2">You haven't applied for any jobs yet.</p>
                                        <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-sm mt-2">Browse Jobs</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection