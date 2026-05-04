<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/layanan', 'pages.layanan')->name('layanan');

