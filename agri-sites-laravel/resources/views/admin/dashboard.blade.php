@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Dashboard</h4>
        <div class="d-flex align-items-center">
            <i class="bi bi-person-circle me-2"></i>
            <span>Admin</span>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <i class="bi bi-box-seam text-success fs-1 me-3"></i>
                    <div>
                        <h5 class="mb-1">Total Products</h5>
                        <h4 class="mb-0">{{ $products }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <i class="bi bi-receipt text-primary fs-1 me-3"></i>
                    <div>
                        <h5 class="mb-1">Total Orders</h5>
                        <h4 class="mb-0">{{ $totalOrders }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <i class="bi bi-currency-rupee text-warning fs-1 me-3"></i>
                    <div>
                        <h5 class="mb-1">Revenue</h5>
                        <h4 class="mb-0">₹{{ number_format($revenue, 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <i class="bi bi-people text-info fs-1 me-3"></i>
                    <div>
                        <h5 class="mb-1">Customers</h5>
                        <h4 class="mb-0">{{ $customers }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="mb-3">Quick Actions</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-2"></i>Add New Product
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-receipt me-2"></i>View All Orders
                    </a>
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-people me-2"></i>Manage Customers
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Recent Orders</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                <td>₹{{ number_format($order->total_amount, 2) }}</td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No recent orders</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
