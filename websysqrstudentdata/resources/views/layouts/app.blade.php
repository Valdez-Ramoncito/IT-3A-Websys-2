<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --bg: #f2efe8;
            --primary: #2d5a1b;
            --primary-dark: #1a3810;
            --primary-light: #e6ede0;
            --accent: #5c4a2a;
            --text: #2a2a2a;
            --border: #c4d0bc;
            --muted: #7a8c72;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Georgia', serif;
            min-height: 100vh;
        }

        .top-nav {
            background-color: var(--primary);
            padding: 16px 28px;
        }

        .top-nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.05rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .card {
            border: 1px solid var(--border);
            border-radius: 3px;
            background-color: #ffffff;
        }

        .table thead th {
            background-color: var(--primary);
            color: #ffffff;
            font-weight: normal;
            font-size: 0.82rem;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            border: none;
        }

        .table td {
            vertical-align: middle;
            border-color: var(--border);
            font-size: 0.92rem;
        }

        .table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .btn-forest {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            border-radius: 2px;
            font-size: 0.82rem;
            letter-spacing: 0.4px;
        }

        .btn-forest:hover {
            background-color: var(--primary-dark);
            color: #ffffff;
        }

        .btn-earth {
            background-color: var(--accent);
            color: #ffffff;
            border: none;
            border-radius: 2px;
            font-size: 0.82rem;
        }

        .btn-earth:hover {
            background-color: #3e3018;
            color: #ffffff;
        }

        .btn-outline-forest {
            border: 1px solid var(--primary);
            color: var(--primary);
            background: transparent;
            border-radius: 2px;
            font-size: 0.82rem;
        }

        .btn-outline-forest:hover {
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn-danger {
            border-radius: 2px;
            font-size: 0.82rem;
        }

        .form-control, .form-select {
            border: 1px solid var(--border);
            border-radius: 2px;
            background-color: #ffffff;
            font-size: 0.92rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.15rem rgba(45, 90, 27, 0.18);
        }

        .form-label {
            color: var(--accent);
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 4px;
        }

        .alert-success {
            background-color: var(--primary-light);
            border: 1px solid var(--border);
            color: var(--primary);
            border-radius: 2px;
            font-size: 0.88rem;
        }

        .alert-danger {
            border-radius: 2px;
            font-size: 0.88rem;
        }

        .page-title {
            color: var(--primary);
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            font-weight: normal;
        }

        .student-thumb {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 2px;
            border: 1px solid var(--border);
        }

        .no-photo {
            width: 48px;
            height: 48px;
            background-color: var(--primary-light);
            border: 1px solid var(--border);
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            color: var(--muted);
            text-align: center;
            line-height: 1.2;
        }

        .section-line {
            border-color: var(--border);
            margin: 20px 0;
        }

        .detail-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--muted);
            margin-bottom: 2px;
        }

        .detail-value {
            font-size: 0.95rem;
            color: var(--text);
        }
    </style>
</head>
<body>
    <div class="top-nav">
        <a href="{{ route('students.index') }}">Student Records</a>
    </div>
    <div class="container mt-4 mb-5">
        @yield('content')
    </div>
</body>
</html>