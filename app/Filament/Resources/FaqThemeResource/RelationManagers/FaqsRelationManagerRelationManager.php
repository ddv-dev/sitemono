<?php
// app/Filament/Resources/FaqThemeResource/RelationManagers/FaqsRelationManager.php

namespace App\Filament\Resources\FaqThemeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class FaqsRelationManager extends RelationManager
{
    protected static string $relationship = 'faqs';
    protected static ?string $recordTitleAttribute = 'question';
    protected static ?string $title = 'Вопросы';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label('Вопрос')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('answer')
                    ->label('Ответ')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Активно')
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Сортировка')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Вопрос')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('answer')
                    ->label('Ответ')
                    ->limit(30)
                    ->html(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Сортировка'),
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
}