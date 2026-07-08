<?php

namespace App\Filament\Resources\HomeStats;

use App\Filament\Resources\HomeStats\Pages\ManageHomeStats;
use App\Models\HomeStat;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeStatResource extends Resource
{
    protected static ?string $model = HomeStat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBarSquare;

    protected static ?string $modelLabel = 'Statistik';

    protected static ?string $pluralModelLabel = 'Statistik';

    protected static ?string $navigationLabel = 'Statistik Home';

    protected static ?int $navigationSort = 5;

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Statistik')
                    ->columns(2)
                    ->schema([
                        TextInput::make('value')
                            ->label('Nilai')
                            ->helperText('Contoh: 5+, 5.000+, 100%')
                            ->required(),
                        TextInput::make('label')
                            ->label('Label')
                            ->helperText('Contoh: Tahun Pengalaman, Wisatawan Puas')
                            ->required(),
                        Select::make('color')
                            ->label('Warna')
                            ->options([
                                'primary' => 'Primary (Biru Tua)',
                                'accent' => 'Accent (Oranye)',
                            ])
                            ->default('primary'),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Aktif'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('value')
                    ->label('Nilai')
                    ->searchable()
                    ->weight('bold')
                    ->size('lg'),
                TextColumn::make('label')
                    ->label('Label')
                    ->searchable(),
                TextColumn::make('color')
                    ->label('Warna')
                    ->badge()
                    ->color(fn ($state) => $state),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
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

    public static function getPages(): array
    {
        return [
            'index' => ManageHomeStats::route('/'),
        ];
    }
}
