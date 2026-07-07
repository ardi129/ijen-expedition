<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pesanan Menunggu', Booking::where('status', 'pending')->count())
                ->description('Pemesanan belum dikonfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Pesanan Dikonfirmasi', Booking::where('status', 'confirmed')->count())
                ->description('Pemesanan siap jalan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info'),
            Stat::make('Pesanan Selesai', Booking::where('status', 'completed')->count())
                ->description('Pemesanan telah selesai')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('success'),
        ];
    }
}
