<?php
// app/Filament/Resources/ConcretePriceResource/Pages/ListConcretePrices.php

namespace App\Filament\Resources\ConcretePriceResource\Pages;

use App\Filament\Resources\ConcretePriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConcretePrices extends ListRecords
{
    protected static string $resource = ConcretePriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}