<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConcreteGradeResource\Pages;
use App\Models\ConcreteGrade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConcreteGradeResource extends Resource
{
    protected static ?string $model = ConcreteGrade::class;

    protected static ?string $navigationIcon = 'heroicon-o-numbered-list';
    protected static ?string $navigationGroup = 'Бетон и цены';
    protected static ?string $modelLabel = 'Марка бетона';
    protected static ?string $pluralModelLabel = 'Марки бетона';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Марка (M100, M200)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('class')
                            ->label('Класс (B7.5, B15)')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Полное название')
                            ->maxLength(255)
                            ->helperText('Например: БСГ B7,5Ж3Ф25W2'),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->maxLength(65535)
                            ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Марка')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('class')
                    ->label('Класс')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Полное название')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
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
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConcreteGrades::route('/'),
            'create' => Pages\CreateConcreteGrade::route('/create'),
            'edit' => Pages\EditConcreteGrade::route('/{record}/edit'),
        ];
    }
}