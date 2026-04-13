<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TrackingResultController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Debug route sementara untuk cek login production
|--------------------------------------------------------------------------
| Hapus route ini setelah login sudah berhasil.
*/
Route::get('/debug-login-check', function () {
    $email = 'ahmadzaky05@webmail.umm.ac.id';
    $plain = 'password';

    $user = User::where('email', $email)->first();

    return response()->json([
        'user_found' => (bool) $user,
        'email' => $user?->email,
        'password_hash' => $user?->password,
        'hash_check' => $user ? Hash::check($plain, $user->password) : null,
        'auth_attempt' => Auth::attempt([
            'email' => $email,
            'password' => $plain,
        ]),
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alumni', AlumniController::class);
    Route::resource('tracking-results', TrackingResultController::class);

    Route::get('/verifikasi', [VerificationController::class, 'index'])->name('verifikasi.index');
    Route::put('/verifikasi/{id}', [VerificationController::class, 'update'])->name('verifikasi.update');

    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
});

require __DIR__ . '/auth.php';
