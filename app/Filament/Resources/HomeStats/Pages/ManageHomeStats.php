<?php

namespace App\Filament\Resources\HomeStats\Pages;

use App\Filament\Resources\HomeStats\HomeStatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageHomeStats extends ManageRecords
{
    protected static string $resource = HomeStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
