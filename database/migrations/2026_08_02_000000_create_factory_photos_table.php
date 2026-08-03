<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factory_photos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();   // Подпись (Производственная линия и т.п.)
            $table->string('image')->nullable();    // Загруженное фото
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factory_photos');
    }
};
