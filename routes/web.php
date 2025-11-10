<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\VehicleController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('vehicles')->name('vehicles.')->group(function () {
        Route::get('/', [AdminVehicleController::class, 'index'])->name('index');
        Route::get('/create', [AdminVehicleController::class, 'create'])->name('create');
        Route::post('/', [AdminVehicleController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminVehicleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminVehicleController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminVehicleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('brands')->name('brands.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/', [BrandController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BrandController::class, 'update'])->name('update');
        Route::delete('/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('models')->name('models.')->group(function () {
        Route::get('/', [ModelController::class, 'index'])->name('index');
        Route::get('/create', [ModelController::class, 'create'])->name('create');
        Route::post('/', [ModelController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ModelController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ModelController::class, 'update'])->name('update');
        Route::delete('/{id}', [ModelController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('colors')->name('colors.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('/create', [ColorController::class, 'create'])->name('create');
        Route::post('/', [ColorController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ColorController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ColorController::class, 'update'])->name('update');
        Route::delete('/{id}', [ColorController::class, 'destroy'])->name('destroy');
    });
});
