<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub — Portal Lowongan Kerja</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f5f9;
            color: #1e293b;
            overflow-x: hidden;
        }
        /* Sidebar Kiri */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #0f172a;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding: 24px 16px;
            z-index: 100;
        }
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 24px;
            text-decoration: none;
            color: #fff;
        }
        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
        }
        .menu-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #64748b;
            font-weight: 700;
            padding: 0 12px;
            margin-bottom: 10px;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 11px 14px;
            border-radius: 12px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.35);
        }

        /* Area Konten Utama */
        .main-wrapper {
            margin-left: 240px;
            padding: 28px 32px;
        }
        @media (max-width: 768px) {
            .sidebar { width: 100%; min-height: auto; position: relative; padding: 14px; }
            .main-wrapper { margin-left: 0; padding: 18px; }
        }

        /* Hero Banner Atas */
        .hero-banner {
            background: linear-gradient(120deg, #1e1b4b 0%, #312e81 50%, #4f46e5 100%);
            border-radius: 22px;
            padding: 28px 32px;
            color: #fff;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 30px -10px rgba(79, 70, 229, 0.4);
        }
        .hero-banner::after {
            content: '';
            position: absolute;
            right: -40px;
            top: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
        }

        /* Card Putih */
        .content-card {
            background: #ffffff;
            border-radius: 22px;
            padding: 26px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -10px rgba(15, 23, 42, 0.05);
            overflow-x: auto;
        }

        /* Kartu Lowongan Hover */
        .job-card {
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 18px;
            padding: 22px;
            transition: all 0.25s ease;
        }
        .job-card:hover {
            border-color: #6366f1;
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -12px rgba(99, 102, 241, 0.2);
        }
        .company-avatar {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
            color: #4338ca;
            font-weight: 800;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Tabel & Tombol */
        .table th {
            background: #f8fafc !important;
            color: #64748b;
            font-size: 0.74rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border: none;
            padding: 13px 16px;
        }
        .table td {
            padding: 15px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }
        .btn { border-radius: 11px; font-weight: 600; padding: 9px 16px; font-size: 0.86rem; }
        .btn-sm { padding: 5px 11px; font-size: 0.78rem; border-radius: 8px; }
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border: none;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.35);
        }
        .btn-warning { background: #fef3c7; border: none; color: #b45309; }
        .btn-danger { background: #fee2e2; border: none; color: #b91c1c; }
        .form-control, .form-select {
            border-radius: 12px;
            padding: 10px 14px;
            border: 1.5px solid #cbd5e1;
        }
    </style>
</head>
<body>

<!-- Sidebar Kiri -->
<aside class="sidebar">
    <a href="/jobs" class="brand-logo">
        <div class="brand-icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
        <div>
            <div class="fw-bold fs-6 lh-1">CareerHub</div>
            <small class="text-secondary" style="font-size: 0.72rem;">Job Portal System</small>
        </div>
    </a>

    <div class="menu-label">Menu Utama</div>
    <nav class="nav flex-column">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i> Halaman Home
        </a>
        <a class="nav-link {{ request()->is('jobs*') ? 'active' : '' }}" href="{{ route('jobs.index') }}">
            <i class="bi bi-briefcase-fill"></i> Lowongan Kerja
        </a>
        <a class="nav-link {{ request()->is('companies*') ? 'active' : '' }}" href="{{ route('companies.index') }}">
            <i class="bi bi-buildings-fill"></i> Perusahaan
        </a>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
            <i class="bi bi-grid-fill"></i> Kategori Bidang
        </a>
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="bi bi-person-badge-fill"></i> Kelola Users
        </a>
        @endif

        @auth
        <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
            <i class="bi bi-person-circle"></i> Profil Saya
        </a>
        @endauth
    </nav>

    <!-- Info Akun & Tombol Logout -->
    <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
        @auth
            <div class="px-2 mb-2">
                <div class="fw-bold small text-white">{{ Auth::user()->name }}</div>
                <span class="badge bg-primary bg-opacity-25 text-info text-uppercase" style="font-size: 0.65rem;">
                    Role: {{ Auth::user()->role }}
                </span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm w-100 text-start">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
        @endauth
    </div>
</aside>

<!-- Konten Kanan -->
<main class="main-wrapper">
    <div class="hero-banner d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <span class="badge bg-white bg-opacity-10 text-white px-3 py-1 rounded-pill mb-2">
                <i class="bi bi-stars text-warning"></i> Dashboard Portal Loker
            </span>
            <h4 class="fw-bold mb-1">Temukan & Kelola Karier Impian</h4>
            <p class="mb-0 text-white-50 small">Sistem manajemen lowongan kerja, perusahaan mitra, dan kategori posisi.</p>
        </div>
    </div>

    <div class="content-card">
        @if(session('error'))
            <div class="alert alert-danger rounded-3 py-2 small mb-3">
                <i class="bi bi-shield-exclamation me-1"></i> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
