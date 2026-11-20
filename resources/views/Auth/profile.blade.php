@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <!-- Header Profil dengan Foto atau Inisial -->
        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
            @if($user->avatar)
                <img src="{{ asset($user->avatar) }}" alt="Foto Profil" class="rounded-circle object-fit-cover flex-shrink-0 border border-2 border-primary" style="width: 72px; height: 72px;">
            @else
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold fs-3 flex-shrink-0"
                     style="width: 72px; height: 72px; background: linear-gradient(135deg, #4f46e5, #8b5cf6);">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
            <div>
                <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="badge rounded-pill px-3 py-1 text-uppercase" style="background:#eef2ff; color:#4f46e5;">
                        <i class="bi bi-shield-check me-1"></i>Role: {{ $user->role }}
                    </span>
                    @if($user->city)
                        <span class="text-muted small"><i class="bi bi-geo-alt-fill text-danger"></i> {{ $user->city }}</span>
                    @endif
                    @if($user->phone)
                        <span class="text-muted small">&bull; <i class="bi bi-whatsapp text-success"></i> {{ $user->phone }}</span>
                    @endif
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success rounded-3 py-2 small">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger rounded-3 py-2 small">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h6 class="fw-bold text-primary mb-3"><i class="bi bi-person-vcard me-1"></i> Informasi Akun & Biodata</h6>
            <div class="row g-3 mb-3">
                <div class="col-12">
                    <label class="form-label fw-semibold small">Upload Foto Profil <span class="text-muted fw-normal">(JPG/PNG, Maks. 2MB)</span></label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" placeholder="Contoh: 081234567890">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Domisili / Kota</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-control" placeholder="Contoh: Bandung">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold small">Keahlian / Skill Utama</label>
                    <input type="text" name="skills" value="{{ old('skills', $user->skills) }}" class="form-control" placeholder="Contoh: Fashion Design, Adobe Illustrator, UI/UX">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold small">Tentang Saya (Bio Singkat)</label>
                    <textarea name="bio" class="form-control" rows="3" placeholder="Ceritakan singkat pengalaman atau minat kariermu...">{{ old('bio', $user->bio) }}</textarea>
                </div>
            </div>

            <hr class="my-4">
            <h6 class="fw-bold mb-3">Ganti Password <span class="text-muted fw-normal small">(Kosongkan jika tidak ingin mengganti)</span></h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Profil
            </button>
        </form>
    </div>
</div>
@endsection
