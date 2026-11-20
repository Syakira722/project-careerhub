@extends('layout')
@section('content')
<h3>Tambah Kategori</h3>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
