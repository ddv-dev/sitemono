<?php
// app/Filament/Pages/ManageCompany.php

namespace App\Filament\Pages;

use App\Models\CompanySetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageCompany extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Реквизиты компании';
    protected static ?string $navigationGroup = 'Настройки';
    protected static ?string $title = 'Реквизиты и контакты компании';
    protected static string $view = 'filament.pages.manage-company';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(CompanySetting::current()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Контакты')
                    ->description('Отображаются в шапке, подвале и на странице «Контакты»')
                    ->schema([
                        Forms\Components\TextInput::make('phone')->label('Телефон')->required(),
                        Forms\Components\TextInput::make('email')->label('Email')->email(),
                        Forms\Components\TextInput::make('work_hours')->label('Режим работы'),
                        Forms\Components\TextInput::make('production_note')->label('Примечание о производстве'),
                        Forms\Components\TextInput::make('callback_note')->label('Подпись у телефона'),
                        Forms\Components\TextInput::make('address_short')->label('Краткий адрес (подвал)'),
                    ])->columns(2),

                Forms\Components\Section::make('Реквизиты компании')
                    ->schema([
                        Forms\Components\TextInput::make('legal_name')->label('Полное наименование'),
                        Forms\Components\TextInput::make('inn_kpp')->label('ИНН / КПП'),
                        Forms\Components\TextInput::make('account')->label('Расчётный счёт'),
                        Forms\Components\TextInput::make('bank')->label('Банк'),
                        Forms\Components\TextInput::make('bik')->label('БИК'),
                        Forms\Components\TextInput::make('corr_account')->label('Корр. счёт'),
                        Forms\Components\TextInput::make('legal_address')->label('Юридический адрес')->columnSpanFull(),
                        Forms\Components\TextInput::make('production_address')->label('Адрес производства')->columnSpanFull(),
                        Forms\Components\TextInput::make('req_email')->label('E-mail (в реквизитах)')->email(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        CompanySetting::query()->updateOrCreate(['id' => 1], $data);

        Notification::make()
            ->title('Реквизиты сохранены')
            ->success()
            ->send();
    }
}
