<?php
// app/Http/Controllers/PumpsController.php

namespace App\Http\Controllers;

use App\Models\ConcretePump;

class PumpsController extends Controller  // ← Исправлено
{
    public function index()
    {
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

        return view('pumps', compact('pumps'));
    }
}