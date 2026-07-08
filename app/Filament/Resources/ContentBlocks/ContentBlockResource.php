<?php

namespace App\Filament\Resources\ContentBlocks;

use App\Filament\Resources\ContentBlocks\Pages\ManageContentBlocks;
use App\Models\ContentBlock;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContentBlockResource extends Resource
{
    protected static ?string $model = ContentBlock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $modelLabel = 'Blok Konten';

    protected static ?string $pluralModelLabel = 'Blok Konten';

    protected static ?string $navigationLabel = 'Konten Halaman';

    protected static ?int $navigationSort = 4;

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Blok')
                    ->columns(2)
                    ->schema([
                        TextInput::make('key')
                            ->label('Key (identifier unik)')
                            ->helperText('Contoh: about-intro, visi, misi, cta-banner')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('title')
                            ->label('Judul'),
                        TextInput::make('subtitle')
                            ->label('Subjudul'),
                    ]),
                Section::make('Konten')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Konten')
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike',
                                'h2', 'h3', 'h4',
                                'bulletList', 'orderedList',
                                'blockquote',
                                'link',
                                'undo', 'redo',
                            ]),
                    ]),
                Section::make('Media')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('content-blocks')
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
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('Key')
                    ->searchable()
                    ->weight('semibold')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('subtitle')
                    ->label('Subjudul')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->size(40)
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ->defaultSort('key')
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
            'index' => ManageContentBlocks::route('/'),
        ];
    }
}
