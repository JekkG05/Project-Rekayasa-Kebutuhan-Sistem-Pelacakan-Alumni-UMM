<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TrackingResultController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ImportAlumniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alumni', AlumniController::class);
    Route::resource('tracking-results', TrackingResultController::class);

    Route::get('/import-alumni', [ImportAlumniController::class, 'index'])->name('import.alumni.index');
    Route::post('/import-alumni', [ImportAlumniController::class, 'store'])->name('import.alumni.store');

    Route::get('/verifikasi', [VerificationController::class, 'index'])->name('verifikasi.index');
    Route::put('/verifikasi/{id}', [VerificationController::class, 'update'])->name('verifikasi.update');

    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
});

require __DIR__ . '/auth.php';
