<?php

namespace App\Filament\Resources\ConcreteTypeResource\Pages;

use App\Filament\Resources\ConcreteTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConcreteTypes extends ListRecords
{
    protected static string $resource = ConcreteTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
