@extends('layout')
@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
    <a href="{{ route('companies.index') }}" class="btn btn-light btn-sm border">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Perusahaan
    </a>

    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">
        <i class="bi bi-pencil-square me-1"></i> Edit Profil Perusahaan
    </a>
    @endif
</div>

<!-- Kartu Header Profil & Logo Perusahaan -->
<div class="p-4 rounded-4 border bg-light bg-opacity-50 mb-4">
    <div class="d-flex align-items-center gap-3 flex-wrap">
        @if(!empty($company->logo))
            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" class="rounded-4 object-fit-cover border bg-white" style="width: 82px; height: 82px;">
        @else
            <div class="company-avatar" style="width: 82px; height: 82px; font-size: 1.7rem; border-radius: 20px;">
                {{ strtoupper(substr($company->name, 0, 2)) }}
            </div>
        @endif

        <div>
            <span class="badge rounded-pill px-3 py-1 mb-1" style="background:#eef2ff; color:#4f46e5;">
                <i class="bi bi-patch-check-fill me-1"></i> Perusahaan Mitra
            </span>
            <h3 class="fw-bold mb-1 text-dark">{{ $company->name }}</h3>
            <div class="d-flex flex-wrap gap-3 text-muted small">
                <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $company->city }}</span>
                <span><i class="bi bi-envelope-fill text-primary me-1"></i> {{ $company->email }}</span>
                @if(!empty($company->phone))
                    <span><i class="bi bi-whatsapp text-success me-1"></i> {{ $company->phone }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Biodata / Tentang Perusahaan -->
<div class="mb-4">
    <h6 class="fw-bold text-primary mb-2"><i class="bi bi-building me-1"></i> Tentang / Biodata Perusahaan</h6>
    <div class="p-3 rounded-3 border bg-white text-secondary" style="line-height: 1.7;">
        {{ $company->description ?? $company->bio ?? 'Perusahaan mitra resmi yang membuka peluang karier profesional melalui platform CareerHub.' }}
    </div>
</div>

<!-- Daftar Lowongan Aktif di Perusahaan Ini -->
<div>
    <h6 class="fw-bold mb-3"><i class="bi bi-briefcase-fill text-primary me-1"></i> Lowongan Kerja di {{ $company->name }} ({{ $company->jobs->count() }})</h6>
    <div class="row g-3">
        @forelse($company->jobs as $job)
        <div class="col-md-6">
            <div class="p-3 rounded-4 border bg-white d-flex justify-content-between align-items-center gap-2">
                <div>
                    <div class="fw-bold text-dark">{{ $job->title }}</div>
                    <small class="text-muted">
                        {{ $job->category->name ?? 'Umum' }} &bull; <span class="text-success fw-semibold">{{ $job->salary ?? 'Gaji Kompetitif' }}</span>
                    </small>
                </div>
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm flex-shrink-0">
                    Lihat & Lamar
                </a>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-muted small fst-italic">Belum ada lowongan aktif yang dibuka oleh perusahaan ini.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
