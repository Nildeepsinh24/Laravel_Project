<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $orders = Order::count();
        $customers = User::where('is_admin', false)->count();
        $revenue = Order::sum('total_amount') ?? 0;
        
        // Recent orders
        $recentOrders = Order::with('user')->orderBy('id', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('products', 'orders', 'customers', 'revenue', 'recentOrders'));
    }
}
