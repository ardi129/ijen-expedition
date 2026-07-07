<?php

namespace App\Filament\Resources\HeroSlides;

use App\Filament\Resources\HeroSlides\Pages\ManageHeroSlides;
use App\Models\HeroSlide;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $modelLabel = 'Slide Hero';

    protected static ?string $pluralModelLabel = 'Slide Hero';

    protected static ?string $navigationLabel = 'Hero Slider';

    protected static ?int $navigationSort = 3;

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Slide')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required(),
                        TextInput::make('subtitle')
                            ->label('Subjudul'),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
                Section::make('Gambar')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Latar')
                            ->image()
                            ->disk('public')
                            ->directory('hero-slides')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->required(),
                    ]),
                Section::make('Tombol CTA')
                    ->columns(2)
                    ->schema([
                        TextInput::make('cta_text')
                            ->label('Teks Tombol 1'),
                        TextInput::make('cta_link')
                            ->label('Link Tombol 1'),
                        TextInput::make('cta_text_2')
                            ->label('Teks Tombol 2'),
                        TextInput::make('cta_link_2')
                            ->label('Link Tombol 2'),
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
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->size(44),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('subtitle')
                    ->label('Subjudul')
                    ->searchable()
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
            'index' => ManageHeroSlides::route('/'),
        ];
    }
}
