<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/layanan', 'pages.layanan')->name('layanan');
Route::get('/paket-tour', [PaketTourController::class, 'index'])->name('paket-tour');
Route::view('/contact', 'pages.contact')->name('contact');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Placeholder
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');

// Dashboard pages group (protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::view('/home', 'admin.pages.home')->name('dashboard.home');
    Route::view('/layanan', 'admin.pages.layanan')->name('dashboard.layanan');
    Route::view('/paket-tour', 'admin.pages.paket-tour')->name('dashboard.paket-tour');
    Route::view('/contact', 'admin.pages.contact')->name('dashboard.contact');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/edit', [AboutSectionController::class, 'edit'])->name('edit');
        Route::post('/update', [AboutSectionController::class, 'update'])->name('update');
    });
});


