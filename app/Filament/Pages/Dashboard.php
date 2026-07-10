<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function getHeaderActions(): array
    {
        return [
            Action::make('recap')
                ->label('Download Rekap Keuangan (PDF)')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->form([
                    DatePicker::make('start_date')
                        ->label('Dari Tanggal')
                        ->default(now()->startOfMonth()->format('Y-m-d'))
                        ->required(),
                    DatePicker::make('end_date')
                        ->label('Sampai Tanggal')
                        ->default(now()->format('Y-m-d'))
                        ->required()
                        ->afterOrEqual('start_date'),
                    Select::make('payment_status')
                        ->label('Status Pembayaran')
                        ->options([
                            'all' => 'Semua Status',
                            'paid' => 'Lunas',
                            'partial' => 'DP',
                        ])
                        ->default('all')
                        ->native(false),
                ])
                ->action(function (array $data) {
                    $query = http_build_query([
                        'start_date' => $data['start_date'],
                        'end_date' => $data['end_date'],
                        'payment_status' => $data['payment_status'],
                    ]);

                    return redirect()->to(route('admin.recap.pdf', $query));
                }),
        ];
    }
}
