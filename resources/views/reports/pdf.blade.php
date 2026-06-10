<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekap Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #B6252A;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            color: #B6252A;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .info {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11px;
        }

        table th {
            background-color: #F8F9FA;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 6px;
            border: 1px solid #ddd;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }

        .summary {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #F8F9FA;
            border-left: 3px solid #B6252A;
        }

        .summary p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAPORAN REKAP PENGADUAN FASILITAS KAMPUS</h1>
        <h2>Periode: {{ $startDate ? \Carbon\Carbon::parse($startDate)->format('d/m/Y') : 'Semua' }} -
            {{ $endDate ? \Carbon\Carbon::parse($endDate)->format('d/m/Y') : 'Semua' }}</h2>
    </div>

    <div class="summary">
        <p><strong>Total Pengaduan:</strong> {{ $complaints->count() }}</p>
        <p><strong>Pending:</strong> {{ $complaints->where('status', 'Pending')->count() }} |
            <strong>In Progress:</strong> {{ $complaints->where('status', 'In Progress')->count() }} |
            <strong>Completed:</strong> {{ $complaints->where('status', 'Completed')->count() }} |
            <strong>Rejected:</strong> {{ $complaints->where('status', 'Rejected')->count() }}
        </p>
    </div>

    @if ($complaints->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pelapor</th>
                    <th>Fasilitas</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Tanggal Lapor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $complaint)
                    <tr>
                        <td>#{{ $complaint->id }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($complaint->title, 40) }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td>{{ $complaint->facility->facility_name }}</td>
                        <td>{{ $complaint->facility->category->category_name ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($complaint->location, 30) }}</td>
                        <td>{{ $complaint->status }}</td>
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; padding: 20px; color: #666;">Tidak ada data pengaduan untuk periode yang dipilih.
        </p>
    @endif

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
