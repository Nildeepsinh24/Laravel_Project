@extends('admin.layouts.app')

@section('title','Order Details')

@section('content')
<section class="hero-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content text-center">
                    <h1 class="hero-title">Order Details</h1>
                    <p class="hero-subtitle">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Orders
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <p class="mb-0">{{ $order->user->name ?? ($order->first_name . ' ' . $order->last_name) }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <p class="mb-0">{{ $order->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Phone</label>
                                    <p class="mb-0">{{ $order->phone ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Delivery Address</label>
                            <p class="mb-0">
                                {{ $order->address ?? 'N/A' }}
                                @if($order->city), {{ $order->city }}@endif
                                @if($order->state), {{ $order->state }}@endif
                                @if($order->zip) {{ $order->zip }}@endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Items</h5>
                    </div>
                    <div class="card-body">
                        @if($order->items->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-end">Unit Price</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td class="fw-semibold">{{ $item->product_name ?? $item->product->name ?? 'Unknown Product' }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-end">₹{{ number_format($item->unit_price ?? 0, 2) }}</td>
                                            <td class="text-end fw-bold">₹{{ number_format($item->total_price ?? ($item->unit_price ?? 0) * $item->quantity, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-8 ms-auto">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="fw-bold">Subtotal:</span>
                                        <span>₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="fw-bold">Tax:</span>
                                        <span>₹{{ number_format($order->tax_amount ?? 0, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold fs-5">Order Total:</span>
                                        <span class="fs-5 text-primary fw-bold">₹{{ number_format($order->total_amount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5 text-muted">
                                <p class="mb-0">No items in this order</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Order Date</label>
                            <p class="mb-0">{{ $order->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Payment Method</label>
                            <p class="mb-0">{{ $order->payment_method ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Order Notes</label>
                            <p class="mb-0">{{ $order->notes ?? 'No notes' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
