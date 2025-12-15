<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

Route::get('/', [RegistrationController::class, 'index'])->name('registration');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/success', [RegistrationController::class, 'success'])->name('registration.success');

// Dashboard Routes (في الواقع يجب أن تكون محمية بـ Auth، لكن للتجربة سنتركها مفتوحة)
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/application/{application}', [DashboardController::class, 'show'])->name('application.show');
    Route::post('/application/{application}/status', [DashboardController::class, 'updateStatus'])->name('application.status');
    Route::delete('/application/{application}', [DashboardController::class, 'destroy'])->name('application.destroy');
});
