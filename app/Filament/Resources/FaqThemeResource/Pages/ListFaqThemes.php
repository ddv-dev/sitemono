<?php
// app/Filament/Resources/FaqThemeResource/Pages/ListFaqThemes.php

namespace App\Filament\Resources\FaqThemeResource\Pages;

use App\Filament\Resources\FaqThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqThemes extends ListRecords
{
    protected static string $resource = FaqThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Создать тему'),
        ];
    }
}