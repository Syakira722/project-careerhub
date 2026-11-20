@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Users</h3>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah User</a>
</div>
<table class="table table-bordered">
    <tr><th>No</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr>
    @foreach($users as $u)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->role }}</td>
        <td>
            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
