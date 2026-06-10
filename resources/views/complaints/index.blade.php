@extends('layouts.app')

@section('title', 'Daftar Pengaduan')
@section('page-title', 'Daftar Pengaduan')

@section('content')
<div class="action-buttons justify-content-end">
    <a href="{{ route('complaints.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle"></i> Buat Pengaduan Baru
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="mb-0" style="font-size: 0.875rem;">
            <i class="bi bi-funnel me-1"></i>Filter Pengaduan
        </h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('complaints.index') }}" class="mb-2">
            <div class="row g-2">
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="facility_id" class="form-select">
                        <option value="">Semua Fasilitas</option>
                        @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}" {{ request('facility_id') == $facility->id ? 'selected' : '' }}>
                            {{ $facility->facility_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Dari">
                </div>
                <div class="col-md-2">
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Sampai">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <h6 class="mb-0" style="font-size: 0.875rem;">
            <i class="bi bi-list-ul me-1"></i>Daftar Pengaduan
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Fasilitas</th>
                        <th>Pelapor</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td><strong>#{{ $complaint->id }}</strong></td>
                        <td>{{ Str::limit($complaint->title, 50) }}</td>
                        <td>{{ $complaint->facility->facility_name }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td>
                            <span class="badge bg-{{ $complaint->status == 'Completed' ? 'success' : ($complaint->status == 'Pending' ? 'warning' : ($complaint->status == 'Rejected' ? 'danger' : 'info')) }}">
                                {{ $complaint->status }}
                            </span>
                        </td>
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </a>
                                @if(auth()->user()->role === 'Admin')
                                <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <p>Tidak ada data pengaduan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $complaints->links() }}
        </div>
    </div>
</div>
@endsection

