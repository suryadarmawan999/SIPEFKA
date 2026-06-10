@extends('layouts.app')

@section('title', 'Detail Pengaduan')
@section('page-title', 'Detail Pengaduan #' . $complaint->id)

@section('content')
<div class="action-buttons justify-content-end mb-4">
    <a href="{{ route('complaints.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
    <a href="{{ route('complaints.export-pdf', $complaint) }}" class="btn btn-danger">
        <i class="bi bi-file-pdf me-2"></i>Export PDF
    </a>
    @if(auth()->user()->role === 'Admin')
    <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-warning">
        <i class="bi bi-pencil me-2"></i>Edit
    </a>
    @endif
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-file-earmark-text me-2"></i>{{ $complaint->title }}
                </h5>
                <span class="badge bg-{{ $complaint->status == 'Completed' ? 'success' : ($complaint->status == 'Pending' ? 'warning' : ($complaint->status == 'Rejected' ? 'danger' : 'info')) }}">
                    {{ $complaint->status }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>Fasilitas:</strong> {{ $complaint->facility->facility_name }}</p>
                <p><strong>Kategori:</strong> {{ $complaint->facility->category->category_name ?? '-' }}</p>
                <p><strong>Lokasi:</strong> {{ $complaint->location }}</p>
                @if($complaint->province || $complaint->city || $complaint->district)
                <p><strong>Alamat Lengkap:</strong> 
                    {{ $complaint->district ? $complaint->district . ', ' : '' }}
                    {{ $complaint->city ? $complaint->city . ', ' : '' }}
                    {{ $complaint->province ?? '' }}
                </p>
                @endif
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $complaint->description }}</p>
                
                <div class="mt-4">
                    <strong>Foto Kerusakan:</strong><br>
                    @if($complaint->photo)
                    <img src="{{ asset('storage/' . $complaint->photo) }}" alt="Foto Kerusakan" class="img-fluid rounded mt-2" style="max-width: 100%; max-height: 500px; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    @else
                    <div class="mt-2 p-4 bg-light rounded text-center" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                        <div>
                            <i class="bi bi-image" style="font-size: 3rem; color: #959597;"></i>
                            <p class="text-muted mt-2 mb-0">Tidak ada foto</p>
                        </div>
                    </div>
                    @endif
                </div>

                @if($complaint->admin_notes)
                <div class="mt-3">
                    <strong>Catatan Admin:</strong>
                    <p class="text-muted">{{ $complaint->admin_notes }}</p>
                </div>
                @endif
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
                    <p><strong>Petugas:</strong> {{ $tl->petugas->name }}</p>
                    <p><strong>Catatan:</strong> {{ $tl->catatan_penanganan }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-info">{{ $tl->status_akhir }}</span></p>
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
                <p><strong>NIM/NIP:</strong> {{ $complaint->user->nim_nip ?? '-' }}</p>
                <p><strong>Tanggal Lapor:</strong> {{ $complaint->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

