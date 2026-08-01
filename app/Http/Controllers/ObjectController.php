<?php
// app/Http/Controllers/ObjectController.php

namespace App\Http\Controllers;

use App\Models\WorkObject;

class ObjectController extends Controller
{
    /**
     * Страница «Объекты» — сетка реализованных объектов с фильтром по категориям.
     */
    public function index()
    {
        $objects = WorkObject::active()->ordered()->get();

        $categories = WorkObject::CATEGORIES;

        return view('objects', compact('objects', 'categories'));
    }

    /**
     * Страница «Компаниям» (B2B). Показывает последние реализованные объекты.
     */
    public function companies()
    {
        $objects = WorkObject::active()->ordered()->limit(4)->get();

        return view('companies', compact('objects'));
    }
}
