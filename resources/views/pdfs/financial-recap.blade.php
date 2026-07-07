<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Keuangan IJEN Expedition</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #333;
            margin: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #1a3a5c;
            padding-bottom: 15px;
        }
        .header h1 {
            font-size: 18px;
            color: #1a3a5c;
            margin: 5px 0;
        }
        .header p {
            font-size: 11px;
            color: #666;
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #1a3a5c;
            color: white;
            padding: 8px 6px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
        }
        td {
            padding: 6px;
            border-bottom: 1px solid #ddd;
            font-size: 10px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
        }
        .badge-paid {
            background-color: #d4edda;
            color: #155724;
        }
        .badge-partial {
            background-color: #fff3cd;
            color: #856404;
        }
        .footer {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: right;
            font-size: 12px;
        }
        .footer strong {
            font-size: 14px;
            color: #1a3a5c;
        }
        .generated-at {
            text-align: center;
            color: #999;
            font-size: 9px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>IJEN Expedition</h1>
        <h2 style="font-size: 14px; color: #e87a2f; margin: 2px 0;">Rekap Keuangan</h2>
        <p>Per {{ $generatedAt }} &mdash; Periode {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} s.d {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 22%;">Nama</th>
                <th style="width: 26%;">Paket Wisata</th>
                <th style="width: 14%;">Tanggal</th>
                <th style="width: 18%;" class="text-right">Total Harga</th>
                <th style="width: 16%;" class="text-center">Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->tourPackage?->title }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->travel_date)->format('d/m/Y') }}</td>
                <td class="text-right">{{ $booking->total_price ? 'Rp ' . number_format($booking->total_price, 0, ',', '.') : '-' }}</td>
                <td class="text-center">
                    @if($booking->payment_status === 'paid')
                        <span class="badge badge-paid">Lunas</span>
                    @elseif($booking->payment_status === 'partial')
                        <span class="badge badge-partial">DP</span>
                    @else
                        {{ ucfirst($booking->payment_status) }}
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center" style="padding: 20px; color: #999;">Belum ada data pemesanan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Total Pemasukan: <strong>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</strong></p>
    </div>

    <div class="generated-at">
        Dicetak pada {{ $generatedAt }}
    </div>
</body>
</html>
