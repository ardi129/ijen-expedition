<?php

namespace App\Filament\Resources\ContentBlocks\Pages;

use App\Filament\Resources\ContentBlocks\ContentBlockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageContentBlocks extends ManageRecords
{
    protected static string $resource = ContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
