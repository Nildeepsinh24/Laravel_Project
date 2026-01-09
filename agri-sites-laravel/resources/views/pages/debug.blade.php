@extends('layouts.app')

@section('title', 'Debug - Database Status')

@section('content')
<section id="about-hiro-section">
    <div class="container-fluid p-0">
        <div class="row shop-single-main-row">
            <h1 class="abt-hiro-head">Database Debug</h1>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Database Tables</h3>
                <pre>
<?php
$tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name");
echo "Tables found:\n";
foreach ($tables as $table) {
    echo "- " . $table->name . "\n";
}
?>
                </pre>

                <h3 class="mt-4">Try Creating a Test Order</h3>
                <pre>
<?php
try {
    $order = \App\Models\Order::create([
        'order_number' => 'DEBUG-' . uniqid(),
        'first_name' => 'Debug',
        'last_name' => 'Test',
        'email' => 'debug@test.com',
        'phone' => '1234567890',
        'address' => 'Test St',
        'city' => 'TestCity',
        'state' => 'TS',
        'zip' => '12345',
        'country' => 'US',
        'payment_method' => 'cod',
        'total_amount' => 99.99,
        'status' => 'pending',
    ]);
    echo "✓ Order created successfully!\n";
    echo "Order ID: " . $order->id . "\n";
    echo "Order Number: " . $order->order_number . "\n";
} catch (\Exception $e) {
    echo "✗ ERROR creating order:\n";
    echo $e->getMessage() . "\n";
}
?>
                </pre>

                <a href="{{ route('shop') }}" class="btn btn-primary mt-3">Back to Shop</a>
            </div>
        </div>
    </div>
</section>
@endsection
