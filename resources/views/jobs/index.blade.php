@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
    <div>
        <h4 class="fw-bold mb-0">Lowongan Kerja Aktif</h4>
        <small class="text-muted">Tersedia {{ $jobs->count() }} peluang karier saat ini</small>
    </div>
    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah Lowongan
    </a>
    @endif
</div>

<div class="row g-3">
    @forelse($jobs as $j)
    <div class="col-lg-6">
        <div class="job-card h-100 d-flex flex-column justify-content-between">

            <!-- Logika Menentukan Ikon Ilustrasi Latar Belakang berdasarkan Kategori -->
            @php
                $cat = strtolower($j->category->name);
                $icon = 'bi-briefcase-fill'; // Ikon default

                if (str_contains($cat, 'it') || str_contains($cat, 'web') || str_contains($cat, 'dev') || str_contains($cat, 'code')) {
                    $icon = 'bi-code-slash';
                } elseif (str_contains($cat, 'bisnis') || str_contains($cat, 'marketing') || str_contains($cat, 'sales')) {
                    $icon = 'bi-graph-up-arrow';
                } elseif (str_contains($cat, 'desain') || str_contains($cat, 'grafis') || str_contains($cat, 'seni')) {
                    $icon = 'bi-palette-fill';
                } elseif (str_contains($cat, 'keuangan') || str_contains($cat, 'bank') || str_contains($cat, 'akuntansi')) {
                    $icon = 'bi-cash-stack';
                }
            @endphp

            <!-- Ikon Besar Transparan sebagai Ilustrasi Latar Belakang -->
            <i class="bi {{ $icon }} job-illustration-icon"></i>

            <div>
                <div class="d-flex justify-content-between align-items-start mb-3" style="position: relative; z-index: 2;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="company-avatar">
                            {{ strtoupper(substr($j->company->name, 0, 2)) }}
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">{{ $j->title }}</h6>
                            <small class="text-muted">
                                {{ $j->company->name }} &bull; <i class="bi bi-geo-alt-fill text-danger"></i> {{ $j->company->city }}
                            </small>
                        </div>
                    </div>
                    <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background:#eef2ff; color:#4f46e5; position: relative; z-index: 2;">
                        {{ $j->category->name }}
                    </span>
                </div>

                <p class="text-secondary small mb-3" style="position: relative; z-index: 2;">{{ Str::limit($j->description, 110) }}</p>
            </div>

            <div class="pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2" style="position: relative; z-index: 2; background: #fff; border-radius: 0 0 20px 20px;">
                <div>
                    <div class="fw-bold text-success small"><i class="bi bi-cash-stack me-1"></i>{{ $j->salary ?? 'Gaji Kompetitif' }}</div>
                    <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-clock me-1"></i>Batas Lamar: {{ $j->deadline }}</div>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('jobs.show', $j->id) }}" class="btn btn-primary btn-sm rounded-3">
                        <i class="bi bi-eye me-1"></i> Detail & Lamar
                    </a>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('jobs.edit', $j->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('jobs.destroy', $j->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus lowongan ini?')"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <img src="https://undraw.co/api/illustrations/download/undraw_empty_re_opql.svg" alt="Kosong" class="mb-3" style="width: 150px; opacity: 0.5;">
        <div class="fw-semibold text-muted">Belum ada lowongan diposting</div>
        @if(Auth::check() && Auth::user()->role === 'admin')
        <small class="text-muted d-block mb-3">Klik tombol Tambah Lowongan untuk memulai.</small>
        @endif
    </div>
    @endforelse
</div>
@endsection
