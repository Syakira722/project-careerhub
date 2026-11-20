@extends('layout')
@section('content')
<h4 class="fw-bold mb-4">Tambah Perusahaan Baru</h4>

<form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3 mb-4">
        <div class="col-12">
            <label class="form-label fw-semibold small">Logo Perusahaan <span class="text-muted fw-normal">(JPG/PNG, Maks. 2MB)</span></label>
            <input type="file" name="logo" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Nama Perusahaan</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: PT Digital Kreatif" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Kota / Lokasi</label>
            <input type="text" name="city" class="form-control" placeholder="Contoh: Bandung" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Email Perusahaan</label>
            <input type="email" name="email" class="form-control" placeholder="hrd@perusahaan.com" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">No. Telepon / WhatsApp HRD</label>
            <input type="text" name="phone" class="form-control" placeholder="Contoh: 081234567890">
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold small">Tentang / Biodata Perusahaan</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Ceritakan profil singkat, bidang usaha, dan budaya kerja perusahaan..."></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
