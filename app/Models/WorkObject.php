<?php
// app/Models/WorkObject.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WorkObject extends Model
{
    protected $table = 'objects';

    protected $fillable = [
        'title',
        'category',
        'city',
        'volume',
        'marks',
        'photo',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'marks' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Категории объектов: ключ => [полное название, короткая метка для бейджа].
     */
    public const CATEGORIES = [
        'private' => ['Частное строительство', 'Частное'],
        'residential' => ['Жилые комплексы', 'ЖК'],
        'industrial' => ['Промышленность', 'Промышленность'],
        'roads' => ['Дороги и инфраструктура', 'Дороги'],
        'commercial' => ['Коммерческая недвижимость', 'Коммерция'],
    ];

    public static function categoryOptions(): array
    {
        return collect(self::CATEGORIES)->mapWithKeys(
            fn ($labels, $key) => [$key => $labels[0]]
        )->all();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('id');
    }

    /** Полное название категории (для фильтра). */
    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category][0] ?? $this->category;
    }

    /** Короткая метка категории (для бейджа на карточке). */
    public function getCategoryBadgeAttribute(): string
    {
        return self::CATEGORIES[$this->category][1] ?? $this->category;
    }

    /** Строка марок: «М300, М350». */
    public function getMarksLineAttribute(): string
    {
        return collect($this->marks ?? [])
            ->pluck('grade')
            ->filter()
            ->unique()
            ->implode(', ');
    }

    /** Строка годов: «2023» или «2022, 2023». */
    public function getYearsLineAttribute(): string
    {
        return collect($this->marks ?? [])
            ->pluck('year')
            ->filter()
            ->unique()
            ->implode(', ');
    }

    /** Отформатированный объём: «1 200 м³». */
    public function getFormattedVolumeAttribute(): ?string
    {
        if ($this->volume === null) {
            return null;
        }

        return number_format($this->volume, 0, ',', ' ') . ' м³';
    }

    /** URL фото или null. */
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo ? Storage::disk('public')->url($this->photo) : null;
    }
}
