<?php

namespace App\Filament\Pages;

use App\Models\ContentBlock;
use BackedEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use UnitEnum;

class EditPrivacy extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'Kebijakan Privasi';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 6;

    protected static ?string $title = 'Edit Kebijakan Privasi';

    protected string $view = 'filament.pages.edit-privacy';

    public ?array $data = [];

    public function mount(): void
    {
        $record = ContentBlock::firstOrCreate(
            ['key' => 'privacy-policy'],
            [
                'title' => 'Kebijakan Privasi',
                'is_active' => true,
                'content' => '<p>Ijen Expedition Trip ("kami", "milik kami", atau "kita") menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan kepada kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat Anda menggunakan layanan kami.</p><h3>1. Informasi yang Kami Kumpulkan</h3><p>Kami dapat mengumpulkan informasi identitas pribadi, seperti nama, alamat email, nomor telepon, dan informasi pembayaran, yang Anda berikan secara sukarela saat memesan paket wisata atau menghubungi kami.</p><h3>2. Penggunaan Informasi</h3><p>Informasi yang kami kumpulkan digunakan untuk memproses pemesanan Anda, berkomunikasi mengenai layanan yang Anda pesan, dan untuk tujuan administratif lainnya.</p><h3>3. Keamanan Data</h3><p>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi data pribadi Anda dari akses yang tidak sah, pengubahan, pengungkapan, atau penghancuran.</p><h3>4. Berbagi Informasi dengan Pihak Ketiga</h3><p>Kami tidak akan menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga. Kami hanya dapat membagikan informasi Anda dengan mitra terpercaya (seperti penyedia transportasi atau penginapan) yang membantu kami dalam menyelenggarakan trip Anda.</p><h3>5. Perubahan Kebijakan Privasi</h3><p>Kami berhak untuk mengubah Kebijakan Privasi ini kapan saja. Setiap perubahan akan diumumkan di halaman ini.</p>',
            ]
        );

        $this->form->fill($record->toArray());
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Ubah Informasi Kebijakan Privasi')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Isi Kebijakan Privasi')
                            ->required()
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
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = ContentBlock::where('key', 'privacy-policy')->first();
        $record->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        Notification::make()
            ->title('Kebijakan Privasi berhasil diperbarui')
            ->success()
            ->send();
    }
}
