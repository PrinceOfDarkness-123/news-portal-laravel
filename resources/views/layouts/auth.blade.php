<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Login')</title>
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/login/loginscreen.js') }}"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <img src="{{ asset('images/login screen/Asset 1-100.jpg') }}" class="bg-image" alt="Background">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        @yield('content')
    </div>
</body>
</html>