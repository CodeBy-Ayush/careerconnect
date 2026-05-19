@extends('layouts.admin')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Name</th><th>Email</th><th>Joined</th></tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->created_at->format('M d, Y') }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection