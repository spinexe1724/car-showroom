@extends('layouts.app')

@section('title', $car->brand . ' ' . $car->model . ' - Mobilin')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    {{-- Top Navbar spacing (assuming standard app layout) --}}
    <div class="h-20 bg-white shadow-sm"></div>

    <div class="container mx-auto px-4 md:px-10 py-8">
        {{-- Breadcrumb --}}
        <nav class="flex text-sm text-gray-500 mb-6">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('cars.index') }}" class="hover:text-blue-600 transition flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('cars.index') }}" class="ml-1 hover:text-blue-600 transition">Mobil Bekas</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-gray-800 font-medium">{{ $car->brand }} {{ $car->model }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Main Content Layout --}}
        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- Left Column: Images & Specs --}}
            <div class="w-full lg:w-2/3">
                {{-- Main Image Gallery Card --}}
                <div class="bg-white rounded-2xl p-4 shadow-sm mb-6">
                    <div class="w-full h-[400px] md:h-[500px] rounded-xl overflow-hidden relative bg-gray-100">
                        <img src="{{ $car->image_path }}" alt="{{ $car->brand }} {{ $car->model }}" class="w-full h-full object-contain md:object-cover">
                        {{-- Tag --}}
                        <div class="absolute top-4 left-4 bg-[#244191] text-white text-xs font-bold px-3 py-1.5 rounded-md uppercase tracking-wide shadow-md">
                            Tersedia
                        </div>
                    </div>
                    
                    {{-- Thumbnails (Dummy for now) --}}
                    <div class="flex gap-3 mt-4 overflow-x-auto pb-2 scrollbar-hide">
                        @for($i=0; $i<4; $i++)
                        <div class="w-24 h-20 rounded-lg overflow-hidden border-2 {{ $i==0 ? 'border-[#244191]' : 'border-transparent' }} cursor-pointer hover:border-[#244191] transition flex-shrink-0">
                            <img src="{{ $car->image_path }}" class="w-full h-full object-cover">
                        </div>
                        @endfor
                    </div>
                </div>

                {{-- Specs & Description Card --}}
                <div class="bg-white rounded-2xl p-6 md:p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 border-b pb-4 mb-6">Informasi Kendaraan</h2>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-4 mb-8">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Merek</span>
                            <span class="text-sm font-bold text-gray-900">{{ $car->brand }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Model</span>
                            <span class="text-sm font-bold text-gray-900">{{ $car->model }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Tahun</span>
                            <span class="text-sm font-bold text-gray-900">{{ rand(2015, 2023) }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Transmisi</span>
                            <span class="text-sm font-bold text-gray-900">Automatic</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Bahan Bakar</span>
                            <span class="text-sm font-bold text-gray-900">Bensin</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Kilometer</span>
                            <span class="text-sm font-bold text-gray-900">{{ number_format(rand(10000, 80000)) }} KM</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Warna</span>
                            <span class="text-sm font-bold text-gray-900">Hitam</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">No. Rangka (VIN)</span>
                            <span class="text-sm font-bold text-gray-900">{{ $car->vin ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <h2 class="text-xl font-bold text-gray-900 border-b pb-4 mb-4 mt-10">Deskripsi</h2>
                    <div class="text-gray-600 text-sm leading-relaxed space-y-3">
                        <p>Mobil <strong>{{ $car->brand }} {{ $car->model }}</strong> kondisi sangat terawat dan siap pakai. Servis rutin di bengkel resmi, tidak pernah tabrakan atau kebanjiran.</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Surat-surat lengkap (BPKB, STNK, Faktur)</li>
                            <li>Pajak hidup dan panjang</li>
                            <li>Kaki-kaki senyap, AC dingin menggigil</li>
                            <li>Interior bersih dan wangi bebas asap rokok</li>
                        </ul>
                        <p class="mt-4 text-xs italic text-gray-400">ID Mobil: #{{ $car->id }} | Ditambahkan: {{ $car->created_at ? $car->created_at->format('d M Y') : '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Right Column: Pricing & Action Box --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl shadow-lg border-t-4 border-[#244191] p-6 sticky top-24">
                    <h1 class="text-2xl md:text-3xl font-black text-gray-900 leading-tight mb-2">
                        {{ $car->brand }} {{ $car->model }}
                    </h1>
                    
                    <div class="flex items-center gap-2 mb-6">
                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-medium">Bebas Kecelakaan</span>
                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-medium">Lulus Inspeksi</span>
                    </div>

                    <div class="border-b border-gray-100 pb-6 mb-6">
                        <p class="text-sm text-gray-500 font-medium mb-1">Harga Tunai</p>
                        <h2 class="text-4xl font-black text-[#e31837]">
                            Rp {{ number_format($car->price, 0, ',', '.') }}
                        </h2>
                        <p class="text-xs text-gray-400 mt-2">*Harga masih bisa nego di tempat</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <button class="w-full bg-[#25D366] hover:bg-[#20b858] text-white py-3.5 rounded-xl font-bold text-md flex justify-center items-center gap-2 transition-colors shadow-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            Tanya via WhatsApp
                        </button>
                        <button class="w-full bg-white border-2 border-[#244191] text-[#244191] hover:bg-gray-50 py-3 rounded-xl font-bold text-md transition-colors">
                            Simpan / Favorit
                        </button>
                    </div>

                    <div class="border-t border-gray-100 pt-5 mt-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                <span class="material-icons text-gray-500">store</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Showroom Pusat</p>
                                <p class="text-xs text-gray-500">DKI Jakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
