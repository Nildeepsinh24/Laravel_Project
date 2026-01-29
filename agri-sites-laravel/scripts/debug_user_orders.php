<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Order;

// Find Neeldeepsinh Jadeja
$user = User::where('email', 'neel@gmail.com')->first();
if (!$user) {
    echo "User not found\n";
    exit(1);
}

echo "USER INFO\n";
echo "id: {$user->id}\n";
echo "name: {$user->name}\n";
echo "email: {$user->email}\n";
echo "is_admin: {$user->is_admin}\n";

echo "\nORDERS linked to user (via relationship):\n";
$orders = $user->orders()->get();
echo "count: {$orders->count()}\n";
foreach ($orders as $o) {
    echo "- id: {$o->id}, order_number: {$o->order_number}, user_id: {$o->user_id}\n";
}

echo "\nDirect query for orders with user_id = {$user->id}:\n";
$directOrders = Order::where('user_id', $user->id)->get();
echo "count: {$directOrders->count()}\n";
foreach ($directOrders as $o) {
    echo "- id: {$o->id}, order_number: {$o->order_number}, user_id: {$o->user_id}\n";
}

echo "\nCheck orders 6 and 7:\n";
$o6 = Order::find(6);
$o7 = Order::find(7);
echo "Order 6: user_id={$o6->user_id}, first_name={$o6->first_name}, last_name={$o6->last_name}\n";
echo "Order 7: user_id={$o7->user_id}, first_name={$o7->first_name}, last_name={$o7->last_name}\n";
