<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Laravel News Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar min-vh-100 sidebar-width">
            <div class="top-background-color p-3">
              <h4 class="text-white m-0 p-3">Admin Panel</h4>
            </div>
            <ul class="nav flex-column p-3">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Posts</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Categories</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Users</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Comments</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Tags</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Media</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Pages</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="">Settings</a></li>
        <li class="nav-item mt-3"><a class="nav-link text-white" href="">Logout</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>