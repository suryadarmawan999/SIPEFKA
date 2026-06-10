@extends('layouts.app')

@section('title', 'Buat Pengaduan Baru')
@section('page-title', 'Buat Pengaduan Baru')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="bi bi-plus-circle me-2"></i>Form Pengaduan Baru
        </h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Pengaduan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="facility_id" class="form-label">Fasilitas <span class="text-danger">*</span></label>
                <select class="form-select @error('facility_id') is-invalid @enderror" id="facility_id" name="facility_id" required>
                    <option value="">Pilih Fasilitas</option>
                    @foreach($facilities as $facility)
                    <option value="{{ $facility->id }}" {{ old('facility_id') == $facility->id ? 'selected' : '' }}>
                        {{ $facility->facility_name }} ({{ $facility->category->category_name ?? '-' }})
                    </option>
                    @endforeach
                </select>
                @error('facility_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="campus" class="form-label">Kampus <span class="text-danger">*</span></label>
                <select class="form-select @error('campus') is-invalid @enderror" id="campus" name="campus" required>
                    <option value="">-- Pilih Kampus --</option>
                    <option value="Telkom University Bandung" {{ old('campus') == 'Telkom University Bandung' ? 'selected' : '' }}>Telkom University Bandung</option>
                    <option value="Telkom University Jakarta" {{ old('campus') == 'Telkom University Jakarta' ? 'selected' : '' }}>Telkom University Jakarta</option>
                    <option value="Telkom University Surabaya" {{ old('campus') == 'Telkom University Surabaya' ? 'selected' : '' }}>Telkom University Surabaya</option>
                    <option value="Telkom University Purwokerto" {{ old('campus') == 'Telkom University Purwokerto' ? 'selected' : '' }}>Telkom University Purwokerto</option>
                </select>
                @error('campus')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Detail Lokasi <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="Contoh: Gedung Bangkit Lt. 3, Ruang 301" required>
                @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Kerusakan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto Kerusakan</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
            </div>

            <div class="action-buttons mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Submit Pengaduan
                </button>
                <a href="{{ route('complaints.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection