<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi FAQ')
                    ->icon('heroicon-o-question-mark-circle')
                    ->columns(2)
                    ->schema([
                        TextInput::make('question')
                            ->label('Pertanyaan')
                            ->required(),
                        Textarea::make('answer')
                            ->label('Jawaban')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('category')
                            ->label('Kategori')
                            ->required()
                            ->default('Umum'),
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
}
