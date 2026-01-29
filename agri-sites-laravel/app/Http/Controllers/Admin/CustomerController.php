<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::with('orders')
            ->where('is_admin', '!=', true)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $customer)
    {
        $customer->load('orders.items');
        return view('admin.customers.show', compact('customer'));
    }
}
