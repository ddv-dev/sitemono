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
use App\Filament\Resources\FaqThemeResource\RelationManagers\FaqsRelationManager;

class FaqThemeResource extends Resource
{
    protected static ?string $model = FaqTheme::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'FAQ';
    protected static ?string $pluralLabel = 'Темы FAQ';
    protected static ?string $label = 'Тема FAQ';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Темы FAQ';

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
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Уникальный идентификатор для URL (например: concrete, pumps, delivery)'),

                        Forms\Components\TextInput::make('icon')
                            ->label('Иконка (Bootstrap Icons)')
                            ->placeholder('bi-droplet')
                            ->maxLength(255)
                            ->helperText('Например: bi-droplet, bi-truck, bi-credit-card. Список иконок: https://icons.getbootstrap.com/')
                            ->prefixIcon('heroicon-o-cube'),

                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Краткое описание темы для отображения на сайте'),
                    ])->columns(2),

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

                Forms\Components\Section::make('Статистика')
                    ->schema([
                        Forms\Components\Placeholder::make('faqs_count')
                            ->label('Количество вопросов')
                            ->content(function ($record) {
                                return $record ? $record->faqs()->count() . ' вопросов' : '0 вопросов';
                            }),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Создано')
                            ->content(function ($record) {
                                return $record ? $record->created_at->format('d.m.Y H:i') : '-';
                            }),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Обновлено')
                            ->content(function ($record) {
                                return $record ? $record->updated_at->format('d.m.Y H:i') : '-';
                            }),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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

                Tables\Columns\IconColumn::make('icon')
                    ->label('Иконка')
                    ->icon(fn($record) => $record->icon ?? 'heroicon-o-tag')
                    ->color('primary'),

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
                Tables\Actions\ViewAction::make()
                    ->label('Просмотр'),
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
        return [
            FaqsRelationManager::class,
        ];
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
