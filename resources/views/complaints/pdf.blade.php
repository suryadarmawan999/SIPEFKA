<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan #{{ $complaint->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .info { margin-bottom: 15px; }
        .label { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table td { padding: 8px; border: 1px solid #ddd; }
        .footer { margin-top: 30px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Pengaduan Fasilitas Kampus</h1>
        <h2>ID Pengaduan: #{{ $complaint->id }}</h2>
    </div>

    <div class="info">
        <p><span class="label">Judul:</span> {{ $complaint->title }}</p>
        <p><span class="label">Pelapor:</span> {{ $complaint->user->name }} ({{ $complaint->user->email }})</p>
        <p><span class="label">Fasilitas:</span> {{ $complaint->facility->facility_name }}</p>
        <p><span class="label">Kategori:</span> {{ $complaint->facility->category->category_name ?? '-' }}</p>
        <p><span class="label">Lokasi:</span> {{ $complaint->location }}</p>
        <p><span class="label">Status:</span> {{ $complaint->status }}</p>
        <p><span class="label">Tanggal Lapor:</span> {{ $complaint->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div>
        <p class="label">Deskripsi:</p>
        <p>{{ $complaint->description }}</p>
    </div>

    @if($complaint->admin_notes)
    <div>
        <p class="label">Catatan Admin:</p>
        <p>{{ $complaint->admin_notes }}</p>
    </div>
    @endif

    @if($complaint->tindakLanjut->count() > 0)
    <div>
        <p class="label">Riwayat Penanganan:</p>
        <table>
            <tr>
                <th>Petugas</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            @foreach($complaint->tindakLanjut as $tl)
            <tr>
                <td>{{ $tl->petugas->name }}</td>
                <td>{{ $tl->catatan_penanganan }}</td>
                <td>{{ $tl->status_akhir }}</td>
                <td>{{ $tl->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>

