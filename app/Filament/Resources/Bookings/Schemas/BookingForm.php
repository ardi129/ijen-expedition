<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pemesanan')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
                        Select::make('tour_package_id')
                            ->relationship('tourPackage', 'title')
                            ->required(),
                        DatePicker::make('travel_date')
                            ->required(),
                        TextInput::make('number_of_people')
                            ->label('Jumlah Orang')
                            ->required()
                            ->numeric()
                            ->default(1),
                        Select::make('status')
                            ->required()
                            ->default('pending')
                            ->options([
                                'pending' => 'Menunggu',
                                'confirmed' => 'Dikonfirmasi',
                                'cancelled' => 'Dibatalkan',
                                'completed' => 'Selesai',
                            ]),
                    ]),
                Section::make('Data Pemesan')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telepon')
                            ->tel()
                            ->required(),
                    ]),
                Section::make('Catatan')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->schema([
                        Textarea::make('special_requests')
                            ->label('Permintaan Khusus')
                            ->columnSpanFull(),
                    ]),
                Section::make('Pembayaran')
                    ->icon('heroicon-o-banknotes')
                    ->columns(2)
                    ->schema([
                        TextInput::make('total_price')
                            ->label('Total Harga (Rp)')
                            ->numeric()
                            ->prefix('Rp'),
                        Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->default('unpaid')
                            ->options([
                                'unpaid' => 'Belum Bayar',
                                'partial' => 'DP / Sebagian',
                                'paid' => 'Lunas',
                            ]),
                        FileUpload::make('payment_proof')
                            ->label('Bukti Pembayaran')
                            ->image()
                            ->directory('bookings/payments')
                            ->columnSpanFull(),
                        Textarea::make('payment_note')
                            ->label('Catatan Pembayaran')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
