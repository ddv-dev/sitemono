<?php

namespace App\Filament\Resources\ConcretePumpResource\Pages;

use App\Filament\Resources\ConcretePumpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConcretePump extends EditRecord
{
    protected static string $resource = ConcretePumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
