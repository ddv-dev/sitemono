<?php

namespace App\Filament\Resources\ConcretePumpResource\Pages;

use App\Filament\Resources\ConcretePumpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConcretePumps extends ListRecords
{
    protected static string $resource = ConcretePumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
