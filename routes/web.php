<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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