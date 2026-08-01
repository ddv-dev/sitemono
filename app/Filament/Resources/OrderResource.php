<?php
// app/Filament/Resources/OrderResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationLabel = 'Заказы';
    protected static ?string $pluralLabel = 'Заказы';
    protected static ?string $label = 'Заказ';
    protected static ?int $navigationSort = -2;

    /** Счётчик новых заявок в меню (обновляется опросом). */
    public static function getNavigationBadge(): ?string
    {
        $count = Order::query()->new()->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    protected static array $statusColors = [
        Order::STATUS_NEW => 'danger',
        Order::STATUS_IN_PROGRESS => 'warning',
        Order::STATUS_DONE => 'success',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Заявка')
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Имя'),
                        Forms\Components\TextInput::make('phone')->label('Телефон')->required(),
                        Forms\Components\TextInput::make('source')->label('Источник'),
                        Forms\Components\Select::make('status')
                            ->label('Статус')
                            ->options(Order::STATUSES)
                            ->default(Order::STATUS_NEW)
                            ->required(),
                        Forms\Components\Textarea::make('message')->label('Сообщение')->rows(3)->columnSpanFull(),
                        Forms\Components\KeyValue::make('meta')
                            ->label('Доп. данные')
                            ->keyLabel('Поле')
                            ->valueLabel('Значение')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('10s')
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Когда')
                    ->dateTime('d.m.Y H:i')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('source')
                    ->label('Источник')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Order::STATUSES[$state] ?? $state)
                    ->color(fn ($state) => static::$statusColors[$state] ?? 'gray'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options(Order::STATUSES),
            ])
            ->actions([
                Tables\Actions\Action::make('accept')
                    ->label('Принять в работу')
                    ->icon('heroicon-o-play')
                    ->color('warning')
                    ->visible(fn (Order $record) => $record->status === Order::STATUS_NEW)
                    ->action(fn (Order $record) => $record->update(['status' => Order::STATUS_IN_PROGRESS])),

                Tables\Actions\Action::make('complete')
                    ->label('Завершить')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (Order $record) => $record->status === Order::STATUS_IN_PROGRESS)
                    ->action(fn (Order $record) => $record->update(['status' => Order::STATUS_DONE])),

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
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
