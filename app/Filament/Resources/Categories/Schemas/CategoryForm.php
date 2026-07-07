<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->icon('heroicon-o-tag')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required(),
                        TextInput::make('description')
                            ->label('Deskripsi'),
                        TextInput::make('icon')
                            ->label('Ikon'),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
