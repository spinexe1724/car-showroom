<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Jobs\ImportCarJob;
use Illuminate\Support\Facades\Storage; // <--- PINDAHKAN KE SINI (DI LUAR CLASS)

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('is_active', true)->latest()->paginate(20);
        return view('cars.index', compact('cars'));
    }

    
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function upload(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);

        // Simpan file ke folder temp
        $path = $request->file('file')->store('temp');
        
        // Laravel 11/12 secara default menyimpan di storage/app/private/temp
        // Kita gunakan Storage::path() agar sistem otomatis mencari alamat lengkapnya
        $fullPath = Storage::path($path);

        // Kirim alamat file ke Job
        ImportCarJob::dispatch($fullPath);

        return back()->with('status', 'File diterima! 30.000 data sedang diproses di latar belakang.');
    }
}