<?php
// app/Filament/Resources/FaqResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'FAQ';
    protected static ?string $pluralLabel = 'Вопросы FAQ';
    protected static ?string $label = 'Вопрос FAQ';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Вопросы FAQ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Вопрос и ответ')
                    ->schema([
                        Forms\Components\Select::make('faq_theme_id')
                            ->label('Тема')
                            ->relationship('theme', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->helperText('Выберите тему, к которой относится вопрос'),

                        Forms\Components\TextInput::make('question')
                            ->label('Вопрос')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Кратко сформулируйте вопрос'),

                        Forms\Components\RichEditor::make('answer')
                            ->label('Ответ')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                            ])
                            ->helperText('Подробный ответ на вопрос. Можно использовать форматирование'),
                    ]),

                Forms\Components\Section::make('Настройки отображения')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true)
                            ->helperText('Если выключено, вопрос не будет отображаться на сайте'),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0)
                            ->helperText('Меньшее число = выше в списке'),
                    ])->columns(2),

                Forms\Components\Section::make('Информация')
                    ->schema([
                        Forms\Components\Placeholder::make('theme_name')
                            ->label('Тема')
                            ->content(function ($record) {
                                return $record ? $record->theme->name : '-';
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
                Tables\Columns\TextColumn::make('theme.name')
                    ->label('Тема')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('question')
                    ->label('Вопрос')
                    ->limit(50)
                    ->searchable()
                    ->weight('bold')
                    ->tooltip(fn($record) => $record->question),

                Tables\Columns\TextColumn::make('answer')
                    ->label('Ответ')
                    ->limit(50)
                    ->html()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Сортировка')
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('faq_theme_id')
                    ->label('Тема')
                    ->relationship('theme', 'name')
                    ->searchable()
                    ->preload(),

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
                    ->label('Удалить'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Удалить выбранные'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
