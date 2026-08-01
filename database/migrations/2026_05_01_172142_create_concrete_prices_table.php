<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concrete_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concrete_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('concrete_grade_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 15, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Уникальность: одна пара тип-марка не должна дублироваться
            $table->unique(['concrete_type_id', 'concrete_grade_id'], 'unique_concrete_price');
        });
    }

    public function down()
    {
        Schema::dropIfExists('concrete_prices');
    }
};