@extends('layout')
@section('content')
<h3 class="mb-4">Tambah Lowongan</h3>
<form action="{{ route('jobs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Perusahaan</label>
        <select name="company_id" class="form-select" required>
            <option value="" disabled selected>-- Pilih Perusahaan --</option>
            @foreach($companies as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select" required>
            <option value="" disabled selected>-- Pilih Kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Posisi / Judul</label>
        <input type="text" name="title" class="form-control" placeholder="Contoh: Fashion Designer" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Tuliskan deskripsi pekerjaan..." required></textarea>
    </div>
    <div class="mb-3">
        <label>Gaji (Opsional)</label>
        <input type="text" name="salary" class="form-control" placeholder="Contoh: Rp 4.500.000">
    </div>
    <div class="mb-3">
        <label>Batas Lamar</label>
        <input type="date" name="deadline" class="form-control" required>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
