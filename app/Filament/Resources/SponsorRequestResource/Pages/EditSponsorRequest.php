<?php

namespace App\Filament\Resources\SponsorRequestResource\Pages;

use App\Filament\Resources\SponsorRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSponsorRequest extends EditRecord
{
    protected static string $resource = SponsorRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
