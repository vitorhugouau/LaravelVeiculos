<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\VehicleController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;

Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/vehicles', [AdminVehicleController::class, 'index'])->name('admin.vehicles.index');
    Route::get('/admin/vehicles/create', [AdminVehicleController::class, 'create'])->name('admin.vehicles.create');
    Route::post('/admin/vehicles', [AdminVehicleController::class, 'store'])->name('admin.vehicles.store');
    Route::get('/admin/vehicles/{id}/edit', [AdminVehicleController::class, 'edit'])->name('admin.vehicles.edit');
    Route::put('/admin/vehicles/{id}', [AdminVehicleController::class, 'update'])->name('admin.vehicles.update');
    Route::delete('/admin/vehicles/{id}', [AdminVehicleController::class, 'destroy'])->name('admin.vehicles.destroy');
});
