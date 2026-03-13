<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\SearchProfileController;
use App\Http\Controllers\TrackingResultController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alumni', AlumniController::class);
    Route::resource('tracking-results', TrackingResultController::class);

    Route::get('/verifikasi', [VerificationController::class, 'index'])->name('verifikasi.index');
    Route::put('/verifikasi/{id}', [VerificationController::class, 'update'])->name('verifikasi.update');

    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
});

require __DIR__.'/auth.php';
