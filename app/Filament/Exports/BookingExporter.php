<?php

namespace App\Filament\Exports;

use App\Models\Booking;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class BookingExporter extends Exporter
{
    protected static ?string $model = Booking::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('tourPackage.title')
                ->label('Paket Wisata'),
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('email'),
            ExportColumn::make('phone')
                ->label('Telepon'),
            ExportColumn::make('travel_date')
                ->label('Tanggal Perjalanan'),
            ExportColumn::make('number_of_people')
                ->label('Jumlah Orang'),
            ExportColumn::make('total_price')
                ->label('Total Harga')
                ->formatStateUsing(fn ($state): string => $state ? 'Rp '.number_format($state, 0, ',', '.') : '-'),
            ExportColumn::make('payment_status')
                ->label('Status Pembayaran')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'unpaid' => 'Belum Bayar',
                    'partial' => 'DP',
                    'paid' => 'Lunas',
                    default => $state,
                }),
            ExportColumn::make('payment_proof')
                ->label('Bukti Pembayaran'),
            ExportColumn::make('status')
                ->label('Status Pemesanan')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'pending' => 'Menunggu',
                    'confirmed' => 'Dikonfirmasi',
                    'cancelled' => 'Dibatalkan',
                    'completed' => 'Selesai',
                    default => $state,
                }),
            ExportColumn::make('payment_note')
                ->label('Catatan Pembayaran'),
            ExportColumn::make('special_requests')
                ->label('Permintaan Khusus'),
            ExportColumn::make('created_at')
                ->label('Dibuat'),
            ExportColumn::make('updated_at')
                ->label('Diperbarui'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your booking export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
