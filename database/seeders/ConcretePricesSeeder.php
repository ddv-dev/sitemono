<?php
// database/seeders/ConcretePricesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use App\Models\ConcretePrice;

class ConcretePricesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Получаем или создаем типы бетона
        $types = [
            'Строительный раствор' => ConcreteType::firstOrCreate(
                ['slug' => 'stroitelnyy-rastvor'],
                ['name' => 'Строительный раствор', 'sort_order' => 1]
            ),
            'Тощий бетон' => ConcreteType::firstOrCreate(
                ['slug' => 'toshiy-beton'],
                ['name' => 'Тощий бетон', 'sort_order' => 2]
            ),
            'Бетон на щебне из гравия' => ConcreteType::firstOrCreate(
                ['slug' => 'beton-na-shchebne-iz-graviya'],
                ['name' => 'Бетон на щебне из гравия', 'sort_order' => 3]
            ),
        ];

        // 2. Получаем или создаем марки бетона
        $grades = [
            'M100' => ConcreteGrade::firstOrCreate(
                ['name' => 'M100'],
                ['class' => 'B7.5', 'sort_order' => 1]
            ),
            'M150' => ConcreteGrade::firstOrCreate(
                ['name' => 'M150'],
                ['class' => 'B12.5', 'sort_order' => 2]
            ),
            'M200' => ConcreteGrade::firstOrCreate(
                ['name' => 'M200'],
                ['class' => 'B15', 'sort_order' => 3]
            ),
            'M250' => ConcreteGrade::firstOrCreate(
                ['name' => 'M250'],
                ['class' => 'B20', 'sort_order' => 4]
            ),
            'M300' => ConcreteGrade::firstOrCreate(
                ['name' => 'M300'],
                ['class' => 'B22.5', 'sort_order' => 5]
            ),
            'M350' => ConcreteGrade::firstOrCreate(
                ['name' => 'M350'],
                ['class' => 'B25', 'sort_order' => 6]
            ),
            'M400' => ConcreteGrade::firstOrCreate(
                ['name' => 'M400'],
                ['class' => 'B30', 'sort_order' => 7]
            ),
        ];

        // 3. Создаем цены (с полными названиями классов)
        $prices = [
            // Строительный раствор
            [
                'type' => 'Строительный раствор',
                'grade' => 'M100',
                'full_class' => 'Раствор строительный',
                'price' => 4700
            ],
            [
                'type' => 'Строительный раствор',
                'grade' => 'M150',
                'full_class' => 'Раствор строительный',
                'price' => 5000
            ],
            [
                'type' => 'Строительный раствор',
                'grade' => 'M200',
                'full_class' => 'Раствор строительный',
                'price' => 5300
            ],
            [
                'type' => 'Строительный раствор',
                'grade' => 'M250',
                'full_class' => 'Раствор строительный',
                'price' => 5600
            ],
            [
                'type' => 'Строительный раствор',
                'grade' => 'M300',
                'full_class' => 'Раствор строительный',
                'price' => 5800
            ],

            // Тощий бетон
            [
                'type' => 'Тощий бетон',
                'grade' => 'M100',
                'full_class' => 'БСГ В7,5Ж3Ф25W2',
                'price' => 4900
            ],
            [
                'type' => 'Тощий бетон',
                'grade' => 'M150',
                'full_class' => 'БСГ В10Ж3Ф25W4',
                'price' => 5100
            ],
            [
                'type' => 'Тощий бетон',
                'grade' => 'M200',
                'full_class' => 'БСГ В15Ж3Ф25W4',
                'price' => 5300
            ],
            [
                'type' => 'Тощий бетон',
                'grade' => 'M250',
                'full_class' => 'БСГ В15Ж3Ф25W4',
                'price' => 5500
            ],

            // Бетон на щебне из гравия
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M100',
                'full_class' => 'БСГ В7,5П4Ф25W2',
                'price' => 5200
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M150',
                'full_class' => 'БСГ В10П4Ф25W4',
                'price' => 5400
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M200',
                'full_class' => 'БСГ В15П4Ф25W4',
                'price' => 5600
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M250',
                'full_class' => 'БСГ В20П4Ф50W6',
                'price' => 5800
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M300',
                'full_class' => 'БСГ В22,5П4Ф50W6',
                'price' => 6000
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M350',
                'full_class' => 'БСГ В25П4Ф100W6',
                'price' => 6200
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M350',
                'full_class' => 'БСГ В25П4Ф100W6 (Полы)',
                'price' => 6500
            ],
            [
                'type' => 'Бетон на щебне из гравия',
                'grade' => 'M400',
                'full_class' => 'БСГ В30П4Ф100W6',
                'price' => 6600
            ],
        ];

        // 4. Сохраняем цены
        foreach ($prices as $priceData) {
            $type = $types[$priceData['type']] ?? null;
            $grade = $grades[$priceData['grade']] ?? null;

            if ($type && $grade) {
                // Обновляем full_name для марки
                $grade->full_name = $priceData['full_class'];
                $grade->save();

                // Создаем или обновляем цену
                ConcretePrice::updateOrCreate(
                    [
                        'concrete_type_id' => $type->id,
                        'concrete_grade_id' => $grade->id,
                    ],
                    [
                        'price' => $priceData['price'],
                        'is_active' => true,
                    ]
                );

                $this->command->info("✅ Цена сохранена: {$priceData['type']} - {$priceData['grade']} = {$priceData['price']} ₽");
            } else {
                $this->command->warn("⚠️ Не найдена комбинация: {$priceData['type']} - {$priceData['grade']}");
            }
        }

        $this->command->info("🎉 Сидер успешно выполнен!");
    }
}