<?php
// app/Models/ConcretePump.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcretePump extends Model
{
    protected $fillable = [
        'type',
        'boom_length',
        'price_per_shift',
        'application',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('boom_length');
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price_per_shift, 0, ',', ' ') . ' ₽';
    }
}