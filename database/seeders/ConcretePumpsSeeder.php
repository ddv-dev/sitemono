<?php
// database/seeders/ConcretePumpsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConcretePump;

class ConcretePumpsSeeder extends Seeder
{
    public function run(): void
    {
        $pumps = [
            [
                'type' => 'АБН 24 м',
                'boom_length' => 24,
                'price_per_shift' => 28000,
                'application' => 'Частные дома, гаражи',
                'sort_order' => 1,
            ],
            [
                'type' => 'АБН 28 м',
                'boom_length' => 28,
                'price_per_shift' => 30000,
                'application' => 'Частные дома, малоэтажное',
                'sort_order' => 2,
            ],
            [
                'type' => 'АБН 32 м',
                'boom_length' => 32,
                'price_per_shift' => 32000,
                'application' => 'Малоэтажное строительство',
                'sort_order' => 3,
            ],
            [
                'type' => 'АБН 36 м',
                'boom_length' => 36,
                'price_per_shift' => 36000,
                'application' => '3–4 этажа',
                'sort_order' => 4,
            ],
            [
                'type' => 'АБН 42 м',
                'boom_length' => 42,
                'price_per_shift' => 42000,
                'application' => '5–6 этажей',
                'sort_order' => 5,
            ],
            [
                'type' => 'АБН 46 м',
                'boom_length' => 46,
                'price_per_shift' => 46000,
                'application' => '6–7 этажей',
                'sort_order' => 6,
            ],
            [
                'type' => 'АБН 52 м',
                'boom_length' => 52,
                'price_per_shift' => 52000,
                'application' => 'Высотное строительство',
                'sort_order' => 7,
            ],
            [
                'type' => 'АБН 56 м',
                'boom_length' => 56,
                'price_per_shift' => 56000,
                'application' => 'Высотное строительство',
                'sort_order' => 8,
            ],
            [
                'type' => 'АБН 62 м',
                'boom_length' => 62,
                'price_per_shift' => 62000,
                'application' => 'Промышленные объекты',
                'sort_order' => 9,
            ],
            [
                'type' => 'АБН 65 м',
                'boom_length' => 65,
                'price_per_shift' => 65000,
                'application' => 'Промышленные объекты',
                'sort_order' => 10,
            ],
            [
                'type' => 'АБН 68 м',
                'boom_length' => 68,
                'price_per_shift' => 68000,
                'application' => 'Крупные промышленные объекты',
                'sort_order' => 11,
            ],
        ];

        foreach ($pumps as $pump) {
            ConcretePump::create($pump);
        }
    }
}