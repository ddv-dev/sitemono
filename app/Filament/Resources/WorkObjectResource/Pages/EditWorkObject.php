<?php

namespace App\Filament\Resources\WorkObjectResource\Pages;

use App\Filament\Resources\WorkObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkObject extends EditRecord
{
    protected static string $resource = WorkObjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
