<?php

namespace App\Filament\Resources\ConcreteGradeResource\Pages;

use App\Filament\Resources\ConcreteGradeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConcreteGrade extends EditRecord
{
    protected static string $resource = ConcreteGradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
