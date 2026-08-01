<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Приём заявки с любой формы сайта.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^[\d\s\-\+\(\)]+$/', function ($attribute, $value, $fail) {
                $digits = preg_replace('/\D+/', '', (string) $value);
                if (strlen($digits) < 10 || strlen($digits) > 11) {
                    $fail('Укажите корректный номер телефона.');
                }
            }],
            'message' => ['nullable', 'string', 'max:2000'],
            'source' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'topic' => ['nullable', 'string', 'max:255'],
            'volume' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'company' => ['nullable', 'string', 'max:255'],
            'inn' => ['nullable', 'string', 'max:50'],
        ], [
            'phone.required' => 'Укажите номер телефона.',
            'phone.regex' => 'Укажите корректный номер телефона.',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Дополнительные поля складываем в meta
        $meta = collect($request->only(['email', 'topic', 'volume', 'address', 'company', 'inn']))
            ->filter(fn ($v) => filled($v))
            ->all();

        Order::create([
            'name' => $validated['name'] ?? null,
            'phone' => $validated['phone'],
            'message' => $validated['message'] ?? null,
            'source' => $validated['source'] ?? 'Сайт',
            'meta' => $meta ?: null,
            'status' => Order::STATUS_NEW,
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Заявка принята! Перезвоним в течение 4 минут.',
            ]);
        }

        return back()->with('order_success', 'Заявка принята! Перезвоним в течение 4 минут.');
    }
}
