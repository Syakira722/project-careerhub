@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>
<table class="table table-bordered">
    <tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr>
    @foreach($categories as $c)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $c->name }}</td>
        <td>
            <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('categories.destroy', $c->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
