<?php

namespace App\Filament\Resources\FactoryPhotoResource\Pages;

use App\Filament\Resources\FactoryPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFactoryPhotos extends ListRecords
{
    protected static string $resource = FactoryPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
