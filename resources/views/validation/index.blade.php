@extends('layouts.app')

@section('title', 'Validasi Pengaduan')
@section('page-title', 'Validasi Pengaduan')

@section('content')

<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('validation.index') }}" class="mb-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Dari">
                </div>
                <div class="col-md-4">
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Sampai">
                </div>
                <div class="col-md-4">
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
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('validation.show', $complaint) }}" class="btn btn-sm btn-primary">Validasi</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pengaduan yang perlu divalidasi.</td>
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

