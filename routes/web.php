<?php

use Illuminate\Support\Facades\Route;

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