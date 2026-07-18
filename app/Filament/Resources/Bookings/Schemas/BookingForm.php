<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\TourPackage;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Set $set, Get $get, ?string $state) {
                                static::recalculateTotalPrice($set, $get);
                            }),
                        DatePicker::make('travel_date')
                            ->required(),
                        TextInput::make('number_of_people')
                            ->label('Jumlah Orang')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                static::recalculateTotalPrice($set, $get);
                            }),
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
                        ToggleButtons::make('price_mode')
                            ->label('Mode Harga')
                            ->options([
                                'package' => 'Hitung dari Paket',
                                'manual' => 'Input Manual',
                            ])
                            ->icons([
                                'package' => 'heroicon-o-calculator',
                                'manual' => 'heroicon-o-pencil',
                            ])
                            ->default('package')
                            ->inline()
                            ->live()
                            ->dehydrated(false)
                            ->afterStateHydrated(function (ToggleButtons $component, Get $get) {
                                $tourPackageId = $get('tour_package_id');
                                $totalPrice = $get('total_price');
                                $numberOfPeople = $get('number_of_people') ?: 1;

                                if ($tourPackageId && $totalPrice) {
                                    $package = TourPackage::find($tourPackageId);
                                    $expectedPrice = $package ? $package->price * $numberOfPeople : 0;

                                    $component->state(
                                        $expectedPrice === (int) $totalPrice ? 'package' : 'manual'
                                    );
                                } else {
                                    $component->state('package');
                                }
                            })
                            ->afterStateUpdated(function (Set $set, Get $get, ?string $state) {
                                if ($state === 'package') {
                                    static::recalculateTotalPrice($set, $get);
                                }
                            })
                            ->columnSpanFull(),
                        Placeholder::make('package_price_info')
                            ->label('Harga per Orang (dari Paket)')
                            ->content(function (Get $get): string {
                                $tourPackageId = $get('tour_package_id');

                                if (! $tourPackageId) {
                                    return 'Pilih paket wisata terlebih dahulu';
                                }

                                $package = TourPackage::find($tourPackageId);

                                if (! $package) {
                                    return '-';
                                }

                                return $package->formattedPrice().' / orang';
                            })
                            ->visible(fn (Get $get): bool => $get('price_mode') === 'package'),
                        TextInput::make('total_price')
                            ->label('Total Harga (Rp)')
                            ->numeric()
                            ->prefix('Rp')
                            ->disabled(fn (Get $get): bool => $get('price_mode') === 'package')
                            ->dehydrated()
                            ->helperText(function (Get $get): ?string {
                                if ($get('price_mode') !== 'package') {
                                    return null;
                                }

                                $tourPackageId = $get('tour_package_id');
                                $numberOfPeople = (int) ($get('number_of_people') ?: 1);

                                if (! $tourPackageId) {
                                    return null;
                                }

                                $package = TourPackage::find($tourPackageId);

                                if (! $package || $package->price === 0) {
                                    return null;
                                }

                                return $package->formattedPrice().' × '.$numberOfPeople.' orang';
                            }),
                        Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->default('unpaid')
                            ->live()
                            ->options([
                                'unpaid' => 'Belum Bayar',
                                'partial' => 'DP / Sebagian',
                                'paid' => 'Lunas',
                            ])
                            ->afterStateUpdated(function (Set $set, Get $get, ?string $state) {
                                if ($state === 'paid') {
                                    $set('paid_amount', $get('total_price'));
                                }
                            }),
                        TextInput::make('paid_amount')
                            ->label('Jumlah yang Sudah Dibayar (Rp)')
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0)
                            ->live(onBlur: true)
                            ->visible(fn (Get $get): bool => in_array($get('payment_status'), ['partial', 'paid'])),
                        Placeholder::make('remaining_display')
                            ->label('Sisa Belum Dibayar')
                            ->content(function (Get $get): HtmlString {
                                $totalPrice = (int) ($get('total_price') ?: 0);
                                $paidAmount = (int) ($get('paid_amount') ?: 0);
                                $remaining = max(0, $totalPrice - $paidAmount);

                                $formatted = 'Rp '.number_format($remaining, 0, ',', '.');

                                return new HtmlString(
                                    '<span style="color: #dc2626; font-weight: 700; font-size: 1.1em;">'.$formatted.'</span>'
                                );
                            })
                            ->visible(fn (Get $get): bool => $get('payment_status') === 'partial'),
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

    /** Hitung ulang total_price dari harga paket × jumlah orang jika mode = package. */
    private static function recalculateTotalPrice(Set $set, Get $get): void
    {
        if ($get('price_mode') !== 'package') {
            return;
        }

        $tourPackageId = $get('tour_package_id');
        $numberOfPeople = (int) ($get('number_of_people') ?: 1);

        if (! $tourPackageId) {
            return;
        }

        $package = TourPackage::find($tourPackageId);

        if (! $package || $package->price === 0) {
            return;
        }

        $set('total_price', $package->price * $numberOfPeople);
    }
}
