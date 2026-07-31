<?php
// app/Http/Controllers/PriceController.php

namespace App\Http\Controllers;

use App\Models\ConcretePrice;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use App\Models\ConcretePump;
use App\Models\AdditionalService; // ← Добавить

class PriceController extends Controller
{
    public function index()
    {
        $prices = ConcretePrice::with(['type', 'grade'])
            ->active()
            ->get()
            ->map(function ($price) {
                return [
                    'id' => $price->id,
                    'type_name' => $price->type->name,
                    'grade_class' => $price->grade->class,
                    'grade_name' => $price->grade->name,
                    'price' => $price->price,
                    'formatted_price' => number_format($price->price, 0, ',', ' ') . ' ₽',
                ];
            });

        $pumps = ConcretePump::active()
            ->ordered()
            ->get()
            ->map(function ($pump) {
                return [
                    'id' => $pump->id,
                    'type' => $pump->type,
                    'boom_length' => $pump->boom_length,
                    'price_per_shift' => $pump->price_per_shift,
                    'formatted_price' => number_format($pump->price_per_shift, 0, ',', ' ') . ' ₽',
                    'application' => $pump->application,
                ];
            });

        $types = ConcreteType::active()->ordered()->get();
        $grades = ConcreteGrade::active()->ordered()->get();
        $services = AdditionalService::active()->ordered()->get(); // ← Добавить

        return view('prices', compact('prices', 'types', 'grades', 'pumps', 'services'));
    }
}