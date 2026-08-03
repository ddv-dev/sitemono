<?php

namespace App\Filament\Resources\FactoryPhotoResource\Pages;

use App\Filament\Resources\FactoryPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFactoryPhoto extends EditRecord
{
    protected static string $resource = FactoryPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
