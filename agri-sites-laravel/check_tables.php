<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get all tables
$tables = \Illuminate\Support\Facades\DB::connection()
    ->getDoctrineConnection()
    ->getSchemaManager()
    ->listTableNames();

echo "Tables in database:\n";
foreach ($tables as $table) {
    echo "- $table\n";
}

// Check orders table specifically
if (in_array('orders', $tables)) {
    echo "\nOrders table EXISTS!\n";
    $columns = \Illuminate\Support\Facades\DB::connection()->getSchemaBuilder()->getColumnListing('orders');
    echo "Columns: " . implode(', ', $columns) . "\n";
} else {
    echo "\nOrders table DOES NOT EXIST!\n";
}
?>
