<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\PumpsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ObjectController;

// Маршруты для калькулятора (API)
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::post('/calculator/get-price', [CalculatorController::class, 'getPrice'])->name('calculator.get-price');

// Страница с ценами на бетон (используем PriceController)
Route::get('/prices', [PriceController::class, 'index'])->name('prices');

// Страница с автобетононасосами (используем PumpsController)
Route::get('/pumps', [PumpsController::class, 'index'])->name('pumps');

// Страница «Доставка» (статическая — данные в шаблоне)
Route::view('/delivery', 'delivery')->name('delivery');

// Страница «Объекты» (реализованные объекты из БД)
Route::get('/objects', [ObjectController::class, 'index'])->name('objects');

// Страница «Компаниям» (B2B)
Route::get('/companies', [ObjectController::class, 'companies'])->name('companies');

// Основные страницы (через CalculatorController)
Route::get('/', [CalculatorController::class, 'index'])->name('home')->defaults('page', 'home');
Route::get('/concrete', [CalculatorController::class, 'index'])->name('concrete')->defaults('page', 'concrete');
Route::get('/about', [CalculatorController::class, 'index'])->name('about')->defaults('page', 'about');
Route::get('/contacts', [CalculatorController::class, 'index'])->name('contacts')->defaults('page', 'contacts');
Route::get('/callback', [CalculatorController::class, 'index'])->name('callback')->defaults('page', 'callback');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/api', [FaqController::class, 'getByTheme'])->name('faq.api');
Route::get('/faq/api/all', [FaqController::class, 'getAll'])->name('faq.api.all');
