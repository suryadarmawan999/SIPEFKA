@extends('layouts.app')

@section('title', 'Edit Status Pengaduan')
@section('page-title', 'Edit Status Pengaduan #' . $complaint->id)

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('complaints.update', $complaint) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="Pending" {{ old('status', $complaint->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ old('status', $complaint->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status', $complaint->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Rejected" {{ old('status', $complaint->status) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="admin_notes" class="form-label">Catatan Admin</label>
                <textarea class="form-control @error('admin_notes') is-invalid @enderror" id="admin_notes" name="admin_notes" rows="5">{{ old('admin_notes', $complaint->admin_notes) }}</textarea>
                @error('admin_notes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="action-buttons mt-4">
                <button type="submit" class="btn btn-primary">Update Status</button>
                <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

