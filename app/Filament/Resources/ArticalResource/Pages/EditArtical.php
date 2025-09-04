<?php

namespace App\Filament\Resources\ArticalResource\Pages;

use App\Filament\Resources\ArticalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtical extends EditRecord
{
    protected static string $resource = ArticalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
