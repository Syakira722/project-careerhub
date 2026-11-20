@extends('layout')
@section('content')
<div class="mb-3">
    <a href="{{ route('jobs.index') }}" class="btn btn-light btn-sm border">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Lowongan
    </a>
</div>

@if(session('success'))
<div class="alert alert-success rounded-3 border-0 shadow-sm mb-4">
    <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
</div>
@endif

<div class="row g-4">
    <!-- Kartu Kiri: Detail & Deskripsi Lowongan -->
    <div class="col-lg-8">
        <div class="p-4 rounded-4 border bg-white h-100">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3 pb-3 border-bottom">
                <div>
                    <span class="badge rounded-pill px-3 py-1 mb-2" style="background:#eef2ff; color:#4f46e5;">
                        {{ $job->category->name }}
                    </span>
                    <h3 class="fw-bold mb-1 text-dark">{{ $job->title }}</h3>
                    <div class="text-muted small">
                        <i class="bi bi-building me-1"></i> {{ $job->company->name }} &bull;
                        <i class="bi bi-geo-alt-fill text-danger ms-1"></i> {{ $job->company->city }}
                    </div>
                </div>
                <div class="text-lg-end">
                    <small class="text-muted d-block">Estimasi Gaji</small>
                    <div class="fw-bold text-success fs-5">{{ $job->salary ?? 'Gaji Kompetitif' }}</div>
                </div>
            </div>

            <h6 class="fw-bold text-dark mb-2">Deskripsi & Kualifikasi Pekerjaan</h6>
            <p class="text-secondary mb-4" style="line-height: 1.7; white-space: pre-line;">{{ $job->description }}</p>

            <div class="p-3 rounded-3 bg-light border d-flex align-items-center gap-2 text-muted small">
                <i class="bi bi-calendar-event text-primary fs-5"></i>
                <span>Batas akhir pengiriman lamaran: <strong class="text-dark">{{ $job->deadline }}</strong></span>
            </div>
        </div>
    </div>

    <!-- Kartu Kanan: Profil Perusahaan & Tombol Lamar -->
    <div class="col-lg-4">
        <div class="p-4 rounded-4 border bg-white h-100 d-flex flex-column justify-content-between">
            <div>
                <h6 class="fw-bold mb-3"><i class="bi bi-buildings text-primary me-1"></i> Profil Perusahaan</h6>

                <div class="d-flex align-items-center gap-3 mb-3">
                    @if(!empty($job->company->logo))
                        <img src="{{ asset($job->company->logo) }}" alt="{{ $job->company->name }}" class="rounded-3 object-fit-cover border" style="width: 52px; height: 52px;">
                    @else
                        <div class="company-avatar" style="width: 52px; height: 52px; font-size: 1.1rem;">
                            {{ strtoupper(substr($job->company->name, 0, 2)) }}
                        </div>
                    @endif
                    <div>
                        <div class="fw-bold text-dark">{{ $job->company->name }}</div>
                        <small class="text-muted">Mitra Resmi CareerHub</small>
                    </div>
                </div>

                @if(!empty($job->company->description))
                <p class="small text-secondary mb-3 pb-3 border-bottom" style="line-height: 1.6;">
                    {{ $job->company->description }}
                </p>
                @endif

                <div class="small mb-2">
                    <div class="fw-semibold text-dark"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Lokasi & Kontak:</div>
                    <div class="text-muted">{{ $job->company->city }}</div>
                </div>

                <div class="small mb-2">
                    <div class="fw-semibold text-dark"><i class="bi bi-envelope-fill text-primary me-1"></i> Email HRD:</div>
                    <div class="text-muted">{{ $job->company->email }}</div>
                </div>

                @if(!empty($job->company->phone))
                <div class="small mb-3">
                    <div class="fw-semibold text-dark"><i class="bi bi-whatsapp text-success me-1"></i> No. Telepon / WA:</div>
                    <div class="text-muted">{{ $job->company->phone }}</div>
                </div>
                @endif
            </div>

            <div class="pt-3 border-top d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">
                    <i class="bi bi-send-fill me-1"></i> Lamar Sekarang
                </button>
                <a href="{{ route('companies.show', $job->company->id) }}" class="btn btn-light border text-dark">
                    <i class="bi bi-building me-1"></i> Lihat Profil Perusahaan
                </a>
                <a href="mailto:{{ $job->company->email }}?subject=Lamaran Pekerjaan: {{ $job->title }}" class="btn btn-outline-primary">
                    <i class="bi bi-envelope me-1"></i> Hubungi HRD via Email
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form Lamar Pekerjaan -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Lamar Posisi {{ $job->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="mailto:{{ $job->company->email }}?subject=Lamaran: {{ $job->title }}" method="POST" enctype="text/plain">
                <div class="modal-body">
                    <p class="small text-muted mb-3">Lengkapi pesan singkat sebelum mengirim lamaran ke <strong>{{ $job->company->name }}</strong>.</p>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Nama Pelamar</label>
                        <input type="text" name="Nama" class="form-control" value="{{ Auth::user()->name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Email Kontak</label>
                        <input type="email" name="Email" class="form-control" value="{{ Auth::user()->email ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Pesan / Ringkasan Diri</label>
                        <textarea name="Pesan" class="form-control" rows="3" placeholder="Tuliskan keahlian singkat dan alasan melamar posisi ini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
