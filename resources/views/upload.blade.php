<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data Mobil - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-4">

    <div class="max-w-xl w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-gray-800">Sinkronisasi Data Mobil</h1>
            <p class="text-gray-500 mt-2 text-sm">Upload file Excel (.xlsx) untuk memperbarui stok 30.000+ unit secara otomatis.</p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded-r-lg">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded-r-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.import') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div class="border-2 border-dashed border-gray-300 rounded-xl p-10 flex flex-col items-center justify-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        
        <p id="file-chosen" class="text-sm text-gray-600 font-medium text-center">Klik untuk pilih file atau seret file ke sini</p>
        <p class="text-xs text-gray-400 mt-1">Hanya mendukung .xlsx atau .csv</p>
        
        <input type="file" name="file" id="file-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
    </div>

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg">
        Mulai Proses Import
    </button>
</form>
        <div class="mt-8 pt-6 border-t border-gray-100">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">Informasi Penting:</h3>
            <ul class="text-xs text-gray-500 space-y-2 list-disc list-inside">
                <li>Sistem akan memproses data di latar belakang (Background Job).</li>
                <li>Mobil yang tidak ada dalam file Excel akan otomatis ditandai <b>Nonaktif</b>.</li>
                <li>Pastikan kolom Excel berisi: <code class="bg-gray-100 px-1 rounded">vin</code>, <code class="bg-gray-100 px-1 rounded">id_showroom</code>, <code class="bg-gray-100 px-1 rounded">merk</code>, <code class="bg-gray-100 px-1 rounded">model</code>, <code class="bg-gray-100 px-1 rounded">harga</code>.</li>
            </ul>
        </div>
    </div>

    <a href="{{ route('cars.index') }}" class="mt-6 text-sm text-blue-600 hover:underline">← Kembali ke Daftar Mobil</a>

</body>
<script>
    const fileInput = document.getElementById('file-input');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            // Tampilkan nama file yang dipilih
            fileChosen.innerHTML = "File terpilih: <br><span class='text-blue-600 font-bold'>" + this.files[0].name + "</span>";
            fileChosen.classList.add('text-blue-600');
        } else {
            fileChosen.textContent = "Klik untuk pilih file atau seret file ke sini";
        }
    });
</script>
</html>