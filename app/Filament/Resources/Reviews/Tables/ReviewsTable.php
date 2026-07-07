<?php

namespace App\Filament\Resources\Reviews\Tables;

use App\Models\Review;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->description(fn (Review $record): string => $record->tourPackage?->title ?? '-'),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn (int $state): string => str_repeat('★', $state).str_repeat('☆', 5 - $state))
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state >= 4 => 'success',
                        $state >= 3 => 'warning',
                        default => 'danger',
                    })
                    ->alignCenter(),
                ToggleColumn::make('is_visible')
                    ->label('Tampil'),
                TextColumn::make('admin_feedback')
                    ->label('Feedback')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '1 ★',
                        2 => '2 ★',
                        3 => '3 ★',
                        4 => '4 ★',
                        5 => '5 ★',
                    ]),
                SelectFilter::make('is_visible')
                    ->label('Tampil')
                    ->options([
                        true => 'Tampil',
                        false => 'Sembunyi',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make()
                    ->modalHeading('Detail Rating'),
                Action::make('feedback')
                    ->label(fn (Review $record): string => $record->admin_feedback ? 'Edit Feedback' : 'Beri Feedback')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->modalHeading(fn (Review $record): string => $record->admin_feedback ? 'Edit Feedback' : 'Beri Feedback')
                    ->modalWidth('lg')
                    ->form([
                        Textarea::make('admin_feedback')
                            ->label('Feedback Admin Ijen Expedition Trip')
                            ->required()
                            ->rows(5)
                            ->placeholder('Tulis feedback untuk ulasan ini...'),
                    ])
                    ->fillForm(fn (Review $record): array => [
                        'admin_feedback' => $record->admin_feedback,
                    ])
                    ->action(function (Review $record, array $data): void {
                        $record->update(['admin_feedback' => $data['admin_feedback']]);

                        Notification::make()
                            ->title('Feedback berhasil disimpan')
                            ->success()
                            ->send();
                    }),
                Action::make('hapusFeedback')
                    ->label('Hapus Feedback')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->visible(fn (Review $record): bool => $record->admin_feedback !== null)
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Feedback')
                    ->modalDescription('Apakah Anda yakin ingin menghapus feedback ini?')
                    ->action(function (Review $record): void {
                        $record->update(['admin_feedback' => null]);

                        Notification::make()
                            ->title('Feedback berhasil dihapus')
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
