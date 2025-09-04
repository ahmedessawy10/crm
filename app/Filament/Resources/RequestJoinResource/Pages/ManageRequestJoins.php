<?php

namespace App\Filament\Resources\RequestJoinResource\Pages;

use App\Filament\Resources\RequestJoinResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRequestJoins extends ManageRecords
{
    protected static string $resource = RequestJoinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
