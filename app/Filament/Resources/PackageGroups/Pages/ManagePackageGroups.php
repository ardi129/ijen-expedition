<?php

namespace App\Filament\Resources\PackageGroups\Pages;

use App\Filament\Resources\PackageGroups\PackageGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePackageGroups extends ManageRecords
{
    protected static string $resource = PackageGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
