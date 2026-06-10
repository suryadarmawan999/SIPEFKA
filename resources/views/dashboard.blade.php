@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
@if(auth()->user()->role === 'Admin')
<div class="row g-2 mb-2">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: linear-gradient(135deg, #B6252A, #ED1E28); color: white;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="stats-value">{{ \App\Models\Complaint::count() }}</div>
                    <div class="stats-label">Total Pengaduan</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #FFC107; color: white;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div class="stats-value">{{ \App\Models\Complaint::where('status', 'Pending')->count() }}</div>
                    <div class="stats-label">Pending</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #17A2B8; color: white;">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="stats-value">{{ \App\Models\Complaint::where('status', 'In Progress')->count() }}</div>
                    <div class="stats-label">In Progress</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #28A745; color: white;">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stats-value">{{ \App\Models\Complaint::where('status', 'Completed')->count() }}</div>
                    <div class="stats-label">Completed</div>
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-2 mb-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0" style="font-size: 0.875rem;">
                        <i class="bi bi-clock-history me-1"></i>Pengaduan Terbaru
                    </h6>
                </div>
                <div class="card-body">
                    @php
                        $recentComplaints =
                            auth()->user()->role === 'Admin'
                                ? \App\Models\Complaint::with(['user', 'facility'])
                                    ->latest()
                                    ->take(5)
                                    ->get()
                                : \App\Models\Complaint::where('user_id', auth()->id())
                                    ->with(['user', 'facility'])
                                    ->latest()
                                    ->take(5)
                                    ->get();
                    @endphp

                    @if ($recentComplaints->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Fasilitas</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentComplaints as $complaint)
                                        <tr>
                                            <td><strong>#{{ $complaint->id }}</strong></td>
                                            <td>{{ Str::limit($complaint->title, 50) }}</td>
                                            <td>{{ $complaint->facility->facility_name }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $complaint->status == 'Completed' ? 'success' : ($complaint->status == 'Pending' ? 'warning' : 'info') }}">
                                                    {{ $complaint->status }}
                                                </span>
                                            </td>
                                            <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('complaints.show', $complaint) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i>Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>Belum ada pengaduan.</p>
                        </div>
                    @endif

                <div class="action-buttons mt-2">
                    <a href="{{ route('complaints.index') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-list-ul me-1"></i>Lihat Semua Pengaduan
                    </a>
                    <a href="{{ route('complaints.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Buat Pengaduan Baru
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
