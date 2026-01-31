@extends('admin.layouts.app')

@section('title','Customer Details')

@section('content')
<section class="hero-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content text-center">
                    <h1 class="hero-title">Customer Details</h1>
                    <p class="hero-subtitle">{{ $customer->name }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Customers
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $customer->orders->count() }}</h5>
                        <p class="card-text">Total Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title text-success">₹{{ number_format($customer->orders->sum('total_amount'), 2) }}</h5>
                        <p class="card-text">Total Spent</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title text-info">
                            @if($customer->orders->count() > 0)
                                ₹{{ number_format($customer->orders->sum('total_amount') / $customer->orders->count(), 2) }}
                            @else
                                ₹0
                            @endif
                        </h5>
                        <p class="card-text">Avg Order Value</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <p class="mb-0">{{ $customer->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <p class="mb-0">{{ $customer->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Member Since</label>
                                    <p class="mb-0">{{ $customer->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Account Status</label>
                                    <p class="mb-0">
                                        @if($customer->email_verified_at)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Unverified</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="mailto:{{ $customer->email }}" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Send Email
                            </a>
                            <button class="btn btn-outline-secondary" disabled>
                                <i class="fas fa-user-edit me-2"></i>Edit Customer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Order History</h5>
                    </div>
                    <div class="card-body">
                        @if($customer->orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th class="text-end">Amount</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer->orders as $order)
                                        <tr>
                                            <td class="fw-semibold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="text-end fw-bold">₹{{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                @if($order->status === 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($order->status === 'processing')
                                                    <span class="badge bg-primary">Processing</span>
                                                @else
                                                    <span class="badge bg-warning">{{ ucfirst($order->status ?? 'Pending') }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5 text-muted">
                                <p class="mb-0">No orders yet</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
