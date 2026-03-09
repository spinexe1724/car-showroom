<?php

namespace App\Services;

use App\Models\Car;
use App\Models\Showroom;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryService
{
    /**
     * Sinkronisasi data mobil dari file Excel ke Database.
     */
    public function syncExcel($filePath)
    {
        // Array untuk mencatat semua VIN yang ada di file Excel terbaru
        $vinsInFile = [];

        try {
            DB::transaction(function () use ($filePath, &$vinsInFile) {
                $batch = [];
                $batchSize = 1000; // Ukuran paket data

                // Tambahkan $batchSize ke dalam 'use' agar terbaca di dalam fungsi
                (new FastExcel)->import($filePath, function ($line) use (&$batch, &$vinsInFile, $batchSize) {
                    
                    if (empty($line['vin'])) {
                        return;
                    }

                    // Opsional: Pastikan Showroom ID ada di database agar tidak error Foreign Key
                    // Showroom::firstOrCreate(['id' => $line['id_showroom']], ['name' => 'Auto Showroom', 'city' => 'Unknown']);

                    $vinsInFile[] = $line['vin'];

                    $batch[] = [
                        'vin'         => (string) $line['vin'],
                        'showroom_id' => (int) $line['id_showroom'],
                        'brand'       => (string) $line['merk'],
                        'model'       => (string) $line['model'],
                        'price'       => (int) $line['harga'],
                        'is_active'   => true,
                        'updated_at'  => now(),
                        'created_at'  => now(),
                    ];

                    // Eksekusi upsert jika batch sudah mencapai 1000
                    if (count($batch) >= $batchSize) {
                        $this->upsertToDatabase($batch);
                        $batch = []; 
                    }
                });

                // Masukkan sisa data yang tidak genap 1000
                if (!empty($batch)) {
                    $this->upsertToDatabase($batch);
                }

                // SINKRONISASI: Nonaktifkan mobil yang tidak ada di file Excel terbaru
                Car::whereNotIn('vin', $vinsInFile)->update(['is_active' => false]);
                
                Log::info("Sinkronisasi Berhasil: " . count($vinsInFile) . " unit diproses.");
            });
        } catch (\Exception $e) {
            Log::error("Gagal Sinkronisasi Excel: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Melakukan perintah Upsert ke Database.
     */
    private function upsertToDatabase(array $data)
    {
        Car::upsert($data, ['vin'], ['price', 'is_active', 'updated_at']);
    }
}