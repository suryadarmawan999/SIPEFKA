@extends('layouts.app')

@section('title', 'Detail User')
@section('page-title', 'Detail User')

@section('content')
<div class="action-buttons justify-content-end mb-4">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
</div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi User</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ $user->role }}</p>
                    <p><strong>NIM/NIP:</strong> {{ $user->nim_nip ?? '-' }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge bg-{{ $user->status == 'Aktif' ? 'success' : 'danger' }}">
                            {{ $user->status }}
                        </span>
                    </p>
                    <p><strong>Tanggal Dibuat:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Statistik</h5>
                </div>
                <div class="card-body">
                    <p><strong>Total Pengaduan:</strong> {{ $user->complaints->count() }}</p>
                    <p><strong>Pengaduan Pending:</strong> {{ $user->complaints->where('status', 'Pending')->count() }}</p>
                    <p><strong>Pengaduan Completed:</strong> {{ $user->complaints->where('status', 'Completed')->count() }}
                    </p>
                    @if ($user->role == 'Admin' || $user->role == 'Dosen')
                        <p><strong>Total Tindak Lanjut:</strong> {{ $user->tindakLanjut->count() }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
