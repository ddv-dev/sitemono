<?php
// app/Models/CompanySetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $guarded = [];

    /** Значения по умолчанию, если запись ещё не создана. */
    public const DEFAULTS = [
        'phone' => '8 (991) 558-38-88',
        'email' => 'info@psm-monolit.ru',
        'work_hours' => 'Пн–Вс, 07:00–22:00',
        'production_note' => 'Производство — 24/7',
        'callback_note' => 'Перезвоним за 4 минуты',
        'address_short' => 'Одинцовский р-н, Луцинское шоссе 3А',
        'legal_name' => 'ООО «ПСМ МОНОЛИТ»',
        'inn_kpp' => '5032335231 / 503201001',
        'account' => '40702810902980003479',
        'bank' => 'АО «АЛЬФА-БАНК» г. Москва',
        'bik' => '044525593',
        'corr_account' => '30101810200000000593',
        'legal_address' => '143180, МО, г. Звенигород, ул. Почтовая, д. 41, корп. 2, пом. 2, оф. 11',
        'production_address' => 'МО, Одинцовский район, Луцинское шоссе, 3А',
        'req_email' => 'info@rsmmonolit.ru',
    ];

    /**
     * Единственная запись настроек (создаётся при первом обращении).
     */
    public static function current(): self
    {
        return static::query()->first() ?? new static(self::DEFAULTS);
    }

    /** Телефон в формате для tel: ссылки (только цифры). */
    public function getPhoneTelAttribute(): string
    {
        return preg_replace('/\D+/', '', (string) $this->phone);
    }
}
