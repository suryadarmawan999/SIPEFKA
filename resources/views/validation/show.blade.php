@extends('layouts.app')

@section('title', 'Validasi Pengaduan')
@section('page-title', 'Validasi Pengaduan #' . $complaint->id)

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{ $complaint->title }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Fasilitas:</strong> {{ $complaint->facility->facility_name }}</p>
                <p><strong>Lokasi:</strong> {{ $complaint->location }}</p>
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $complaint->description }}</p>
                @if($complaint->photo)
                <div class="mt-3">
                    <strong>Foto:</strong><br>
                    <img src="{{ asset('storage/' . $complaint->photo) }}" alt="Foto Kerusakan" class="img-thumbnail" style="max-width: 500px;">
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Validasi Pengaduan</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('validation.validate', $complaint) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="In Progress">Terima (In Progress)</option>
                            <option value="Rejected">Tolak (Rejected)</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Catatan Admin</label>
                        <textarea class="form-control @error('admin_notes') is-invalid @enderror" id="admin_notes" name="admin_notes" rows="3">{{ old('admin_notes') }}</textarea>
                        @error('admin_notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="action-buttons mt-4">
                        <button type="submit" class="btn btn-primary">Validasi</button>
                        <a href="{{ route('validation.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

