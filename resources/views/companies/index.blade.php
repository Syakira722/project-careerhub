@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
    <div>
        <h4 class="fw-bold mb-0">Daftar Perusahaan</h4>
        <small class="text-muted">Mitra perusahaan yang terdaftar di sistem</small>
    </div>
    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ route('companies.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah Perusahaan
    </a>
    @endif
</div>

<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>NO</th>
                <th>PERUSAHAAN</th>
                <th>KOTA</th>
                <th>EMAIL</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $index => $c)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        @if(!empty($c->logo))
                            <img src="{{ asset($c->logo) }}" alt="{{ $c->name }}" class="rounded-3 object-fit-cover border" style="width: 38px; height: 38px;">
                        @else
                            <div class="company-avatar" style="width: 38px; height: 38px; font-size: 0.85rem; border-radius: 10px;">
                                {{ strtoupper(substr($c->name, 0, 2)) }}
                            </div>
                        @endif
                        <div>
                            <div class="fw-semibold text-dark">{{ $c->name }}</div>
                            <span class="badge bg-light text-primary border" style="font-size: 0.7rem;">{{ $c->jobs_count ?? 0 }} Lowongan Aktif</span>
                        </div>
                    </div>
                </td>
                <td>{{ $c->city }}</td>
                <td>{{ $c->email }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('companies.show', $c->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-eye me-1"></i> Detail
                        </a>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                        <a href="{{ route('companies.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('companies.destroy', $c->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus perusahaan ini?')">Hapus</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">Belum ada data perusahaan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
