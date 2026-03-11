<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\AuthController;

// Custom Public Routes
Route::get('/login', function () {
    return view('auth.login'); // Sesuaikan dengan lokasi file login.blade.php Anda
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

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
});

require __DIR__.'/auth.php';
