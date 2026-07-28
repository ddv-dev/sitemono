<?php

namespace App\Filament\Resources\ConcreteGradeResource\Pages;

use App\Filament\Resources\ConcreteGradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConcreteGrades extends ListRecords
{
    protected static string $resource = ConcreteGradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
