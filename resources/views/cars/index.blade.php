<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Marketplace Mobil Showroom</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cars as $car)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <img src="{{ $car->image_url }}" class="w-full h-48 object-cover bg-gray-200" alt="Mobil">
                    
                    <div class="p-4">
                        <h2 class="font-semibold text-lg text-gray-900">{{ $car->brand }} {{ $car->model }}</h2>
                        <p class="text-red-600 font-bold mt-1">Rp {{ number_format($car->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-500 mt-2">VIN: {{ $car->vin }}</p>
                        
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Showroom ID: {{ $car->showroom_id }}</span>
                            <button class="text-sm text-blue-600 font-medium hover:underline">Detail</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $cars->links() }}
        </div>
    </div>
</body>
</html>