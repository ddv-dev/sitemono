<?php
// app/Filament/Resources/ConcretePriceResource/Pages/CreateConcretePrice.php

namespace App\Filament\Resources\ConcretePriceResource\Pages;

use App\Filament\Resources\ConcretePriceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateConcretePrice extends CreateRecord
{
    protected static string $resource = ConcretePriceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        \Log::info('Before create mutation:', $data);
        return $data;
    }

    protected function beforeCreate(): void
    {
        \Log::info('Before create:', $this->data);
    }

    protected function afterCreate(): void
    {
        \Log::info('After create:', [
            'id' => $this->record->id,
            'data' => $this->record->toArray()
        ]);
    }
}