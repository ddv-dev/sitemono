<?php
// app/Filament/Resources/ConcretePumpResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\ConcretePumpResource\Pages;
use App\Models\ConcretePump;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConcretePumpResource extends Resource
{
    protected static ?string $model = ConcretePump::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Автобетононасосы и цены';
    protected static ?string $pluralLabel = 'Автобетононасосы';
    protected static ?string $label = 'Автобетононасос';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('type')
                            ->label('Тип')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Например: АБН 24 м'),
                        
                        Forms\Components\TextInput::make('boom_length')
                            ->label('Длина стрелы (м)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix(' м'),
                        
                        Forms\Components\TextInput::make('price_per_shift')
                            ->label('Цена за смену (7+1 ч)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->prefix('₽'),
                    ])->columns(3),

                Forms\Components\Section::make('Дополнительно')
                    ->schema([
                        Forms\Components\Textarea::make('application')
                            ->label('Где применяется')
                            ->rows(2)
                            ->placeholder('Частные дома, гаражи'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Тип')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('boom_length')
                    ->label('Длина стрелы')
                    ->suffix(' м')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_per_shift')
                    ->label('Смена (7+1 ч)')
                    ->money('RUB')
                    ->sortable(),
                Tables\Columns\TextColumn::make('application')
                    ->label('Где применяется')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->application),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Активно'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Статус')
                    ->options([
                        '1' => 'Активные',
                        '0' => 'Неактивные',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConcretePumps::route('/'),
            'create' => Pages\CreateConcretePump::route('/create'),
            'edit' => Pages\EditConcretePump::route('/{record}/edit'),
        ];
    }
}