<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengguna')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->disabled(),
                        TextInput::make('email')
                            ->label('Email')
                            ->disabled(),
                    ]),
                Section::make('Detail Rating')
                    ->columns(2)
                    ->schema([
                        Select::make('rating')
                            ->label('Rating')
                            ->options([
                                1 => '1 ★',
                                2 => '2 ★',
                                3 => '3 ★',
                                4 => '4 ★',
                                5 => '5 ★',
                            ])
                            ->disabled(),
                        Toggle::make('is_visible')
                            ->label('Tampilkan di halaman user')
                            ->disabled(),
                    ]),
                Section::make('Paket Wisata')
                    ->schema([
                        TextInput::make('tourPackage.title')
                            ->label('Paket')
                            ->disabled(),
                    ]),
                Section::make('Komentar')
                    ->schema([
                        Textarea::make('comment')
                            ->label('Komentar')
                            ->rows(5)
                            ->disabled(),
                    ]),
                Section::make('Feedback Admin')
                    ->schema([
                        Textarea::make('admin_feedback')
                            ->label('Feedback dari Ijen Expedition Trip')
                            ->rows(4)
                            ->disabled(),
                    ]),
            ]);
    }
}
