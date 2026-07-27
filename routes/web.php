<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/beton', 'pages.beton')->name('beton');
Route::view('/nasos', 'pages.nasos')->name('nasos');
Route::view('/ceny', 'pages.ceny')->name('ceny');
Route::view('/dostavka', 'pages.dostavka')->name('dostavka');
Route::view('/chastnym-klientam', 'pages.chastnym')->name('chastnym');
Route::view('/companiyam', 'pages.companiyam')->name('companiyam');
Route::view('/o-zavode', 'pages.o-zavode')->name('o-zavode');
Route::view('/portfolio', 'pages.portfolio')->name('portfolio');
Route::view('/zimniy-beton', 'pages.zimniy-beton')->name('zimniy-beton');
Route::view('/kontakty', 'pages.kontakty')->name('kontakty');

// ГЕО-страница (шаблон по городам МО)
Route::get('/beton/{city}', function (string $city) {
    $cities = [
        'odintsovo' => 'Одинцово',
        'mytishchi' => 'Мытищи',
        'balashikha' => 'Балашиха',
        'himki' => 'Химки',
        'podolsk' => 'Подольск',
    ];
    abort_unless(isset($cities[$city]), 404);

    return view('pages.geo', ['city' => $cities[$city], 'slug' => $city]);
})->name('geo');

// Заявка / обратный звонок
Route::view('/callback', 'pages.callback')->name('callback');
