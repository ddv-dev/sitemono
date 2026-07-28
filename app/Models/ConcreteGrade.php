<?php
// app/Models/ConcreteGrade.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcreteGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'full_name',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function prices()
    {
        return $this->hasMany(ConcretePrice::class);
    }

    public function types()
    {
        return $this->belongsToMany(ConcreteType::class, 'concrete_prices')
                    ->withPivot('price', 'is_active')  // Исправляем на price
                    ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}