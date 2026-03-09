<?php
require 'vendor/autoload.php';
use Rap2hpoutre\FastExcel\FastExcel;

// Gunakan folder public agar mudah diakses
$namaFile = 'public/dummy_mobil_30k.xlsx';

function carGenerator() {
    for ($i = 1; $i <= 30000; $i++) {
        yield [
            'vin'         => 'VIN' . str_pad($i, 14, '0', STR_PAD_LEFT),
            'id_showroom' => rand(1, 2),
            'merk'        => 'Toyota',
            'model'       => 'Avanza',
            'harga'       => rand(150, 500) * 1000000,
        ];
    }
}

echo "Memulai pembuatan file...\n";
(new FastExcel(carGenerator()))->export($namaFile);
echo "BERHASIL! File ada di: " . realpath($namaFile) . "\n";