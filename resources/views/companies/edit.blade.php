@extends('layout')
@section('content')
<h4 class="fw-bold mb-4">Edit Perusahaan</h4>

<form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3 mb-4">
        <div class="col-12">
            <label class="form-label fw-semibold small">Logo Perusahaan <span class="text-muted fw-normal">(Kosongkan jika tidak ingin mengganti)</span></label>
            <input type="file" name="logo" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Nama Perusahaan</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Kota, Alamat & Bidang Industri</label>
            <input type="text" name="city" value="{{ old('city', $company->city) }}" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Email Perusahaan</label>
            <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">No. Telepon / WhatsApp HRD</label>
            <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="form-control" placeholder="Contoh: 081234567890">
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold small">Tentang / Biodata Perusahaan</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Ceritakan profil singkat, bidang usaha, dan budaya kerja perusahaan...">{{ old('description', $company->description) }}</textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
