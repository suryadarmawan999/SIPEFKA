@extends('layouts.app')

@section('title', 'Laporan & Rekap')
@section('page-title', 'Laporan & Rekap Pengaduan')

@section('content')
<div class="action-buttons justify-content-end mb-2">
        <a href="{{ route('reports.export-pdf') }}" class="btn btn-danger btn-sm">
            <i class="bi bi-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('reports.export-excel') }}" class="btn btn-success btn-sm">
            <i class="bi bi-file-excel"></i> Export Excel
        </a>
    </div>

<div class="card mb-2">
    <div class="card-body">
        <form method="GET" action="{{ route('reports.index') }}" class="mb-2">
            <div class="row g-2">
                <div class="col-md-3">
                    <label for="start_date" class="form-label small">Tanggal Awal</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Dari">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label small">Tanggal Akhir</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Sampai">
                </div>
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
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0" style="font-size: 0.8125rem;">Pengaduan per Kategori</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($byCategory as $category => $count)
                        <tr>
                            <td>{{ $category }}</td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0" style="font-size: 0.8125rem;">Pengaduan per Status</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($byStatus as $status => $count)
                        <tr>
                            <td>{{ $status }}</td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

