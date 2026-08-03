<?php

namespace Database\Seeders;

use App\Models\FactoryPhoto;
use Illuminate\Database\Seeder;

class FactoryPhotosSeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            'Производственная линия',
            'Лаборатория',
            'Автопарк',
        ];

        foreach ($photos as $i => $title) {
            FactoryPhoto::updateOrCreate(
                ['title' => $title],
                ['is_active' => true, 'sort_order' => $i + 1]
            );
        }
    }
}
