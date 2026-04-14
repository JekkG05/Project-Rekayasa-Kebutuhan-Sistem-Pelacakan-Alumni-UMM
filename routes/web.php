<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TrackingResultController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ImportAlumniController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

// Halaman awal, mengarahkan ke dashboard jika sudah login, jika tidak ke halaman login
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// Semua route berikut membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes untuk alumni dan tracking results
    Route::resource('alumni', AlumniController::class);
    Route::resource('tracking-results', TrackingResultController::class);

    // Route untuk import alumni
    Route::get('/import-alumni', [ImportAlumniController::class, 'index'])->name('import.alumni.index');
    Route::post('/import-alumni', [ImportAlumniController::class, 'store'])->name('import.alumni.store');

    // Verifikasi alumni
    Route::get('/verifikasi', [VerificationController::class, 'index'])->name('verifikasi.index');
    Route::put('/verifikasi/{id}', [VerificationController::class, 'update'])->name('verifikasi.update');

    // Route untuk laporan
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
});

// Menyertakan file route autentikasi
require __DIR__ . '/auth.php';
