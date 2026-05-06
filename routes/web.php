<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Layanan\RentalCarController;
use App\Http\Controllers\Admin\Layanan\RentalMotorController;
use App\Http\Controllers\Admin\Layanan\VehiclePriceController;
use App\Models\Vehicle;
use App\Models\VehiclePrice;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', function () {
    return view('pages.layanan', [
        'rentalCars' => Vehicle::query()
            ->cars()
            ->active()
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(9, ['*'], 'fleet_page'),

        'rentalMotors' => Vehicle::query()
            ->motors()
            ->active()
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(8, ['*'], 'motor_page'),

        'vehiclePrices' => VehiclePrice::with('vehicle')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get(),
    ]);
})->name('layanan');
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

// Map existing AboutSectionController to admin.home.about routes (dashboard/home)
Route::middleware('auth')->prefix('dashboard/home')->name('admin.home.')->group(function () {
    Route::get('/about', [App\Http\Controllers\Admin\AboutSectionController::class, 'edit'])->name('about.index');
    Route::get('/about/edit', [App\Http\Controllers\Admin\AboutSectionController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [App\Http\Controllers\Admin\AboutSectionController::class, 'update'])->name('about.update');
    // Home Gallery resource
    Route::resource('/gallery', App\Http\Controllers\Admin\Home\GalleryController::class)->names('gallery');
    Route::patch('/gallery/{gallery}/toggle-status', [App\Http\Controllers\Admin\Home\GalleryController::class, 'toggleStatus'])->name('gallery.toggle-status');
    // Highlight services
    Route::get('/highlight-services', [App\Http\Controllers\Admin\Home\HighlightServiceController::class, 'index'])->name('highlight-services.index');
    Route::put('/highlight-services', [App\Http\Controllers\Admin\Home\HighlightServiceController::class, 'update'])->name('highlight-services.update');
});

Route::middleware('auth')->prefix('dashboard/layanan')->name('admin.layanan.')->group(function () {
    Route::resource('/rental-mobil', RentalCarController::class)->parameters(['rental-mobil' => 'vehicle'])->names('rental-mobil');
    Route::patch('/rental-mobil/{vehicle}/toggle-status', [RentalCarController::class, 'toggleStatus'])->name('rental-mobil.toggle-status');

    Route::resource('/rental-motor', RentalMotorController::class)->parameters(['rental-motor' => 'vehicle'])->names('rental-motor');
    Route::patch('/rental-motor/{vehicle}/toggle-status', [RentalMotorController::class, 'toggleStatus'])->name('rental-motor.toggle-status');

    Route::resource('/pricelist-mobil', VehiclePriceController::class)->parameters(['pricelist-mobil' => 'vehiclePrice'])->names('pricelist-mobil');
    Route::patch('/pricelist-mobil/{vehiclePrice}/toggle-status', [VehiclePriceController::class, 'toggleStatus'])->name('pricelist-mobil.toggle-status');
});


