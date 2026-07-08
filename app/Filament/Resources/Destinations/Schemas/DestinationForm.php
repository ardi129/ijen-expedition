<?php

namespace App\Filament\Resources\Destinations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DestinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Destinasi')
                    ->icon('heroicon-o-map-pin')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required(),
                        TextInput::make('location')
                            ->label('Lokasi'),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->label('Konten Lengkap')
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike',
                                'h2', 'h3', 'h4',
                                'bulletList', 'orderedList',
                                'blockquote', 'codeBlock',
                                'link',
                                'undo', 'redo',
                            ]),
                    ]),
                Section::make('Media')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('destinations')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('675')
                            ->imageEditor()
                            ->imageEditorViewportWidth('1200')
                            ->imageEditorViewportHeight('675')
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                    ]),
                Section::make('Pengaturan')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Jadikan Unggulan'),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
