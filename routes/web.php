<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pumps', function () {
    return view('home');
})->name('pumps');

Route::get('/prices', function () {
    return view('home');
})->name('prices');

Route::get('/about', function () {
    return view('home');
})->name('about');

Route::get('/contacts', function () {
    return view('home');
})->name('contacts');

Route::get('/callback', function () {
    return view('home');
})->name('callback');

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::post('/calculator/get-price', [CalculatorController::class, 'getPrice'])->name('calculator.get-price');