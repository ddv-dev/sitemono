<?php
// app/Http/Controllers/SitemapController.php

namespace App\Http\Controllers;

class SitemapController extends Controller
{
    /** Список публичных страниц: [route, priority, changefreq]. */
    protected function pages(): array
    {
        return [
            ['home', '1.0', 'daily'],
            ['concrete', '0.9', 'weekly'],
            ['pumps', '0.9', 'weekly'],
            ['winter', '0.7', 'monthly'],
            ['delivery', '0.8', 'weekly'],
            ['prices', '0.9', 'weekly'],
            ['objects', '0.7', 'weekly'],
            ['companies', '0.7', 'monthly'],
            ['about', '0.6', 'monthly'],
            ['contacts', '0.6', 'monthly'],
            ['privacy', '0.3', 'yearly'],
        ];
    }

    /** sitemap.xml для поисковых систем. */
    public function xml()
    {
        $lastmod = now()->toAtomString();

        $urls = collect($this->pages())->map(fn ($p) => [
            'loc' => route($p[0]),
            'lastmod' => $lastmod,
            'priority' => $p[1],
            'changefreq' => $p[2],
        ])->all();

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }

    /** Человекочитаемая карта сайта. */
    public function html()
    {
        $labels = [
            'home' => 'Главная',
            'concrete' => 'Бетон с доставкой',
            'pumps' => 'Аренда автобетононасоса',
            'winter' => 'Зимний бетон',
            'delivery' => 'Доставка по МО',
            'prices' => 'Цены',
            'objects' => 'Наши объекты',
            'companies' => 'Компаниям',
            'about' => 'О заводе',
            'contacts' => 'Контакты',
            'privacy' => 'Политика обработки персональных данных',
        ];

        $links = collect($this->pages())->map(fn ($p) => [
            'url' => route($p[0]),
            'title' => $labels[$p[0]] ?? $p[0],
        ])->all();

        return view('sitemap-page', compact('links'));
    }
}
