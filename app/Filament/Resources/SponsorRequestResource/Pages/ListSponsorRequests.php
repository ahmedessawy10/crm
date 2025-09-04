<?php

namespace App\Filament\Resources\SponsorRequestResource\Pages;

use App\Filament\Resources\SponsorRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSponsorRequests extends ListRecords
{
    protected static string $resource = SponsorRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
