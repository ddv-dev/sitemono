<?php
// app/Http/Controllers/CalculatorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConcreteType;
use App\Models\ConcreteGrade;
use App\Models\ConcretePrice;
use App\Models\AdditionalService;

class CalculatorController extends Controller
{
    public function index()
    {
        $types = ConcreteType::active()->ordered()->get();
        $grades = ConcreteGrade::active()->ordered()->get();
        $services = AdditionalService::active()->ordered()->get();

        // Возвращаем главную страницу с калькулятором
        return view('home', compact('types', 'grades', 'services'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:concrete_types,id',
            'grade_id' => 'required|exists:concrete_grades,id',
            'volume' => 'required|numeric|min:0.5|max:1000',
            'services' => 'array',
            'services.*' => 'exists:additional_services,id'
        ]);

        $price = ConcretePrice::where('concrete_type_id', $request->type_id)
            ->where('concrete_grade_id', $request->grade_id)
            ->active()
            ->first();

        if (!$price) {
            return response()->json([
                'error' => 'Цена для выбранной комбинации не найдена'
            ], 404);
        }

        $basePrice = $price->price * $request->volume;
        $servicesPrice = 0;
        $selectedServices = [];

        if ($request->has('services')) {
            $services = AdditionalService::whereIn('id', $request->services)->get();

            foreach ($services as $service) {
                if ($service->price_type === 'per_m3') {
                    $servicePrice = $service->price * $request->volume;
                } else {
                    $servicePrice = $service->price;
                }
                $servicesPrice += $servicePrice;
                $selectedServices[] = [
                    'name' => $service->name,
                    'price' => $servicePrice
                ];
            }
        }

        $totalPrice = $basePrice + $servicesPrice;

        return response()->json([
            'success' => true,
            'data' => [
                'base_price' => $basePrice,
                'services_price' => $servicesPrice,
                'selected_services' => $selectedServices,
                'total_price' => $totalPrice,
                'formatted_base_price' => number_format($basePrice, 0, ',', ' ') . ' ₽',
                'formatted_total_price' => number_format($totalPrice, 0, ',', ' ') . ' ₽',
                'price_per_m3' => number_format($price->price, 0, ',', ' ') . ' ₽/м³',
                'grade_name' => $price->grade->name,
                'grade_class' => $price->grade->class,
            ]
        ]);
    }
}