<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Rap2hpoutre\FastExcel\FastExcel;

$file = '/home/it_support/.openclaw/media/inbound/dealer---0308bc59-1fcf-44a8-aad5-db3b906a62df';
$collection = (new FastExcel)->import($file);
$firstRow = $collection->first();
header('Content-Type: application/json');
echo json_encode(array_keys($firstRow));
