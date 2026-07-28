<?php

namespace App\Filament\Resources\ConcretePriceResource\Pages;

use App\Filament\Resources\ConcretePriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConcretePrice extends EditRecord
{
    protected static string $resource = ConcretePriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
