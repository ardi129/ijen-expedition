<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaGallery extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Media';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'Galeri Media';

    protected string $view = 'filament.pages.media-gallery';

    public array $mediaFiles = [];

    public function mount(): void
    {
        $this->loadMedia();
    }

    public function loadMedia(): void
    {
        $disk = Storage::disk('public');
        $files = [];

        $directories = ['articles', 'tour-packages', 'destinations', 'thumbnails'];

        foreach ($directories as $dir) {
            if (! $disk->exists($dir)) {
                continue;
            }

            $paths = $disk->allFiles($dir);

            foreach ($paths as $path) {
                $mime = $disk->mimeType($path);
                if ($mime && Str::isMatch('/image\/*/', $mime)) {
                    $name = pathinfo($path, PATHINFO_BASENAME);
                    $size = $disk->size($path);

                    $files[] = [
                        'path' => $path,
                        'name' => $name,
                        'directory' => $dir,
                        'url' => Storage::url($path),
                        'size' => $size,
                        'size_formatted' => $this->formatBytes($size),
                        'type' => $disk->mimeType($path),
                    ];
                }
            }
        }

        usort($files, fn ($a, $b) => strcmp($b['path'], $a['path']));

        $this->mediaFiles = $files;
    }

    public function deleteImage(string $path): void
    {
        $disk = Storage::disk('public');

        if ($disk->delete($path)) {
            Notification::make()
                ->title('Gambar berhasil dihapus')
                ->success()
                ->send();

            $this->loadMedia();
        } else {
            Notification::make()
                ->title('Gagal menghapus gambar')
                ->danger()
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('upload')
                ->label('Upload Gambar')
                ->icon('heroicon-o-cloud-arrow-up')
                ->form([
                    Grid::make()
                        ->schema([
                            FileUpload::make('file')
                                ->label('Pilih Gambar')
                                ->image()
                                ->disk('public')
                                ->directory('uploads')
                                ->imageEditor()
                                ->required(),
                        ]),
                ])
                ->action(function (array $data): void {
                    Notification::make()
                        ->title('Gambar berhasil diupload')
                        ->success()
                        ->send();

                    $this->loadMedia();
                }),
        ];
    }

    private function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];

        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, $precision).' '.$units[$i];
    }
}
