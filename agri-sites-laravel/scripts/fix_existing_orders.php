<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use Illuminate\Support\Facades\DB;

$taxRate = config('cart.tax_rate', 0);
$orders = Order::with('items')->where(function($q){ $q->whereNull('subtotal')->orWhere('subtotal', 0); })->get();
if($orders->isEmpty()){
    echo "No orders need fixing.\n";
    exit(0);
}

foreach($orders as $order){
    $sumItems = DB::table('order_items')->where('order_id', $order->id)->sum('total_price');
    $sumItems = (float) $sumItems;
    if($sumItems <= 0){
        echo "Order {$order->id} has no item totals; skipping.\n";
        continue;
    }
    // Prefer to compute tax as difference if total_amount already present
    $computedTax = round((float)$order->total_amount - $sumItems, 2);
    if($computedTax < 0){
        // fallback to configured tax rate
        $computedTax = round(($sumItems * $taxRate) / 100, 2);
        $newTotal = round($sumItems + $computedTax, 2);
    } else {
        $newTotal = (float) $order->total_amount;
    }

    $order->subtotal = $sumItems;
    $order->tax_amount = $computedTax;
    // keep total_amount as-is if it looks correct; otherwise update
    if(abs($order->total_amount - $newTotal) > 0.01){
        $order->total_amount = $newTotal;
    }
    $order->save();
    echo "Fixed order {$order->id}: subtotal={$order->subtotal}, tax={$order->tax_amount}, total={$order->total_amount}\n";
}
