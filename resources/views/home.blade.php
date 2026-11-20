<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub — Temukan Karier Impianmu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        .navbar-home {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
        }
        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .hero-section {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 45%, #4f46e5 100%);
            color: #fff;
            padding: 65px 0 95px;
            border-radius: 0 0 36px 36px;
        }
        .stat-wrapper {
            position: relative;
            z-index: 10;
            margin-top: -48px;
        }
        .stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.12);
        }
        .job-preview {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 22px;
            transition: 0.25s ease;
        }
        .job-preview:hover {
            transform: translateY(-4px);
            border-color: #6366f1;
            box-shadow: 0 15px 30px -12px rgba(79, 70, 229, 0.2);
        }
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- Navbar Atas -->
<nav class="navbar navbar-expand navbar-home sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2 text-dark" href="/">
            <span class="brand-icon"><i class="bi bi-rocket-takeoff-fill"></i></span>
            <span>CareerHub</span>
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            @auth
                <a href="{{ route('jobs.index') }}" class="btn btn-primary">Masuk Dashboard <i class="bi bi-arrow-right ms-1"></i></a>
                <a href="{{ route('profile') }}" class="btn btn-light fw-semibold rounded-3 d-flex align-items-center gap-2 border">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset(Auth::user()->avatar) }}" alt="Profil" class="rounded-circle object-fit-cover" style="width: 24px; height: 24px;">
                    @else
                        <i class="bi bi-person-circle text-primary"></i>
                    @endif
                    <span>{{ Auth::user()->name }}</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light fw-semibold rounded-3">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar Akun</a>
            @endauth
        </div>
</nav>

<!-- Hero Banner -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge bg-white bg-opacity-10 text-white px-3 py-2 rounded-pill mb-3">
                    <i class="bi bi-stars text-warning me-1"></i> Portal Lowongan Kerja Terpercaya
                </span>
                <h1 class="display-5 fw-bold mb-3">Temukan Pekerjaan Terbaik Sesuai Passionmu</h1>
                <p class="lead text-white-50 mb-4 fs-6">
                    Jelajahi berbagai peluang karier dari perusahaan mitra pilihan di berbagai bidang industri dengan mudah dan cepat.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('jobs.index') }}" class="btn btn-light text-primary fw-bold px-4 py-3 rounded-4">
                        <i class="bi bi-search me-2"></i>Jelajahi Lowongan
                    </a>
                    <a href="{{ route('companies.index') }}" class="btn btn-outline-light fw-semibold px-4 py-3 rounded-4">
                        Lihat Perusahaan
                    </a>
                </div>
            </div>

            <!-- Ilustrasi Vektor Built-in (Pasti Tampil & Anti Pecah) -->
            <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                <svg width="340" height="240" viewBox="0 0 360 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="30" y="25" width="300" height="190" rx="22" fill="white" fill-opacity="0.1" stroke="white" stroke-opacity="0.2" stroke-width="1.5"/>
                    <circle cx="58" cy="48" r="5" fill="#F87171"/>
                    <circle cx="75" cy="48" r="5" fill="#FBBF24"/>
                    <circle cx="92" cy="48" r="5" fill="#34D399"/>
                    <!-- Kartu Lowongan Mini -->
                    <rect x="52" y="72" width="256" height="54" rx="14" fill="white"/>
                    <rect x="66" y="84" width="30" height="30" rx="8" fill="#EEF2FF"/>
                    <path d="M76 96H86V104H76V96ZM79 93H83V96H79V93Z" fill="#4F46E5"/>
                    <rect x="108" y="88" width="95" height="9" rx="4.5" fill="#1E293B"/>
                    <rect x="108" y="103" width="60" height="7" rx="3.5" fill="#94A3B8"/>
                    <rect x="242" y="89" width="52" height="20" rx="10" fill="#DCFCE7"/>
                    <rect x="252" y="96" width="32" height="6" rx="3" fill="#16A34A"/>
                    <!-- Kartu Kedua -->
                    <rect x="52" y="138" width="256" height="54" rx="14" fill="white" fill-opacity="0.9"/>
                    <rect x="66" y="150" width="30" height="30" rx="8" fill="#FEF3C7"/>
                    <circle cx="81" cy="165" r="7" fill="#F59E0B"/>
                    <rect x="108" y="154" width="110" height="9" rx="4.5" fill="#1E293B"/>
                    <rect x="108" y="169" width="75" height="7" rx="3.5" fill="#94A3B8"/>
                    <rect x="242" y="155" width="52" height="20" rx="10" fill="#E0E7FF"/>
                    <rect x="252" y="162" width="32" height="6" rx="3" fill="#4F46E5"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Ringkas (Rapi di Atas Banner) -->
<div class="container stat-wrapper mb-5">
    <div class="stat-card">
        <div class="row text-center g-3">
            <div class="col-4 border-end">
                <h2 class="fw-bold text-primary mb-0">{{ $totalJobs }}</h2>
                <small class="text-muted fw-semibold">Lowongan Aktif</small>
            </div>
            <div class="col-4 border-end">
                <h2 class="fw-bold text-success mb-0">{{ $totalCompanies }}</h2>
                <small class="text-muted fw-semibold">Perusahaan Mitra</small>
            </div>
            <div class="col-4">
                <h2 class="fw-bold text-warning mb-0">{{ $totalCategories }}</h2>
                <small class="text-muted fw-semibold">Kategori Bidang</small>
            </div>
        </div>
    </div>
</div>

<!-- Lowongan Terbaru -->
<section class="container pb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Lowongan Terbaru</h4>
            <p class="text-muted small mb-0">Peluang karier terbaru yang baru saja diposting</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="text-decoration-none fw-semibold">Semua Lowongan &rarr;</a>
    </div>

    <div class="row g-3">
        @forelse($latestJobs as $job)
        <div class="col-md-6 col-lg-4">
            <div class="job-preview h-100 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#eef2ff; color:#4f46e5;">
                        {{ $job->category->name }}
                    </span>
                    <h5 class="fw-bold mb-1">{{ $job->title }}</h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-building me-1"></i>{{ $job->company->name }} &bull; {{ $job->company->city }}
                    </p>
                </div>
                <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-success small">{{ $job->salary ?? 'Gaji Kompetitif' }}</span>
                    <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-outline-primary rounded-3">Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-4 text-muted">
            Belum ada lowongan terbaru.
        </div>
        @endforelse
    </div>
</section>

</body>
</html>
