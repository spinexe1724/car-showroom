<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowroomController; // <-- BARIS INI WAJIB ADA
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware('guest')->group(function () {
    // --- Rute Registrasi (Sudah dibuat sebelumnya) ---
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // --- Rute Login ---
    // Menampilkan halaman form login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // Proses autentikasi saat user menekan tombol login
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Rute Logout (Hanya bisa diakses jika sudah login)
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');

Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [CarController::class, 'upload'])->name('cars.import');

Route::get('/upload-showroom', [ShowroomController::class, 'index'])->name('showrooms.upload');
Route::post('/upload-showroom', [ShowroomController::class, 'upload'])->name('showrooms.import');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});


require __DIR__.'/auth.php';
