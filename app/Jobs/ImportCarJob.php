<?php

namespace App\Jobs;

use App\Services\InventoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportCarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

public function handle(\App\Services\InventoryService $service)
{
    // Cek dulu apakah filenya benar-benar ada di folder
    if (!file_exists($this->filePath)) {
        throw new \Exception("File tidak ditemukan di path: " . $this->filePath);
    }

    // Jalankan import
    $service->syncExcel($this->filePath);

    // Hapus file HANYA SETELAH SELESAI
    if (file_exists($this->filePath)) {
        unlink($this->filePath);
    }
}
    
}