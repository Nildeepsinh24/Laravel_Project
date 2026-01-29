<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\User;

$o = Order::with('items','user')->latest()->first();
if (!$o) {
    echo "No orders found\n";
    exit(0);
}

echo "ORDER\n";
echo "id: {$o->id}\n";
echo "order_number: {$o->order_number}\n";
echo "subtotal: {$o->subtotal}\n";
echo "tax: {$o->tax_amount}\n";
echo "total: {$o->total_amount}\n";
echo "items:\n";
foreach ($o->items as $i) {
    echo "- name: {$i->product_name}, qty: {$i->quantity}, unit: {$i->unit_price}, total: {$i->total_price}\n";
}
if ($o->user) {
    echo "customer id: {$o->user->id}, name: {$o->user->name}, email: {$o->user->email}\n";
} else {
    echo "customer: guest\n";
}

$customerId = $o->user_id ?? null;
if ($customerId) {
    $c = User::find($customerId);
    echo "\nCustomer summary\n";
    echo "orders_count: {$c->orders()->count()}\n";
    echo "total_spent: {$c->orders()->sum('total_amount')}\n";
}
