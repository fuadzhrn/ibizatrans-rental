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
Route::get('/paket-tour', function () {
    return view('pages.paket-tour', [
        'tourPackages' => \App\Models\TourPackage::with([
            'destinations' => fn ($q) => $q->orderBy('sort_order'),
            'prices' => fn ($q) => $q->orderBy('sort_order'),
            'facilities' => fn ($q) => $q->orderBy('sort_order'),
            'itineraries' => fn ($q) => $q->orderBy('sort_order'),
        ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get(),

        'tourFaqs' => \App\Models\TourFaq::where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get(),
    ]);
})->name('paket-tour');
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

// Paket Tour admin routes
Route::middleware('auth')->prefix('dashboard/paket-tour')->name('admin.paket-tour.')->group(function () {
    Route::resource('/packages', App\Http\Controllers\Admin\PaketTour\TourPackageController::class)->names('packages');
    Route::patch('/packages/{tourPackage}/toggle-status', [App\Http\Controllers\Admin\PaketTour\TourPackageController::class, 'toggleStatus'])->name('packages.toggle-status');

    Route::post('/packages/{tourPackage}/destinations', [App\Http\Controllers\Admin\PaketTour\TourDestinationController::class, 'store'])->name('destinations.store');
    Route::put('/destinations/{tourDestination}', [App\Http\Controllers\Admin\PaketTour\TourDestinationController::class, 'update'])->name('destinations.update');
    Route::delete('/destinations/{tourDestination}', [App\Http\Controllers\Admin\PaketTour\TourDestinationController::class, 'destroy'])->name('destinations.destroy');

    Route::post('/packages/{tourPackage}/prices', [App\Http\Controllers\Admin\PaketTour\TourPriceController::class, 'store'])->name('prices.store');
    Route::put('/prices/{tourPrice}', [App\Http\Controllers\Admin\PaketTour\TourPriceController::class, 'update'])->name('prices.update');
    Route::delete('/prices/{tourPrice}', [App\Http\Controllers\Admin\PaketTour\TourPriceController::class, 'destroy'])->name('prices.destroy');

    Route::post('/packages/{tourPackage}/facilities', [App\Http\Controllers\Admin\PaketTour\TourFacilityController::class, 'store'])->name('facilities.store');
    Route::put('/facilities/{tourFacility}', [App\Http\Controllers\Admin\PaketTour\TourFacilityController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{tourFacility}', [App\Http\Controllers\Admin\PaketTour\TourFacilityController::class, 'destroy'])->name('facilities.destroy');

    Route::post('/packages/{tourPackage}/itineraries', [App\Http\Controllers\Admin\PaketTour\TourItineraryController::class, 'store'])->name('itineraries.store');
    Route::put('/itineraries/{tourItinerary}', [App\Http\Controllers\Admin\PaketTour\TourItineraryController::class, 'update'])->name('itineraries.update');
    Route::delete('/itineraries/{tourItinerary}', [App\Http\Controllers\Admin\PaketTour\TourItineraryController::class, 'destroy'])->name('itineraries.destroy');

    Route::resource('/faqs', App\Http\Controllers\Admin\PaketTour\TourFaqController::class)->names('faqs');
    Route::patch('/faqs/{tourFaq}/toggle-status', [App\Http\Controllers\Admin\PaketTour\TourFaqController::class, 'toggleStatus'])->name('faqs.toggle-status');
});


