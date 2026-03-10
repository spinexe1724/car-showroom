@extends('layouts.app')

@section('title', 'Mobilin - Find the Best Used Car')

@section('content')
<div class="relative min-h-screen bg-white">
    
    {{-- 1. HERO SECTION --}}
    <div class="relative h-[600px] w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=2000" 
             class="absolute inset-0 w-full h-full object-cover" alt="Hero Background">
        
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 container mx-auto px-6 pt-32 text-white">
            <div class="max-w-2xl">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                    Find the Best Used Car, <br>
                    Just a Tap Away.
                </h1>
                <p class="mt-6 text-lg opacity-90 max-w-sm">
                    Find the Car That Fits You. One Ride at a Time, Driving Your Future Today.
                </p>
            </div>
        </div>
    </div>

    {{-- 2. FLOATING SEARCH BOX --}}
    <div class="container mx-auto px-6 -mt-32 relative z-20">
        <div class="bg-white rounded-[40px] shadow-2xl p-8 md:p-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Find the Best Cars</h2>
            
            <form action="#" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Select Brand</label>
                        <input type="text" placeholder="Enter Brand" 
                               class="w-full bg-gray-100 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Price</label>
                        <select class="w-full bg-gray-100 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option>Price</option>
                            <option>Under 200jt</option>
                            <option>200jt - 500jt</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Condition</label>
                        <select class="w-full bg-gray-100 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option>Select Condition</option>
                            <option>New</option>
                            <option>Used</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Dealer Location</label>
                        <select class="w-full bg-gray-100 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option>Select Dealer Location</option>
                            <option>Jakarta</option>
                            <option>Surabaya</option>
                        </select>
                    </div>
                </div>

                <div class="mt-10 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-sm font-bold text-gray-800 mr-2">Type:</span>
                        @foreach(['SUV', 'Sedan', 'Hatchback', 'Coupe', 'Minivan', 'City Car', 'Truck', 'D-Cab'] as $type)
                            <button type="button" class="px-4 py-1.5 rounded-full border border-gray-200 text-xs font-medium hover:bg-black hover:text-white transition">
                                {{ $type }}
                            </a>
                        @endforeach
                    </div>
                    
                    <button type="submit" class="bg-[#244191] hover:bg-blue-900 text-white px-10 py-3 rounded-xl font-bold transition shadow-lg">
                        Search Properties
                    </button>
                </div>
            </form>
        </div>
    </div>
