<?php
// app/Http/Controllers/PriceController.php

namespace App\Http\Controllers;

use App\Models\ConcretePrice;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Отображение страницы со всеми ценами
     *
     * @return \Illuminate\View\View
     */
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

        $types = ConcreteType::active()->ordered()->get();
        $grades = ConcreteGrade::active()->ordered()->get();

        return view('prices', compact('prices', 'types', 'grades'));
    }
}
