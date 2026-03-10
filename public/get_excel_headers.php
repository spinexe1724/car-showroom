<?php
require __DIR__.'/../vendor/autoload.php';

use Rap2hpoutre\FastExcel\FastExcel;

$filePath = 'C:\\xampps\\htdocs\\car-marketplace\\storage\\app\\temp\\dealer.xlsx';

try {
    if (!file_exists($filePath)) {
        echo "Error: File not found at " . $filePath;
        exit;
    }
    $collection = (new FastExcel)->import($filePath);
    if ($collection->isNotEmpty()) {
        header('Content-Type: application/json');
        echo json_encode(array_keys($collection->first()));
    } else {
        echo "Error: Excel file is empty or could not read headers.";
    }
} catch (Exception $e) {
    echo "Error processing Excel file: " . $e->getMessage();
}
?>
