<?php

namespace App\Filament\Resources\PackageGroups;

use App\Filament\Resources\PackageGroups\Pages\ManagePackageGroups;
use App\Models\Category;
use App\Models\PackageGroup;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class PackageGroupResource extends Resource
{
    protected static ?string $model = PackageGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static ?string $modelLabel = 'Grup Paket';

    protected static ?string $pluralModelLabel = 'Grup Paket';

    protected static ?string $navigationLabel = 'Grup Paket';

    protected static ?int $navigationSort = 2;

    protected static string|\UnitEnum|null $navigationGroup = 'Paket';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Grup')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Grup')
                            ->helperText('Contoh: Paket 3 Hari 2 Malam')
                            ->required(),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ]),
                Section::make('Filter Paket')
                    ->description('Atur paket mana yang masuk ke grup ini')
                    ->columns(2)
                    ->schema([
                        Select::make('filter_type')
                            ->label('Filter Berdasarkan')
                            ->options([
                                'duration' => 'Durasi (hari)',
                                'category' => 'Kategori',
                            ])
                            ->live()
                            ->required(),
                        Select::make('filter_value')
                            ->label('Nilai Filter')
                            ->required()
                            ->options(fn ($get): array|Collection => $get('filter_type') === 'category'
                                ? Category::orderBy('name')->pluck('name', 'slug')
                                : collect(range(1, 14))->mapWithKeys(fn (int $i) => [$i => $i . ' Hari']))
                            ->helperText(fn ($get) => $get('filter_type') === 'category'
                                ? 'Pilih kategori paket'
                                : 'Pilih durasi paket dalam hari'),
                        Select::make('exclude_filter_type')
                            ->label('Kecualikan Berdasarkan')
                            ->options([
                                '' => 'Tidak ada',
                                'duration' => 'Durasi (hari)',
                                'category' => 'Kategori',
                            ])
                            ->live()
                            ->helperText('Opsional'),
                        Select::make('exclude_filter_value')
                            ->label('Nilai Pengecualian')
                            ->helperText('Pilih nilai yang dikecualikan')
                            ->options(fn ($get): array|Collection => $get('exclude_filter_type') === 'category'
                                ? Category::orderBy('name')->pluck('name', 'slug')
                                : ($get('exclude_filter_type') === 'duration'
                                    ? collect(range(1, 14))->mapWithKeys(fn (int $i) => [$i => $i . ' Hari'])
                                    : []))
                    ]),
                Section::make('Pengaturan')
                    ->columns(2)
                    ->schema([
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
                TextColumn::make('name')
                    ->label('Nama Grup')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('filter_type')
                    ->label('Filter')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state === 'duration' ? 'Durasi' : 'Kategori')
                    ->color('primary'),
                TextColumn::make('filter_value')
                    ->label('Nilai'),
                TextColumn::make('exclude_filter_value')
                    ->label('Kecualikan')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => ManagePackageGroups::route('/'),
        ];
    }
}
