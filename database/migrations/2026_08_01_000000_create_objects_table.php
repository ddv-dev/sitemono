<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('title');                          // Название объекта
            $table->string('category')->default('private');   // Категория (для фильтра)
            $table->string('city');                            // Город
            $table->unsignedInteger('volume')->nullable();     // Объём работ, м³
            $table->json('marks')->nullable();                 // Марки бетона и год (несколько): [{grade, year}]
            $table->string('photo')->nullable();               // Фото
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objects');
    }
};
