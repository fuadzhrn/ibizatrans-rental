<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/layanan', 'pages.layanan')->name('layanan');
Route::view('/paket-tour', 'pages.paket-tour')->name('paket-tour');

