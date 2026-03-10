<?php

namespace App\Jobs;

use App\Services\ShowroomService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ImportShowroomJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function handle(ShowroomService $service)
    {
        try {
            $service->syncExcel($this->filePath);
        } catch (\Exception $e) {
            // Log the error and potentially re-throw if the job should fail
            Log::error("ImportShowroomJob failed for file: {$this->filePath}. Error: {$e->getMessage()}");
            throw $e; // This will mark the job as failed and retry if configured
        }
    }
}
