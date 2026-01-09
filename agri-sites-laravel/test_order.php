<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== DATABASE STATUS ===\n\n";

// Get connection
$connection = \Illuminate\Support\Facades\DB::connection();

try {
    // Check if orders table exists
    $tables = $connection->select("SELECT name FROM sqlite_master WHERE type='table'");
    
    echo "Tables found:\n";
    foreach ($tables as $table) {
        echo "- " . $table->name . "\n";
    }
    
    // Try to create a test order
    echo "\n=== TESTING ORDER CREATION ===\n";
    
    $order = \App\Models\Order::create([
        'order_number' => 'TEST-' . uniqid(),
        'first_name' => 'Test',
        'last_name' => 'User',
        'email' => 'test@example.com',
        'phone' => '1234567890',
        'address' => 'Test St',
        'city' => 'TestCity',
        'state' => 'TS',
        'zip' => '12345',
        'country' => 'US',
        'notes' => '',
        'payment_method' => 'cod',
        'total_amount' => 100,
        'status' => 'pending',
    ]);
    
    echo "Order created successfully with ID: " . $order->id . "\n";
    echo "Order number: " . $order->order_number . "\n";
    
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Stack trace:\n";
    echo $e->getTraceAsString() . "\n";
}

echo "\n=== DONE ===\n";
?>
