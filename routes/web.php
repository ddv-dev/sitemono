<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::post('/calculator/get-price', [CalculatorController::class, 'getPrice'])->name('calculator.get-price');

Route::get('/', [CalculatorController::class, 'index'])->name('home')->defaults('page', 'home');
Route::get('/concrete', [CalculatorController::class, 'index'])->name('concrete')->defaults('page', 'concrete');
Route::get('/pumps', [CalculatorController::class, 'index'])->name('pumps')->defaults('page', 'pumps');
Route::get('/prices', [CalculatorController::class, 'index'])->name('prices')->defaults('page', 'prices');
Route::get('/about', [CalculatorController::class, 'index'])->name('about')->defaults('page', 'about');
Route::get('/contacts', [CalculatorController::class, 'index'])->name('contacts')->defaults('page', 'contacts');
Route::get('/callback', [CalculatorController::class, 'index'])->name('callback')->defaults('page', 'callback');