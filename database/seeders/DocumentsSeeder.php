<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            ['ГОСТ 7473-2010', 'Соответствие стандарту'],
            ['Лицензия лаборатории', 'Аккредитация'],
            ['Сертификаты на сырьё', 'Щебень, цемент, песок'],
            ['Свидетельство о регистрации', 'ОГРН, ИНН'],
        ];

        foreach ($documents as $i => [$title, $subtitle]) {
            Document::updateOrCreate(
                ['title' => $title],
                ['subtitle' => $subtitle, 'is_active' => true, 'sort_order' => $i + 1]
            );
        }
    }
}
