<?php
// app/Models/ConcretePrice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcretePrice extends Model
{
    use HasFactory;

    // ВАЖНО: добавляем поле price в fillable
    protected $fillable = [
        'concrete_type_id',
        'concrete_grade_id',
        'price',        // <-- ЭТО ПОЛЕ БЫЛО ПРОПУЩЕНО!
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    // Логирование для отладки
    protected static function booted()
    {
        static::creating(function ($model) {
            \Log::info('Creating ConcretePrice:', $model->toArray());
        });

        static::updating(function ($model) {
            \Log::info('Updating ConcretePrice:', [
                'old' => $model->getOriginal(),
                'new' => $model->toArray()
            ]);
        });

        static::saved(function ($model) {
            \Log::info('Saved ConcretePrice:', $model->toArray());
        });
    }

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