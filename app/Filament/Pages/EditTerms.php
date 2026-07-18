<?php

namespace App\Filament\Pages;

use App\Models\ContentBlock;
use BackedEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class EditTerms extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Syarat & Ketentuan';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 5;

    protected static ?string $title = 'Edit Syarat & Ketentuan';

    protected string $view = 'filament.pages.edit-terms';

    public ?array $data = [];

    public function mount(): void
    {
        $record = ContentBlock::firstOrCreate(
            ['key' => 'terms-conditions'],
            [
                'title' => 'Syarat & Ketentuan',
                'is_active' => true,
                'content' => '<h3>1. Pendaftaran dan Pemesanan</h3><p>Pendaftaran paket wisata dapat dilakukan melalui website, WhatsApp, atau email resmi kami. Pemesanan dianggap sah setelah ada konfirmasi pembayaran Down Payment (DP) atau pelunasan.</p><h3>2. Pembayaran</h3><p>Pembayaran DP minimal 30% dari total biaya keseluruhan (atau sesuai kesepakatan) dibayarkan maksimal H-7 sebelum hari keberangkatan. Pelunasan dapat dibayarkan H-1 atau saat meeting point sebelum keberangkatan.</p><h3>3. Pembatalan dan Pengembalian Dana</h3><p>Pembatalan yang dilakukan oleh peserta akan mengakibatkan DP hangus. Namun, pemindahan tanggal (reschedule) diperbolehkan dengan pemberitahuan minimal H-7, tergantung ketersediaan.</p><p>Jika terjadi pembatalan dari pihak penyelenggara karena force majeure (bencana alam, kondisi cuaca ekstrem, dll), maka dana akan dikembalikan sepenuhnya (100%).</p><h3>4. Tanggung Jawab dan Keamanan</h3><p>Peserta wajib mematuhi instruksi dari guide/pemandu wisata demi keselamatan bersama. Pihak penyelenggara tidak bertanggung jawab atas kehilangan barang berharga pribadi peserta selama trip.</p>',
            ]
        );

        $this->form->fill($record->toArray());
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Ubah Informasi Syarat & Ketentuan')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Isi Syarat & Ketentuan')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'h2',
                                'h3',
                                'h4',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'link',
                                'undo',
                                'redo',
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = ContentBlock::where('key', 'terms-conditions')->first();
        $record->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        Notification::make()
            ->title('Syarat & Ketentuan berhasil diperbarui')
            ->success()
            ->send();
    }
}
