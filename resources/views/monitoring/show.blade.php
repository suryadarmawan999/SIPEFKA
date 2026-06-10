@extends('layouts.app')

@section('title', 'Detail Monitoring')
@section('page-title', 'Detail Monitoring Pengaduan #' . $complaint->id)

@section('content')
<div class="action-buttons justify-content-end mb-4">
    <a href="{{ route('monitoring.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('tindak-lanjut.create', ['complaint_id' => $complaint->id]) }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Tindak Lanjut
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $complaint->title }}</h5>
                <span class="badge bg-{{ $complaint->status == 'Completed' ? 'success' : ($complaint->status == 'Pending' ? 'warning' : ($complaint->status == 'Rejected' ? 'danger' : 'info')) }}">
                    {{ $complaint->status }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>Fasilitas:</strong> {{ $complaint->facility->facility_name }}</p>
                <p><strong>Lokasi:</strong> {{ $complaint->location }}</p>
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $complaint->description }}</p>
            </div>
        </div>

        @if($complaint->tindakLanjut->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Riwayat Penanganan</h5>
            </div>
            <div class="card-body">
                @foreach($complaint->tindakLanjut as $tl)
                <div class="border-start border-3 ps-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p><strong>Petugas:</strong> {{ $tl->petugas->name }}</p>
                            <p><strong>Catatan:</strong> {{ $tl->catatan_penanganan }}</p>
                            <p><strong>Status:</strong> <span class="badge bg-info">{{ $tl->status_akhir }}</span></p>
                        </div>
                        <div>
                            <a href="{{ route('tindak-lanjut.edit', $tl) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tindak-lanjut.destroy', $tl) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <small class="text-muted">{{ $tl->created_at->format('d/m/Y H:i') }}</small>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pelapor</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $complaint->user->name }}</p>
                <p><strong>Email:</strong> {{ $complaint->user->email }}</p>
                <p><strong>Role:</strong> {{ $complaint->user->role }}</p>
                <p><strong>Tanggal Lapor:</strong> {{ $complaint->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

