<?php

namespace Database\Seeders;

use App\Models\WorkObject;
use Illuminate\Database\Seeder;

class ObjectsSeeder extends Seeder
{
    public function run(): void
    {
        $objects = [
            ['ЖК «Новый берег» — монолитные перекрытия', 'residential', 'Мытищи', 2400, [['grade' => 'М300', 'year' => '2023'], ['grade' => 'М350', 'year' => '2023']]],
            ['Ленточный фундамент коттеджа 12×14 м', 'private', 'Пушкино', 18, [['grade' => 'М300', 'year' => '2024']]],
            ['Логистический центр «Восток» — фундаментная плита', 'industrial', 'Балашиха', 5800, [['grade' => 'М400', 'year' => '2023']]],
            ['Реконструкция дороги Подольск–Климовск', 'roads', 'Подольск', 1200, [['grade' => 'М350', 'year' => '2022']]],
            ['ТЦ «Северный» — парковочный подиум', 'commercial', 'Химки', 900, [['grade' => 'М300', 'year' => '2023']]],
            ['ЖК «Домодедово парк» — монолитный каркас', 'residential', 'Домодедово', 3100, [['grade' => 'М350', 'year' => '2024']]],
            ['Стяжка пола и отмостка — дача 200 м²', 'private', 'Королёв', 22, [['grade' => 'М200', 'year' => '2024']]],
            ['Производственный цех — монолитные колонны', 'industrial', 'Ногинск', 780, [['grade' => 'М400', 'year' => '2022']]],
            ['Парковочная площадка торгового центра', 'roads', 'Щёлково', 340, [['grade' => 'М300', 'year' => '2023']]],
            ['ЖК «Раменский» — подземный паркинг', 'residential', 'Раменское', 1650, [['grade' => 'М350 (водоупорный)', 'year' => '2023']]],
            ['Офисный комплекс — фундаментная плита', 'commercial', 'Одинцово', 420, [['grade' => 'М300', 'year' => '2024']]],
            ['Монолитное перекрытие жилого дома 2 этажа', 'private', 'Жуковский', 45, [['grade' => 'М300', 'year' => '2024']]],
        ];

        foreach ($objects as $i => [$title, $category, $city, $volume, $marks]) {
            WorkObject::updateOrCreate(
                ['title' => $title],
                [
                    'category' => $category,
                    'city' => $city,
                    'volume' => $volume,
                    'marks' => $marks,
                    'is_active' => true,
                    'sort_order' => $i + 1,
                ]
            );
        }
    }
}
