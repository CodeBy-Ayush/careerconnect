@extends('layouts.admin')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3"><h5 class="mb-0 fw-bold">Registered Users</h5></div>
    <div class="card-body p-0">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Name</th><th>Email</th></tr></thead>
            <tbody>
                @foreach($users as $user)
                <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection