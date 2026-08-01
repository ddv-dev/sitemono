<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'message',
        'source',
        'meta',
        'status',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_DONE = 'done';

    public const STATUSES = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_IN_PROGRESS => 'В работе',
        self::STATUS_DONE => 'Завершён',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
