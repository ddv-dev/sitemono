<?php
// database/migrations/2026_07_31_000000_create_faq_themes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_themes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название темы
            $table->string('slug')->unique(); // Уникальный идентификатор
            $table->text('description')->nullable(); // Описание темы
            $table->string('icon')->nullable(); // Иконка (опционально)
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_themes');
    }
};