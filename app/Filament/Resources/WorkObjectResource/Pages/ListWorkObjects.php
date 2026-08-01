<?php

namespace App\Filament\Resources\WorkObjectResource\Pages;

use App\Filament\Resources\WorkObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkObjects extends ListRecords
{
    protected static string $resource = WorkObjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
