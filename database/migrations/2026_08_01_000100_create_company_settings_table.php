<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();

            // Контакты
            $table->string('phone')->nullable();            // 8 (991) 558-38-88
            $table->string('email')->nullable();            // info@psm-monolit.ru
            $table->string('work_hours')->nullable();        // Пн–Вс, 07:00–22:00
            $table->string('production_note')->nullable();   // Производство — 24/7
            $table->string('callback_note')->nullable();     // Перезвоним за 4 минуты
            $table->string('address_short')->nullable();     // Одинцовский р-н, Луцинское шоссе 3А

            // Реквизиты
            $table->string('legal_name')->nullable();        // ООО «ПСМ МОНОЛИТ»
            $table->string('inn_kpp')->nullable();
            $table->string('account')->nullable();           // Расчётный счёт
            $table->string('bank')->nullable();
            $table->string('bik')->nullable();
            $table->string('corr_account')->nullable();
            $table->string('legal_address')->nullable();     // Юр. адрес
            $table->string('production_address')->nullable(); // Адрес производства
            $table->string('req_email')->nullable();         // E-mail в реквизитах

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
