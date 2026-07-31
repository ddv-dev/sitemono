<?php
// app/Filament/Resources/FaqThemeResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqThemeResource\Pages;
use App\Models\FaqTheme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FaqThemeResource extends Resource
{
    protected static ?string $model = FaqTheme::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'FAQ';
    protected static ?string $navigationLabel = 'Темы FAQ';
    protected static ?string $pluralLabel = 'Темы FAQ';
    protected static ?string $label = 'Тема FAQ';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->helperText('Название темы, которое будет отображаться на сайте'),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('Идентификатор')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Уникальный идентификатор для URL (например: concrete, pumps, delivery)'),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Краткое описание темы (опционально)'),
                    ]),

                Forms\Components\Section::make('Настройки отображения')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true)
                            ->helperText('Если выключено, тема и её FAQ не будут отображаться на сайте'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0)
                            ->helperText('Меньшее число = выше в списке'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Идентификатор')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание')
                    ->limit(50)
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('faqs_count')
                    ->label('Вопросов')
                    ->counts('faqs')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Сортировка')
                    ->sortable()
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Статус')
                    ->options([
                        '1' => 'Активные',
                        '0' => 'Неактивные',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Редактировать'),
                Tables\Actions\DeleteAction::make()
                    ->label('Удалить')
                    ->modalHeading('Удалить тему')
                    ->modalDescription('Все вопросы в этой теме также будут удалены. Вы уверены?'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Удалить выбранные'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqThemes::route('/'),
            'create' => Pages\CreateFaqTheme::route('/create'),
            'edit' => Pages\EditFaqTheme::route('/{record}/edit'),
        ];
    }
}