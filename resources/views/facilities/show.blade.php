@extends('layouts.app')

@section('title', 'Detail Fasilitas')
@section('page-title', 'Detail Fasilitas')

@section('content')
<div class="action-buttons justify-content-end mb-4">
    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-warning">Edit</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $facility->facility_name }}</h5>
        <p><strong>Kategori:</strong> {{ $facility->category->category_name ?? '-' }}</p>
        <p><strong>Lokasi:</strong> {{ $facility->location }}</p>
        <p><strong>Status:</strong> 
            <span class="badge bg-{{ $facility->status == 'Aktif' ? 'success' : 'danger' }}">
                {{ $facility->status }}
            </span>
        </p>
        @if($facility->description)
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $facility->description }}</p>
        @endif
        <p><strong>Tanggal Dibuat:</strong> {{ $facility->created_at->format('d/m/Y H:i') }}</p>
    </div>
</div>
@endsection

