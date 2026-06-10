@extends('layouts.app')

@section('title', 'Data Fasilitas')
@section('page-title', 'Data Fasilitas')

@section('content')
<div class="action-buttons justify-content-end">
        <a href="{{ route('facilities.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Fasilitas
        </a>
        <a href="{{ route('facilities.export-pdf') }}" class="btn btn-danger btn-sm">
            <i class="bi bi-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('facilities.export-excel') }}" class="btn btn-success btn-sm">
            <i class="bi bi-file-excel"></i> Export Excel
        </a>
    </div>

<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('facilities.index') }}" class="mb-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari fasilitas..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Fasilitas</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($facilities as $facility)
                    <tr>
                        <td>{{ $facility->id }}</td>
                        <td>{{ $facility->facility_name }}</td>
                        <td>{{ $facility->category->category_name ?? '-' }}</td>
                        <td>{{ $facility->location }}</td>
                        <td>
                            <span class="badge bg-{{ $facility->status == 'Aktif' ? 'success' : 'danger' }}">
                                {{ $facility->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('facilities.show', $facility) }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('facilities.destroy', $facility) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data fasilitas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $facilities->links() }}
        </div>
    </div>
</div>
@endsection

