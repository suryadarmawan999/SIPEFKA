@extends('layouts.app')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen User')

@section('content')
<div class="action-buttons justify-content-end mb-2">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
        <a href="{{ route('users.export-pdf') }}" class="btn btn-danger btn-sm">
            <i class="bi bi-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('users.export-excel') }}" class="btn btn-success btn-sm">
            <i class="bi bi-file-excel"></i> Export Excel
        </a>
    </div>

<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('users.index') }}" class="mb-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari user..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="role" class="form-select">
                        <option value="">Semua Role</option>
                        <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Dosen" {{ request('role') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="Mahasiswa" {{ request('role') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>NIM/NIP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->nim_nip ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $user->status == 'Aktif' ? 'success' : 'danger' }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection

