<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use App\Models\ConcretePrice;

class ConcretePricesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Создаем типы бетона
        $types = [
            ['name' => 'Строительный раствор', 'slug' => 'stroitelnyy-rastvor', 'sort_order' => 1],
            ['name' => 'Тощий бетон', 'slug' => 'toshiy-beton', 'sort_order' => 2],
            ['name' => 'Бетон на щебне из гравия', 'slug' => 'beton-na-shchebne-iz-graviya', 'sort_order' => 3],
        ];

        foreach ($types as $typeData) {
            ConcreteType::create($typeData);
        }

        // 2. Создаем марки бетона
        $grades = [
            ['name' => 'M100', 'class' => 'B7.5', 'sort_order' => 1],
            ['name' => 'M150', 'class' => 'B12.5', 'sort_order' => 2],
            ['name' => 'M200', 'class' => 'B15', 'sort_order' => 3],
            ['name' => 'M250', 'class' => 'B20', 'sort_order' => 4],
            ['name' => 'M300', 'class' => 'B22.5', 'sort_order' => 5],
            ['name' => 'M350', 'class' => 'B25', 'sort_order' => 6],
            ['name' => 'M400', 'class' => 'B30', 'sort_order' => 7],
        ];

        foreach ($grades as $gradeData) {
            ConcreteGrade::create($gradeData);
        }

        // 3. Создаем цены
        $prices = [
            // Строительный раствор
            ['type' => 'Строительный раствор', 'grade' => 'M100', 'price_cash' => 4700],
            ['type' => 'Строительный раствор', 'grade' => 'M150', 'price_cash' => 5000],
            ['type' => 'Строительный раствор', 'grade' => 'M200', 'price_cash' => 5300],
            ['type' => 'Строительный раствор', 'grade' => 'M250', 'price_cash' => 5600],
            ['type' => 'Строительный раствор', 'grade' => 'M300', 'price_cash' => 5800],
            // Тощий бетон
            ['type' => 'Тощий бетон', 'grade' => 'M100', 'price_cash' => 4900],
            ['type' => 'Тощий бетон', 'grade' => 'M150', 'price_cash' => 5100],
            ['type' => 'Тощий бетон', 'grade' => 'M200', 'price_cash' => 5300],
            ['type' => 'Тощий бетон', 'grade' => 'M250', 'price_cash' => 5500],
            // Бетон на щебне из гравия
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M100', 'price_cash' => 5200],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M150', 'price_cash' => 5400],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M200', 'price_cash' => 5600],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M250', 'price_cash' => 5800],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M300', 'price_cash' => 6000],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M350', 'price_cash' => 6200],
            ['type' => 'Бетон на щебне из гравия', 'grade' => 'M400', 'price_cash' => 6600],
        ];

        foreach ($prices as $priceData) {
            $type = ConcreteType::where('name', $priceData['type'])->first();
            $grade = ConcreteGrade::where('name', $priceData['grade'])->first();

            if ($type && $grade) {
                ConcretePrice::create([
                    'concrete_type_id' => $type->id,
                    'concrete_grade_id' => $grade->id,
                    'price_cash' => $priceData['price_cash'],
                    'price_non_cash' => round($priceData['price_cash'] * 1.05),
                    'price_nds' => round($priceData['price_cash'] * 1.2),
                ]);
            }
        }
    }
}