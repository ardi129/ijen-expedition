<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\TourPackage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    public function getStats(): array
    {
        return [
            Stat::make('Total Pemesanan', Booking::count())
                ->description('Pemesanan masuk')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->chart([7, 5, 8, 12, 9, 15, 11])
                ->color('primary'),

            Stat::make('Paket Wisata', TourPackage::count())
                ->description('Paket tersedia')
                ->descriptionIcon('heroicon-o-globe-alt')
                ->chart([3, 5, 4, 6, 7, 5, 8])
                ->color('accent'),

            Stat::make('Destinasi', Destination::count())
                ->description('Tempat wisata')
                ->descriptionIcon('heroicon-o-map')
                ->chart([2, 3, 4, 3, 5, 4, 6])
                ->color('primary'),

            Stat::make('Artikel', Article::count())
                ->description('Artikel publikasi')
                ->descriptionIcon('heroicon-o-newspaper')
                ->chart([4, 7, 5, 9, 6, 8, 10])
                ->color('accent'),
        ];
    }
}
