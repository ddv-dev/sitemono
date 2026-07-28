<?php
// database/seeders/AdditionalServicesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdditionalService;

class AdditionalServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Автобетонасос',
                'slug' => 'avtobetonasos',
                'description' => 'Доставка бетона с помощью автобетонасоса',
                'price' => 15000,
                'price_type' => 'fixed',
                'sort_order' => 1
            ],
            [
                'name' => 'Доставка',
                'slug' => 'dostavka',
                'description' => 'Доставка бетона на объект',
                'price' => 0,
                'price_type' => 'per_m3',
                'sort_order' => 2
            ],
        ];

        foreach ($services as $service) {
            AdditionalService::create($service);
        }
    }
}