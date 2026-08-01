<?php
// app/Filament/Resources/WorkObjectResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkObjectResource\Pages;
use App\Models\WorkObject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkObjectResource extends Resource
{
    protected static ?string $model = WorkObject::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Объекты';
    protected static ?string $pluralLabel = 'Объекты';
    protected static ?string $label = 'Объект';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Название объекта')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('ЖК «Новый берег» — монолитные перекрытия')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('category')
                            ->label('Категория')
                            ->options(WorkObject::categoryOptions())
                            ->required()
                            ->default('private'),

                        Forms\Components\TextInput::make('city')
                            ->label('Город')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Мытищи'),

                        Forms\Components\TextInput::make('volume')
                            ->label('Объём работ')
                            ->numeric()
                            ->minValue(0)
                            ->suffix('м³')
                            ->placeholder('2400'),
                    ])->columns(2),

                Forms\Components\Section::make('Используемые марки бетона и год')
                    ->description('Можно добавить несколько марок для одного объекта')
                    ->schema([
                        Forms\Components\Repeater::make('marks')
                            ->label('')
                            ->schema([
                                Forms\Components\TextInput::make('grade')
                                    ->label('Марка')
                                    ->required()
                                    ->placeholder('М300'),
                                Forms\Components\TextInput::make('year')
                                    ->label('Год')
                                    ->placeholder('2024'),
                            ])
                            ->columns(2)
                            ->addActionLabel('Добавить марку')
                            ->reorderable(false)
                            ->defaultItems(1),
                    ]),

                Forms\Components\Section::make('Фото и настройки')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Фото')
                            ->image()
                            ->directory('objects')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Фото'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->limit(40)
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Категория')
                    ->badge()
                    ->formatStateUsing(fn ($state) => WorkObject::CATEGORIES[$state][0] ?? $state),
                Tables\Columns\TextColumn::make('city')
                    ->label('Город')
                    ->searchable(),
                Tables\Columns\TextColumn::make('volume')
                    ->label('Объём')
                    ->suffix(' м³')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Категория')
                    ->options(WorkObject::categoryOptions()),
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
            'index' => Pages\ListWorkObjects::route('/'),
            'create' => Pages\CreateWorkObject::route('/create'),
            'edit' => Pages\EditWorkObject::route('/{record}/edit'),
        ];
    }
}
