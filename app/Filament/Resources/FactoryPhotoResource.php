<?php
// app/Filament/Resources/FactoryPhotoResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\FactoryPhotoResource\Pages;
use App\Models\FactoryPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FactoryPhotoResource extends Resource
{
    protected static ?string $model = FactoryPhoto::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Фото завода';
    protected static ?string $pluralLabel = 'Фото завода';
    protected static ?string $label = 'Фото';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Фото')
                            ->image()
                            ->directory('factory')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('Подпись')
                            ->maxLength(255)
                            ->placeholder('Производственная линия'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Показывать на сайте')
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
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Фото'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Подпись')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('На сайте')
                    ->boolean(),
            ])
            ->reorderable('sort_order')
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
            'index' => Pages\ListFactoryPhotos::route('/'),
            'create' => Pages\CreateFactoryPhoto::route('/create'),
            'edit' => Pages\EditFactoryPhoto::route('/{record}/edit'),
        ];
    }
}
