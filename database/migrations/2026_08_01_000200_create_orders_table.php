<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone');
            $table->text('message')->nullable();
            $table->string('source')->default('Сайт');       // Откуда заявка
            $table->json('meta')->nullable();                 // Доп. поля (email, объём, компания и т.п.)
            $table->string('status')->default('new');         // new | in_progress | done
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
