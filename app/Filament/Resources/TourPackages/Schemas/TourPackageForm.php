<?php

namespace App\Filament\Resources\TourPackages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class TourPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Informasi Dasar')
                            ->icon('heroicon-o-information-circle')
                            ->columns(2)
                            ->schema([
                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required(),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required(),
                                Textarea::make('short_description')
                                    ->label('Deskripsi Singkat')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Durasi & Harga')
                            ->icon('heroicon-o-currency-dollar')
                            ->columns(3)
                            ->schema([
                                TextInput::make('duration_days')
                                    ->label('Durasi Hari')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->suffix('Hari'),
                                TextInput::make('duration_nights')
                                    ->label('Durasi Malam')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->suffix('Malam'),
                                TextInput::make('price')
                                    ->label('Harga')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('Rp'),
                            ]),
                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('tour-packages')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('675'),
                            ]),
                        Tab::make('Detail Paket')
                            ->icon('heroicon-o-list-bullet')
                            ->schema([
                                Repeater::make('highlights')
                                    ->simple(
                                        TextInput::make('item')->required()->label('Highlight'),
                                    )
                                    ->defaultItems(0)
                                    ->addActionLabel('Tambah Highlight'),
                                Repeater::make('itinerary')
                                    ->schema([
                                        TextInput::make('time')
                                            ->required()
                                            ->placeholder('Contoh: 06:00'),
                                        TextInput::make('activity')
                                            ->required()
                                            ->placeholder('Aktivitas'),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['time'] ?? null)
                                    ->collapsible()
                                    ->cloneable()
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('Tambah Jadwal'),
                                Repeater::make('includes')
                                    ->simple(
                                        TextInput::make('item')->required()->label('Termasuk'),
                                    )
                                    ->defaultItems(0)
                                    ->addActionLabel('Tambah Fasilitas'),
                                Repeater::make('excludes')
                                    ->simple(
                                        TextInput::make('item')->required()->label('Tidak Termasuk'),
                                    )
                                    ->defaultItems(0)
                                    ->addActionLabel('Tambah Pengecualian'),
                            ]),
                        Tab::make('Pengaturan')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->columns(2)
                            ->schema([
                                Toggle::make('is_featured')
                                    ->label('Paket Unggulan'),
                                TextInput::make('sort_order')
                                    ->label('Urutan Tampil')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->suffix('Urutan'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
