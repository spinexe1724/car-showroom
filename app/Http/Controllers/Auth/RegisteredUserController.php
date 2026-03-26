<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
  public function store(Request $request)
{
    $request->validate([
        'clprnoktp' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'unique:users'],
        'password' => ['required', 'confirmed'],
        'no_telepon' => ['required', 'string'],
        
    ]);

    // Cek di table showrooms
    $showroom = \App\Models\Showroom::where('clprnoktp', $request->clprnoktp)->first();

    if (!$showroom) {
        return back()->withErrors(['clprnoktp' => 'Nomor KTP tidak terdaftar!'])->withInput();
    }

    // Buat User (Tanpa input nama manual)
    $user = \App\Models\User::create([
        'name' => $showroom->nmdealer, 
        'clprnoktp' => $request->clprnoktp,
        'email' => $request->email,
        'no_telepon' => $request->no_telepon,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('status', 'Registrasi berhasil, silakan login.');
}
}
