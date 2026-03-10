<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportShowroomJob; // We will create this job next
use Illuminate\Support\Facades\Storage;

class ShowroomController extends Controller
{
    public function index()
    {
        // This will be the form for uploading showroom data
        return view('showrooms.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $path = $request->file('file')->store('temp');
        $fullPath = Storage::path($path);

        ImportShowroomJob::dispatch($fullPath);

        return back()->with('status', 'File showroom diterima! Data sedang diproses di latar belakang.');
    }
}
