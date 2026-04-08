<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .navbar-brand span {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .sidebar .nav-link {
            color: #495057;
            padding: 0.6rem 1rem;
            border-radius: 6px;
            margin-bottom: 2px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 8px;
        }
        .card {
            border: none;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        .card-header {
            font-weight: 600;
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-mortarboard-fill me-2"></i>
            <span>Student Enrollment Portal</span>
        </a>
        @if(Session::has('user_id'))
        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-white-50 small">{{ Session::get('user_name') }}</span>
            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
        @endif
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
