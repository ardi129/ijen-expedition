<?php

namespace App\Filament\Resources\TourPackages\Tables;

use App\Models\TourPackage;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TourPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->size(48),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->description(fn (TourPackage $record): string => $record->slug)
                    ->weight('semibold'),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary'),
                TextColumn::make('duration_days')
                    ->label('Durasi')
                    ->formatStateUsing(fn ($state, $record): string => $record->duration_days.' Hari '.$record->duration_nights.' Malam')
                    ->badge()
                    ->color('accent'),
                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', locale: 'id')
                    ->weight('bold'),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('sort_order')
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
