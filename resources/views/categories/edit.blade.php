@extends('layout')
@section('content')
<h3>Edit Kategori</h3>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
