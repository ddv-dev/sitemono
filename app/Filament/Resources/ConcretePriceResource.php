<?php
// app/Filament/Resources/ConcretePriceResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\ConcretePriceResource\Pages;
use App\Models\ConcretePrice;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConcretePriceResource extends Resource
{
    protected static ?string $model = ConcretePrice::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Бетон и цены';
    protected static ?string $modelLabel = 'Цена бетона';
    protected static ?string $pluralModelLabel = 'Цены бетона';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Выбор типа и марки')
                    ->schema([
                        Forms\Components\Select::make('concrete_type_id')
                            ->label('Тип бетона')
                            ->options(ConcreteType::active()->ordered()->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('concrete_grade_id')
                            ->label('Марка бетона')
                            ->options(ConcreteGrade::active()->ordered()->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Цена')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('Цена (₽)')
                            ->required()
                            ->numeric()
                            ->prefix('₽')
                            ->minValue(0)
                            ->maxValue(999999)
                            ->step(1)  // Добавляем шаг 1
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Тип')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade.name')
                    ->label('Марка')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade.full_name')
                    ->label('Класс бетона')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена (₽)')
                    ->money('RUB')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('concrete_type_id')
                    ->label('Тип бетона')
                    ->options(ConcreteType::active()->ordered()->pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('concrete_grade_id')
                    ->label('Марка бетона')
                    ->options(ConcreteGrade::active()->ordered()->pluck('name', 'id')),
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
            ])
            ->defaultSort('type.name', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConcretePrices::route('/'),
            'create' => Pages\CreateConcretePrice::route('/create'),
            'edit' => Pages\EditConcretePrice::route('/{record}/edit'),
        ];
    }
}