<?php

namespace App\Services;

use App\Models\Showroom;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ShowroomService
{
    public function syncExcel($filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception("File showroom tidak ditemukan di path: " . $filePath);
        }

        DB::beginTransaction();
        try {
            (new FastExcel)->import($filePath, function ($line) {
                // Map Excel columns to database fields
                $data = [
                    'kdcab' => $line['kdcab'] ?? null,
                    'inisial' => $line['inisial'] ?? null,
                    'nmdealer' => $line['nmdealer'] ?? null, // Mapping nmdealer to name
                    'cnm' => $line['cnm'] ?? null,
                    'ad1' => $line['ad1'] ?? null,
                    'ad2' => $line['ad2'] ?? null,
                    'kota' => $line['kota'] ?? null, // Mapping kota to city
                    'dlmou' => $line['dlmou'] ?? null,
                    'dlmoutglfr' => $line['dlmoutglfr'] ?? null,
                    'dlmoutglto' => $line['dlmoutglto'] ?? null,
                    'alamat' => $line['alamat'] ?? null,
                    'clprnoktp' => $line['clprnoktp'] ?? null,
                ];

                // Find by kdcab or create new
                Showroom::updateOrCreate(
                    ['clprnoktp' => $data['clprnoktp']],
                    $data
                );
            });
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Gagal Sinkronisasi Showroom Excel: " . $e->getMessage());
            throw $e; // Re-throw the exception to be caught by the job handler
        } finally {
            // Clean up the temporary file
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}
