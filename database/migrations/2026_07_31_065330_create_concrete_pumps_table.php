<?php
// database/migrations/2026_07_31_000000_create_concrete_pumps_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('concrete_pumps', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Тип (АБН 24 м, АБН 28 м, etc.)
            $table->integer('boom_length'); // Длина стрелы в метрах
            $table->integer('price_per_shift'); // Цена за смену (7+1 ч)
            $table->text('application')->nullable(); // Где применяется
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('concrete_pumps');
    }
};