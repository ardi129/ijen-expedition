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
            padding-top: 15px;
            border-top: 2px solid #1a3a5c;
        }
        .footer-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        .footer-table td {
            padding: 5px 8px;
            border: none;
            font-size: 11px;
        }
        .footer-table .label {
            text-align: left;
            width: 70%;
        }
        .footer-table .value {
            text-align: right;
            font-weight: bold;
            width: 30%;
        }
        .footer-table .total-row td {
            border-top: 1px solid #ddd;
            font-size: 13px;
            color: #1a3a5c;
        }
        .footer-table .outstanding-row td {
            color: #dc2626;
            font-size: 12px;
        }
        .text-danger {
            color: #dc2626;
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
                <th style="width: 18%;">Nama</th>
                <th style="width: 20%;">Paket Wisata</th>
                <th style="width: 10%;">Tanggal</th>
                <th style="width: 5%;" class="text-center">Org</th>
                <th style="width: 15%;" class="text-right">Total Harga</th>
                <th style="width: 13%;" class="text-right">Dibayar</th>
                <th style="width: 13%;" class="text-right">Sisa</th>
                <th style="width: 10%;" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->tourPackage?->title }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->travel_date)->format('d/m/Y') }}</td>
                <td class="text-center">{{ $booking->number_of_people }}</td>
                <td class="text-right">{{ $booking->total_price ? 'Rp ' . number_format($booking->total_price, 0, ',', '.') : '-' }}</td>
                <td class="text-right">{{ $booking->paid_amount ? 'Rp ' . number_format($booking->paid_amount, 0, ',', '.') : '-' }}</td>
                <td class="text-right">
                    @if($booking->payment_status === 'partial' && $booking->remainingAmount() > 0)
                        <span class="text-danger">Rp {{ number_format($booking->remainingAmount(), 0, ',', '.') }}</span>
                    @else
                        -
                    @endif
                </td>
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
                <td colspan="9" class="text-center" style="padding: 20px; color: #999;">Belum ada data pemesanan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <table class="footer-table">
            <tr class="total-row">
                <td class="label">Total Harga Keseluruhan:</td>
                <td class="value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Total Sudah Dibayar:</td>
                <td class="value">Rp {{ number_format($totalPaid, 0, ',', '.') }}</td>
            </tr>
            @if($totalOutstanding > 0)
            <tr class="outstanding-row">
                <td class="label">Total Belum Lunas (Sisa DP):</td>
                <td class="value">Rp {{ number_format($totalOutstanding, 0, ',', '.') }}</td>
            </tr>
            @endif
        </table>
    </div>

    <div class="generated-at">
        Dicetak pada {{ $generatedAt }}
    </div>
</body>
</html>
