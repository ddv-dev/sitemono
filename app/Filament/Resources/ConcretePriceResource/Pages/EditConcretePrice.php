<?php
// app/Filament/Resources/ConcretePriceResource/Pages/EditConcretePrice.php

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
               Actions\Action::make('back')
                ->label('Назад')
                ->url(ConcretePriceResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
                ->color('gray'),
            Actions\DeleteAction::make(),
        ];
    }

    // Принудительно обновляем запись
    protected function handleRecordUpdate($record, array $data): \Illuminate\Database\Eloquent\Model
    {
        \Log::info('Updating record:', [
            'record_id' => $record->id,
            'data' => $data
        ]);

        // Обновляем запись принудительно
        $record->update($data);
        $record->refresh();

        \Log::info('Record after update:', $record->toArray());

        return $record;
    }
}