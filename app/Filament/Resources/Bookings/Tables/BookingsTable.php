<?php

namespace App\Filament\Resources\Bookings\Tables;

use App\Models\Booking;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->description(fn (Booking $record): string => $record->tourPackage?->title),
                TextColumn::make('travel_date')
                    ->date('d M Y')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('number_of_people')
                    ->label('Orang')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                SelectColumn::make('payment_status')
                    ->label('Pembayaran')
                    ->options([
                        'unpaid' => 'Belum Bayar',
                        'partial' => 'DP',
                        'paid' => 'Lunas',
                    ]),
                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                        'completed' => 'Selesai',
                    ])
                    ->selectablePlaceholder(false),
                TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->formatStateUsing(fn ($state): string => $state ? 'Rp '.number_format($state, 0, ',', '.') : '-')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('payment_proof')
                    ->label('Bukti')
                    ->icon('heroicon-o-eye')
                    ->iconColor('primary')
                    ->url(fn (Booking $record): ?string => $record->payment_proof ? Storage::url($record->payment_proof) : null, shouldOpenInNewTab: true)
                    ->visibleFrom('lg')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'unpaid' => 'Belum Bayar',
                        'partial' => 'DP',
                        'paid' => 'Lunas',
                    ]),
                SelectFilter::make('status')
                    ->label('Status Pemesanan')
                    ->options([
                        'pending' => 'Menunggu',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                        'completed' => 'Selesai',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
