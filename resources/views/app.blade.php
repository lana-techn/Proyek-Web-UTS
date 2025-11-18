<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Manajemen Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary: #1e293b;
            --primary-light: #334155;
            --accent: #6366f1;
            --accent-light: #818cf8;
            --accent-hover: #4f46e5;
            --success: #10b981;
            --success-light: #d1fae5;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --info: #06b6d4;
            --info-light: #cffafe;
            --light-bg: #f1f5f9;
            --white: #ffffff;
            --border-color: #cbd5e1;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-light: #78716c;
            --shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 4px 6px rgba(15, 23, 42, 0.08);
            --shadow-lg: 0 10px 15px rgba(15, 23, 42, 0.1);
        }

        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: var(--shadow-md);
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: white !important;
            letter-spacing: -0.5px;
            text-transform: uppercase;
            font-size: 1.25rem;
        }

        .navbar-brand i {
            margin-right: 0.75rem;
            color: var(--accent-light);
            font-size: 1.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            margin: 0 0.25rem;
        }

        .nav-link:hover {
            color: var(--accent-light) !important;
            background-color: rgba(129, 140, 248, 0.1);
        }

        .nav-link.active {
            color: var(--accent-light) !important;
            background-color: rgba(129, 140, 248, 0.15);
            border-radius: 6px;
            font-weight: 600;
        }

        .container-main {
            margin-top: 2rem;
            margin-bottom: 2rem;
            flex: 1;
        }

        .card {
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
            border-radius: 12px;
            background-color: var(--white);
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--accent);
        }

        .card-header {
            background: white;
            color: var(--text-primary);
            border-radius: 0;
            border: none;
            padding: 1.5rem;
            border-bottom: 2px solid var(--accent);
            box-shadow: 0 2px 4px rgba(15, 23, 42, 0.03);
        }

        .card-header h4,
        .card-header h5 {
            margin-bottom: 0;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.3px;
        }

        .card-header i {
            margin-right: 0.75rem;
            color: var(--accent);
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-footer {
            background-color: var(--light-bg);
            border-top: 1px solid var(--border-color);
            border-radius: 0;
            padding: 1rem 1.5rem;
        }

        .btn {
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            border: none;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: left 0.2s ease;
            display: none;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
            border-color: var(--accent);
            color: white;
            padding: 0.625rem 1.25rem;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-hover) 0%, var(--accent) 100%);
            border-color: var(--accent-hover);
            box-shadow: 0 4px 8px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:active {
            opacity: 0.95;
        }

        .btn-secondary {
            background-color: var(--text-secondary);
            border-color: var(--text-secondary);
            color: white;
            padding: 0.625rem 1.25rem;
        }

        .btn-secondary:hover {
            background-color: var(--primary-light);
            border-color: var(--primary-light);
            box-shadow: 0 4px 8px rgba(71, 85, 105, 0.2);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info) 0%, #0891b2 100%);
            border-color: var(--info);
            color: white;
            font-weight: 600;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%);
            box-shadow: 0 4px 8px rgba(6, 182, 212, 0.2);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning) 0%, #fbbf24 100%);
            border-color: var(--warning);
            color: white;
            font-weight: 600;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #fbbf24 0%, var(--warning) 100%);
            box-shadow: 0 4px 8px rgba(245, 158, 11, 0.2);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger) 0%, #f87171 100%);
            border-color: var(--danger);
            color: white;
            font-weight: 600;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #f87171 0%, var(--danger) 100%);
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.2);
        }

        .btn-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 6px;
        }

        .alert {
            border: none;
            border-radius: 10px;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            border-left: 4px solid;
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.05);
            color: #065f46;
            border-left-color: var(--success);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.05);
            color: #7f1d1d;
            border-left-color: var(--danger);
        }

        .alert ul {
            margin-bottom: 0;
        }

        .alert ul li {
            margin-bottom: 0.25rem;
        }

        .alert i {
            margin-right: 0.5rem;
        }

        .btn-close {
            opacity: 0.5;
            filter: brightness(0);
            transition: opacity 0.2s ease;
        }

        .btn-close:hover {
            opacity: 0.8;
        }

        .table {
            background: var(--white);
            margin-bottom: 0;
        }

        .table thead th {
            background: white;
            color: var(--text-primary);
            border: none;
            border-bottom: 2px solid var(--accent);
            padding: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .table tbody td {
            border-top: 1px solid var(--border-color);
            padding: 1rem;
            vertical-align: middle;
            color: var(--text-primary);
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: var(--light-bg);
        }

        .form-label {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.625rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        .form-label i {
            color: var(--accent);
            width: 18px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 2px solid var(--border-color);
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: var(--text-primary);
            background-color: var(--white);
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        .is-invalid {
            border-color: var(--danger) !important;
        }

        .badge {
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .badge.bg-info {
            background: linear-gradient(135deg, #cffafe 0%, #a5f3fc 100%);
            color: #164e63 !important;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #7f1d1d !important;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534 !important;
        }

        footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer p {
            margin-bottom: 0;
            font-weight: 500;
            letter-spacing: -0.3px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .no-data {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .no-data i {
            font-size: 4rem;
            color: var(--accent-light);
            margin-bottom: 1rem;
            display: block;
            opacity: 0.5;
        }

        .no-data p {
            font-size: 1.125rem;
            margin-bottom: 0;
            color: var(--text-secondary);
        }

        .no-data a {
            color: var(--accent);
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .no-data a:hover {
            color: var(--accent-hover);
            text-decoration: underline;
        }

        .d-flex {
            align-items: center;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--text-primary);
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        h1 { font-size: 2.25rem; }
        h2 { font-size: 1.875rem; }
        h3 { font-size: 1.5rem; }
        h4 { font-size: 1.25rem; }
        h5 { font-size: 1.125rem; }

        .text-muted {
            color: var(--text-secondary) !important;
        }

        .text-light {
            color: var(--text-light) !important;
        }

        hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 1.5rem 0;
        }

        code {
            background-color: var(--light-bg);
            color: var(--accent);
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.9em;
            font-weight: 600;
        }

        /* Utility Classes */
        .text-center {
            text-align: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .gap-2 {
            gap: 0.75rem;
        }

        .mb-0 { margin-bottom: 0 !important; }
        .mb-2 { margin-bottom: 0.5rem !important; }
        .mb-3 { margin-bottom: 1rem !important; }
        .mb-4 { margin-bottom: 1.5rem !important; }

        .fw-bold {
            font-weight: 700;
        }

        .ps-3 {
            padding-left: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 { font-size: 1.875rem; }
            h2 { font-size: 1.5rem; }
            h3 { font-size: 1.25rem; }
            
            .card-body { padding: 1.25rem; }
            .btn-sm { padding: 0.4rem 0.6rem; font-size: 0.8rem; }
        }
    </style>
    @yield('extra-styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('mahasiswa.index') }}">
                <i class="bi bi-people-fill"></i> Project UTS Maulana 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('mahasiswa.index*') && !request()->routeIs('*.table') ? 'active' : '' }}" 
                           href="{{ route('mahasiswa.index.card') }}">
                            <i class="bi bi-grid-3x2-gap"></i> Daftar Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('*.table') ? 'active' : '' }}" 
                           href="{{ route('mahasiswa.index.table') }}">
                            <i class="bi bi-file-earmark-text"></i> Laporan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid container-main">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="bi bi-exclamation-triangle"></i> Terjadi Kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 UTS Proyek Web - Sistem Informasi Akuntansi. Dibuat dengan menggunakan Laravel 12</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
