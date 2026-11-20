@extends('layout')
@section('content')
<h3>Edit Lowongan</h3>
<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Perusahaan</label>
        <select name="company_id" class="form-control" required>
            @foreach($companies as $c)
                <option value="{{ $c->id }}" {{ $job->company_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $job->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Posisi / Judul</label><input type="text" name="title" value="{{ $job->title }}" class="form-control" required></div>
    <div class="mb-3"><label>Deskripsi</label><textarea name="description" class="form-control" required>{{ $job->description }}</textarea></div>
    <div class="mb-3"><label>Gaji</label><input type="text" name="salary" value="{{ $job->salary }}" class="form-control"></div>
    <div class="mb-3"><label>Batas Lamar</label><input type="date" name="deadline" value="{{ $job->deadline }}" class="form-control" required></div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
