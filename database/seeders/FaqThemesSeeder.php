<?php
// database/seeders/FaqThemesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqTheme;

class FaqThemesSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            [
                'name' => 'Бетон',
                'slug' => 'concrete',
                'description' => 'Вопросы о марках, свойствах и применении бетона',
                'icon' => 'bi-droplet',
                'sort_order' => 1,
            ],
            [
                'name' => 'Автобетононасосы',
                'slug' => 'pumps',
                'description' => 'Вопросы об аренде и работе автобетононасосов',
                'icon' => 'bi-truck',
                'sort_order' => 2,
            ],
            [
                'name' => 'Доставка',
                'slug' => 'delivery',
                'description' => 'Вопросы о доставке бетона',
                'icon' => 'bi-truck-front',
                'sort_order' => 3,
            ],
            [
                'name' => 'Оплата',
                'slug' => 'payment',
                'description' => 'Вопросы об оплате и документах',
                'icon' => 'bi-credit-card',
                'sort_order' => 4,
            ],
        ];

        foreach ($themes as $theme) {
            FaqTheme::create($theme);
        }
    }
}