<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketTourController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/layanan', 'pages.layanan')->name('layanan');
Route::get('/paket-tour', [PaketTourController::class, 'index'])->name('paket-tour');
Route::view('/contact', 'pages.contact')->name('contact');