<br>
    {{-- 3. TYPE CARS SECTION --}}
    <div class="container mx-auto px-10 mb-24">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-900">Type Cars</h2>
                <p class="text-gray-500 text-sm mt-1">Pilih kategori mobil yang sesuai dengan kebutuhan Anda</p>
            </div>
            
            {{-- Navigation Arrows --}}
            <div class="flex gap-3">
                <button onclick="scrollSlider('type-slider', 'left')" class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center hover:bg-black hover:text-white transition shadow-sm bg-white">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button onclick="scrollSlider('type-slider', 'right')" class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition shadow-sm bg-white">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </div>

        {{-- Slider Container --}}
        <div id="type-slider" class="flex gap-6 overflow-x-auto scroll-smooth scrollbar-hide pb-4">
            @php
                $types = [
                    ['name' => 'SUV', 'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=500'],
                    ['name' => 'Sedan', 'image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=500'],
                    ['name' => 'Hatchback', 'image' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?q=80&w=500'],
                    ['name' => 'Coupe', 'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=500'],
                    ['name' => 'Minivan', 'image' => 'https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=500'],
                    ['name' => 'Electric', 'image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?q=80&w=500'],
                    ['name' => 'Truck', 'image' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=500'],
                ];
            @endphp

            @foreach($types as $type)
            <div class="flex-shrink-0 w-72 group cursor-pointer">
                <div class="relative h-48 rounded-[35px] overflow-hidden mb-4 shadow-sm border border-gray-100">
                    <img src="{{ $type['image'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 brightness-90 group-hover:brightness-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60 group-hover:opacity-40 transition"></div>
                    <div class="absolute bottom-6 left-8">
                        <span class="text-white font-bold text-lg tracking-wide">{{ $type['name'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Script Navigasi --}}
    <script>
        function scrollSlider(id, direction) {
            const slider = document.getElementById(id);
            const scrollAmount = 300; 
            if (direction === 'left') {
                slider.scrollLeft -= scrollAmount;
            } else {
                slider.scrollLeft += scrollAmount;
            }
        }
    </script>

    {{-- 2. ALL BRANDS SECTION (Full Width Background) --}}
    <div class="bg-[#f5f5f5] w-full py-16 mb-20"> {{-- Wrapper ini yang memberikan warna penuh ke ujung --}}
        <div class="container mx-auto px-10"> {{-- Container ini menjaga konten tetap di tengah --}}
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl font-black text-gray-900">All Brands</h2>
                <a href="#" class="text-[#244191] text-sm font-bold hover:underline">See all</a>
            </div>

            <div class="flex items-center gap-6 overflow-x-auto pb-4 scrollbar-hide">
                @php
                    $brands = [
                        ['name' => 'Toyota', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Toyota_logo_%28Red%29.svg/960px-Toyota_logo_%28Red%29.svg.png'],
                        ['name' => 'Honda', 'logo' => 'https://www.car-logos.org/wp-content/uploads/2011/09/honda.png'],
                        ['name' => 'Hyundai', 'logo' => 'https://e7.pngegg.com/pngimages/466/857/png-clipart-hyundai-motor-company-car-logo-hyundai-starex-hyundai-emblem-text.png'],
                        ['name' => 'Kia', 'logo' => 'https://e7.pngegg.com/pngimages/783/483/png-clipart-kia-motors-logo-symbol-design-kia-text-trademark.png'],
                        ['name' => 'Ford', 'logo' => 'https://www.citypng.com/public/uploads/preview/ford-logo-emblem-hd-png-70175169471401511cpxj0ogw.png'],
                        ['name' => 'Chevrolet', 'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLdpO9foQSpbs6ttn9Y1EdmxvEY9zekXkfNg&s'],
                        ['name' => 'Nissan', 'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3_4xRHQcnM4mRQ5Pj1GCnDBt3OcFGd7yu5A&s'],
                        ['name' => 'Mazda', 'logo' => 'https://fabrikbrands.com/wp-content/uploads/Mazda-Logo-1a-1155x770.png'],
                        ['name' => 'Subaru', 'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDut8Hm5EWuNmihBPvgnoFIqTPVWNzirDCzQ&s'],
                        ['name' => 'VW', 'logo' => 'https://toppng.com/uploads/preview/volkswagen-logo-vector-free-download-11574231715elzfikw8ap.png'],
                        ['name' => 'BMW', 'logo' => 'https://i.pinimg.com/1200x/9b/98/fe/9b98fe7973d0cb009e68fee1a586417a.jpg'],
                        ['name' => 'Mercedes', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/500px-Mercedes-Logo.svg.png'],
                    ];
                @endphp

                @foreach($brands as $brand)
                <div class="flex-shrink-0 group cursor-pointer text-center">
                    <div class="w-20 h-20 md:w-24 md:h-24 bg-white rounded-2xl flex items-center justify-center p-5 border border-transparent group-hover:border-[#244191] transition-all duration-300 mb-3 shadow-sm group-hover:shadow-md">
                        <img src="{{ $brand['logo'] }}" alt="{{ $brand['name'] }}" class="w-full h-full object-contain grayscale group-hover:grayscale-0 transition duration-300">
                    </div>
                    <span class="text-xs font-bold text-gray-500 group-hover:text-gray-900 transition">{{ $brand['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
   

    {{-- 4. CAR LIST GRID (Optional, following your original logic) --}}
    <div class="container mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($cars as $car)
                <div class="group cursor-pointer">
                    <div class="bg-white rounded-[35px] p-5 mb-4 shadow-sm group-hover:shadow-xl transition-all border border-gray-100">
                        <div class="w-full aspect-video rounded-[25px] overflow-hidden mb-4">
                            <img src="{{ $car->image_path }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">{{ $car->brand }} {{ $car->model }}</h3>
                                <p class="text-blue-600 font-black mt-1">Rp {{ number_format($car->price / 1000000, 0) }}jt</p>
                            </div>
                            <a href="{{ route('cars.show', $car->id) }}" class="bg-gray-100 hover:bg-black hover:text-white px-4 py-2 rounded-full text-xs font-bold transition">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Include Footer --}}
    @include('layouts.footer')
</div>
@endsection