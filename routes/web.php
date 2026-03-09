<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CarController::class, 'index'])->name('cars.index');

// Halaman form upload (untuk Admin/Showroom)
Route::get('/upload', function () {
    return view('upload'); // Pastikan Anda sudah membuat resources/views/upload.blade.php
});

// Proses upload file Excel
Route::post('/upload', [CarController::class, 'upload'])->name('cars.import');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
