<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console — CareerConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { margin: 0; background-color: #f8f9fa; }
    </style>
</head>
<body class="bg-light">
    <!-- Clean Flex Layout -->
    <div class="d-flex align-items-stretch" style="min-height: 100vh;">
        
        <!-- Sidebar (Removed outer div wrapper to prevent duplicate padding) -->
        @include('partials.admin-sidebar')

        <!-- Main Content Area -->
        <div class="flex-grow-1 d-flex flex-column" style="min-width: 0;">
            <!-- Header -->
            <header class="bg-white border-bottom p-3 d-flex justify-content-between align-items-center sticky-top">
                <h5 class="mb-0 fw-bold">Admin Control Center</h5>
                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Go to Home</a>
            </header>
            
            <!-- Page Content -->
            <main class="p-4 flex-grow-1">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>