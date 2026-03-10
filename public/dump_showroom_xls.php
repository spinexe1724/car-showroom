<?php

require __DIR__.'/../vendor/autoload.php';

use Rap2hpoutre\FastExcel\FastExcel;

$file = 'C:\\xampps\\htdocs\\car-marketplace\\storage\\app\\temp\\dealer.xlsx';
try {
    $collection = (new FastExcel)->import($file);
    $firstRow = $collection->first();
    header('Content-Type: application/json');
    echo json_encode(array_keys($firstRow));
} catch (\\Exception $e) {
    header('Content-Type: text/plain');
    echo "Error reading Excel file: " . $e->getMessage();
}
