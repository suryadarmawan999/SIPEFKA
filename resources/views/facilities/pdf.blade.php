<!DOCTYPE html>
<html>

<head>
    <title>Daftar Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #C85A6A;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            color: #C85A6A;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .summary {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #F8F9FA;
            border-left: 3px solid #C85A6A;
        }

        .summary p {
            margin: 5px 0;
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
    </style>
</head>

<body>
    <div class="header">
        <h1>DAFTAR FASILITAS KAMPUS</h1>
        <h2>Telkom University</h2>
    </div>

    <div class="summary">
        <p><strong>Total Fasilitas:</strong> {{ $facilities->count() }}</p>
        <p><strong>Aktif:</strong> {{ $facilities->where('status', 'Aktif')->count() }} |
            <strong>Tidak Aktif:</strong> {{ $facilities->where('status', 'Tidak Aktif')->count() }}
        </p>
    </div>

    @if ($facilities->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Fasilitas</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facilities as $facility)
                    <tr>
                        <td>#{{ $facility->id }}</td>
                        <td>{{ $facility->facility_name }}</td>
                        <td>{{ $facility->category->category_name ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($facility->location, 40) }}</td>
                        <td>{{ $facility->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; padding: 20px; color: #666;">Tidak ada data fasilitas.</p>
    @endif

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
