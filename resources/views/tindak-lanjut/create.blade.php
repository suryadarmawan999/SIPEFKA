@extends('layouts.app')

@section('title', 'Tambah Tindak Lanjut')
@section('page-title', 'Tambah Tindak Lanjut')

@section('content')

@if($complaint)
<div class="alert alert-info border-0 shadow-sm" style="background-color: #e3f2fd;">
    <i class="fas fa-info-circle me-2"></i>
    <strong>Pengaduan:</strong> {{ $complaint->title }} <span class="badge bg-primary ms-2">ID: {{ $complaint->id }}</span>
</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('tindak-lanjut.store') }}">
            @csrf
            
            @if($complaint)
                <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
            @else
                <div class="mb-4">
                    <label for="complaint_id" class="form-label fw-bold">Pengaduan <span class="text-danger">*</span></label>
                    <select class="form-select @error('complaint_id') is-invalid @enderror" id="complaint_id" name="complaint_id" required>
                        <option value="">-- Pilih Pengaduan --</option>
                        @foreach($allComplaints ?? [] as $c)
                            <option value="{{ $c->id }}" {{ old('complaint_id') == $c->id ? 'selected' : '' }}>
                                #{{ $c->id }} - {{ $c->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('complaint_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endif

            <div class="mb-4">
                <label for="petugas_id" class="form-label fw-bold">Petugas Penanggung Jawab <span class="text-danger">*</span></label>
                <select class="form-select @error('petugas_id') is-invalid @enderror" id="petugas_id" name="petugas_id" required>
                    <option value="">-- Pilih Petugas --</option>
                    @foreach($petugas as $p)
                        <option value="{{ $p->id }}" {{ old('petugas_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->name }} ({{ $p->role }})
                        </option>
                    @endforeach
                </select>
                <div class="form-text text-muted">Daftar petugas mencakup Admin, Dosen, Staff, dan Teknisi.</div>
                @error('petugas_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="catatan_penanganan" class="form-label fw-bold">Catatan Penanganan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('catatan_penanganan') is-invalid @enderror" 
                          id="catatan_penanganan" name="catatan_penanganan" rows="5" 
                          placeholder="Jelaskan tindakan yang telah dilakukan..." required>{{ old('catatan_penanganan') }}</textarea>
                @error('catatan_penanganan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status_akhir" class="form-label fw-bold">Status Akhir <span class="text-danger">*</span></label>
                <select class="form-select @error('status_akhir') is-invalid @enderror" id="status_akhir" name="status_akhir" required>
                    <option value="Pending" {{ old('status_akhir') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ old('status_akhir') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status_akhir') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Rejected" {{ old('status_akhir') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status_akhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger px-4">Simpan</button>
                @if($complaint)
                    <a href="{{ route('monitoring.show', $complaint->id) }}" class="btn btn-secondary px-4">Batal</a>
                @else
                    <a href="{{ route('tindak-lanjut.index') }}" class="btn btn-secondary px-4">Batal</a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection