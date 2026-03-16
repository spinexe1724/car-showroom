@extends('layouts.app')

@section('title', 'My Profile - Gratama Dealer')

@section('content')
<div class="relative w-full bg-[#F8F9FA] font-['Plus_Jakarta_Sans'] min-h-screen">
    
    {{-- Header Spacing --}}
    <div class="pt-28 md:pt-36 pb-12 bg-[#800000]">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-black text-white tracking-tight">Partner Profile.</h1>
            <p class="text-white/60 text-sm uppercase tracking-widest mt-2">Manage your account information</p>
        </div>
    </div>

    <div class="container mx-auto px-6 -mt-10 pb-20">
        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- KIRI: Ringkasan Profil --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-red-100 rounded-3xl flex items-center justify-center mb-4">
                            <span class="text-red-700 font-black text-4xl">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <h2 class="text-2xl font-black text-slate-900">{{ $user->name }}</h2>
                        <span class="px-4 py-1 bg-green-100 text-green-700 text-[10px] font-black uppercase tracking-tighter rounded-full mt-2">Verified Partner</span>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="p-4 bg-slate-50 rounded-2xl">
                            <p class="text-slate-400 text-[10px] font-bold uppercase">Showroom KTP</p>
                            <p class="text-slate-900 font-bold">{{ $user->clprnoktp }}</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl">
                            <p class="text-slate-400 text-[10px] font-bold uppercase">Contact Number</p>
                            <p class="text-slate-900 font-bold">{{ $user->no_telepon }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN: Detail & Settings --}}
            <div class="w-full lg:w-2/3 space-y-6">
                {{-- Account Details Card --}}
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-red-700 rounded-full mr-3"></span>
                        Account Details
                    </h3>
                    
                    <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase ml-2">Showroom Name</label>
                            <input type="text" value="{{ $user->name }}" disabled class="w-full bg-slate-100 border-none rounded-2xl px-6 py-4 font-bold text-slate-500 cursor-not-allowed">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase ml-2">Email Address</label>
                            <input type="email" value="{{ $user->email }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:ring-2 focus:ring-red-700 outline-none transition-all">
                        </div>

                        <div class="md:col-span-2 pt-4">
                            <button type="submit" class="bg-[#800000] hover:bg-red-900 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-red-900/20">
                                Update Information
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Security Card --}}
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-slate-300 rounded-full mr-3"></span>
                        Security Settings
                    </h3>
                    <p class="text-slate-500 text-sm mb-6">Pastikan password Anda kuat untuk menjaga keamanan data unit showroom Anda.</p>
                    <a href="#" class="inline-block text-red-700 font-black text-xs uppercase tracking-widest hover:text-red-900">Change Password →</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection