@extends('layouts.app')

@section('title', 'Partner Details - Gratama Dealer')

@section('content')
<div class="relative w-full bg-[#F8F9FA] font-['Plus_Jakarta_Sans'] min-h-screen">
    
    <div class="pt-28 md:pt-36 pb-12 bg-[#800000]">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-black text-white tracking-tight">Showroom Profile.</h1>
            <p class="text-white/60 text-sm uppercase tracking-widest mt-2">Detailed Information for {{ $user->name }}</p>
        </div>
    </div>

    <div class="container mx-auto px-6 -mt-10 pb-20">
        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- KIRI: Ringkasan Utama --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100 sticky top-28">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-red-100 rounded-3xl flex items-center justify-center mb-4">
                            <span class="text-red-700 font-black text-4xl">{{ $showroom->inisial ?? 'G' }}</span>
                        </div>
                        <h2 class="text-2xl font-black text-slate-900">{{ $showroom->nmdealer ?? $user->name }}</h2>
                        <p class="text-slate-500 font-medium text-sm">{{ $user->email }}</p>
                    </div>

                    <div class="mt-8 space-y-3">
                        <div class="flex justify-between p-3 bg-slate-50 rounded-xl">
                            <span class="text-slate-400 text-[10px] font-black uppercase">Kode Cabang</span>
                            <span class="text-slate-900 font-bold text-xs">{{ $showroom->kdcab ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between p-3 bg-slate-50 rounded-xl">
                            <span class="text-slate-400 text-[10px] font-black uppercase">Inisial</span>
                            <span class="text-slate-900 font-bold text-xs">{{ $showroom->inisial ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN: Detail Informasi --}}
            <div class="w-full lg:w-2/3 space-y-6">
                
                {{-- Card 1: Informasi Dasar & Alamat --}}
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-red-700 rounded-full mr-3"></span>
                        Showroom Identity & Address
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase mb-1 block">Nama Pemilik (CNM)</label>
                            <p class="text-slate-900 font-bold">{{ $showroom->cnm ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase mb-1 block">Kota</label>
                            <p class="text-slate-900 font-bold">{{ $showroom->kota ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase mb-1 block">Alamat Lengkap (Excel)</label>
                            <p class="text-slate-900 font-bold leading-relaxed">{{ $showroom->alamat ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase mb-1 block">Alamat Detail 1 (AD1)</label>
                            <p class="text-slate-700 text-sm">{{ $showroom->ad1 ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase mb-1 block">Alamat Detail 2 (AD2)</label>
                            <p class="text-slate-700 text-sm">{{ $showroom->ad2 ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Periode Kerjasama (DLMOU) --}}
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-slate-300 rounded-full mr-3"></span>
                        Contract Period (MOU)
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="p-4 bg-red-50 rounded-2xl border border-red-100">
                            <label class="text-[9px] font-black text-red-400 uppercase mb-1 block">MOU Date (DLMOU)</label>
                            <p class="text-red-900 font-black">{{ $showroom->dlmou}}</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <label class="text-[9px] font-black text-slate-400 uppercase mb-1 block">Valid From</label>
                            <p class="text-slate-900 font-black">{{ $showroom->dlmoutglfr ? \Carbon\Carbon::parse($showroom->dlmoutglfr)->format('d M Y') : '-' }}</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <label class="text-[9px] font-black text-slate-400 uppercase mb-1 block">Valid Until</label>
                            <p class="text-slate-900 font-black">{{ $showroom->dlmoutglto ? \Carbon\Carbon::parse($showroom->dlmoutglto)->format('d M Y') : '-' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection