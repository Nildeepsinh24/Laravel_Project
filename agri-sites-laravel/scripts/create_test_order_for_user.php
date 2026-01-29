<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

$user = User::first();
if (! $user) { echo "No users in DB\n"; exit(1); }
$product = Product::first();
if (! $product) { echo "No products in DB\n"; exit(1); }

$qty = 2;
$unit = (float) $product->sale_price;
$subtotal = round($unit * $qty, 2);
$taxRate = config('cart.tax_rate', 0);
$tax = round(($subtotal * $taxRate) / 100, 2);
$total = round($subtotal + $tax, 2);

$order = Order::create([
    'user_id' => $user->id,
    'order_number' => 'TEST-' . strtoupper(uniqid()),
    'first_name' => $user->name,
    'last_name' => '',
    'email' => $user->email,
    'phone' => '',
    'address' => 'Test address',
    'city' => 'Test',
    'state' => 'TS',
    'zip' => '00000',
    'country' => 'Testland',
    'notes' => 'Test order',
    'payment_method' => 'cod',
    'subtotal' => $subtotal,
    'tax_amount' => $tax,
    'total_amount' => $total,
    'status' => 'pending',
]);

OrderItem::create([
    'order_id' => $order->id,
    'product_name' => $product->name,
    'quantity' => $qty,
    'unit_price' => $unit,
    'total_price' => $subtotal,
]);

echo "Created test order {$order->id} for user {$user->id} (subtotal={$subtotal}, tax={$tax}, total={$total})\n";
