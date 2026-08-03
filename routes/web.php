<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\PumpsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SitemapController;

// Маршруты для калькулятора (API)
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::post('/calculator/get-price', [CalculatorController::class, 'getPrice'])->name('calculator.get-price');

// Страница с ценами на бетон (используем PriceController)
Route::get('/prices', [PriceController::class, 'index'])->name('prices');

// Страница с автобетононасосами (используем PumpsController)
Route::get('/pumps', [PumpsController::class, 'index'])->name('pumps');

// Страница «Доставка» (статическая — данные в шаблоне)
Route::view('/delivery', 'delivery')->name('delivery');

// Страница «Зимний бетон»
Route::view('/winter-concrete', 'winter')->name('winter');

// Политика обработки персональных данных (152-ФЗ) — статическая страница
Route::view('/privacy-policy', 'privacy')->name('privacy');

// Страница «Объекты» (реализованные объекты из БД)
Route::get('/objects', [ObjectController::class, 'index'])->name('objects');

// Страница «Компаниям» (B2B)
Route::get('/companies', [ObjectController::class, 'companies'])->name('companies');

// Приём заявок со всех форм сайта
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Отдача загруженных файлов (фото объектов, документы) через PHP —
// надёжнее симлинка public/storage, который на многих хостингах отдаёт 403.
Route::get('/media/{path}', function (string $path) {
    $disk = Storage::disk('public');
    abort_unless($disk->exists($path), 404);

    return $disk->response($path, null, [
        'Cache-Control' => 'public, max-age=604800',
    ]);
})->where('path', '.*')->name('media');

// Карта сайта
Route::get('/sitemap.xml', [SitemapController::class, 'xml'])->name('sitemap.xml');
Route::get('/sitemap', [SitemapController::class, 'html'])->name('sitemap');

// Основные страницы (через CalculatorController)
Route::get('/', [CalculatorController::class, 'index'])->name('home')->defaults('page', 'home');
Route::get('/concrete', [CalculatorController::class, 'index'])->name('concrete')->defaults('page', 'concrete');
Route::get('/about', [CalculatorController::class, 'index'])->name('about')->defaults('page', 'about');
Route::get('/contacts', [CalculatorController::class, 'index'])->name('contacts')->defaults('page', 'contacts');
Route::get('/callback', [CalculatorController::class, 'index'])->name('callback')->defaults('page', 'callback');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/api', [FaqController::class, 'getByTheme'])->name('faq.api');
Route::get('/faq/api/all', [FaqController::class, 'getAll'])->name('faq.api.all');
