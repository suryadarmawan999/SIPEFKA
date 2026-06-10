@extends('layouts.app')

@section('title', 'Monitoring Pengaduan')
@section('page-title', 'Monitoring Pengaduan')

@section('content')
<div class="action-buttons justify-content-end">
    <a href="{{ route('monitoring.export-pdf') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-file-pdf"></i> Export PDF
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('monitoring.index') }}" class="mb-2">
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
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Dari">
                </div>
                <div class="col-md-3">
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Sampai">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Pelapor</th>
                        <th>Fasilitas</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->id }}</td>
                        <td>{{ $complaint->title }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td>{{ $complaint->facility->facility_name }}</td>
                        <td>
                            <span class="badge bg-{{ $complaint->status == 'Completed' ? 'success' : ($complaint->status == 'Pending' ? 'warning' : ($complaint->status == 'Rejected' ? 'danger' : 'info')) }}">
                                {{ $complaint->status }}
                            </span>
                        </td>
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('monitoring.show', $complaint) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pengaduan.</td>
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

