<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Artikel')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required(),
                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->columnSpanFull(),
                        Textarea::make('body')
                            ->label('Isi Artikel')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Kategori')
                    ->icon('heroicon-o-photo')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('articles'),
                        TextInput::make('category')
                            ->label('Kategori')
                            ->required()
                            ->default('Artikel Blog'),
                    ]),
                Section::make('Pengaturan Publikasi')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Publikasikan'),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi'),
                        TextInput::make('view_count')
                            ->label('Jumlah Dilihat')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
