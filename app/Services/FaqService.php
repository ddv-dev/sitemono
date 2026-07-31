<?php
// app/Services/FaqService.php

namespace App\Services;

use App\Models\FaqTheme;
use App\Models\Faq;
use Illuminate\Support\Collection;

class FaqService
{
    /**
     * Получить все темы FAQ
     */
    public function getThemes(): Collection
    {
        return FaqTheme::with(['activeFaqs'])
            ->active()
            ->ordered()
            ->get();
    }

    /**
     * Получить FAQ по слагу темы
     */
    public function getFaqsByThemeSlug(string $slug): Collection
    {
        $theme = FaqTheme::where('slug', $slug)
            ->with(['activeFaqs'])
            ->first();

        return $theme ? $theme->activeFaqs : collect();
    }

    /**
     * Получить тему по слагу
     */
    public function getThemeBySlug(string $slug): ?FaqTheme
    {
        return FaqTheme::where('slug', $slug)
            ->with(['activeFaqs'])
            ->first();
    }

    /**
     * Получить все активные FAQ (без фильтрации по теме)
     */
    public function getAllFaqs(): Collection
    {
        return Faq::with(['theme'])
            ->active()
            ->ordered()
            ->get()
            ->groupBy('theme.name');
    }
}