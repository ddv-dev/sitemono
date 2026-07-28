<?php
// app/Models/ConcretePrice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcretePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'concrete_type_id',
        'concrete_grade_id',
        'price_cash',
        'price_non_cash',
        'price_nds',
        'is_active'
    ];

    protected $casts = [
        'price_cash' => 'decimal:2',
        'price_non_cash' => 'decimal:2',
        'price_nds' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function type()
    {
        return $this->belongsTo(ConcreteType::class, 'concrete_type_id');
    }

    public function grade()
    {
        return $this->belongsTo(ConcreteGrade::class, 'concrete_grade_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}