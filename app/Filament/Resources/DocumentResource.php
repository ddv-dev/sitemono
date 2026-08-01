<?php
// app/Filament/Resources/DocumentResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationLabel = 'Документы и сертификаты';
    protected static ?string $pluralLabel = 'Документы и сертификаты';
    protected static ?string $label = 'Документ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('ГОСТ 7473-2010'),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Подпись')
                            ->maxLength(255)
                            ->placeholder('Соответствие стандарту'),
                        Forms\Components\FileUpload::make('file')
                            ->label('Файл (PDF или скан)')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->downloadable()
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
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Подпись'),
                Tables\Columns\IconColumn::make('file')
                    ->label('Файл')
                    ->boolean()
                    ->state(fn (Document $record) => filled($record->file)),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
