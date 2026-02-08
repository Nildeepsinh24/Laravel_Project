@extends('admin.layouts.app')

@section('title','Order Details')

@section('content')
<style>
.premium-header {
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.premium-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
    border-radius: 50%;
}

.header-title {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    position: relative;
    z-index: 1;
}

.header-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0.5rem 0 0 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.premium-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    margin-bottom: 2rem;
}

.premium-card .card-header {
    background: rgba(20, 184, 166, 0.08);
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
    border-radius: 12px 12px 0 0;
    padding: 1.5rem;
    margin: -2rem -2rem 1.5rem -2rem;
}

.premium-card .card-header h5 {
    color: var(--og-primary);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.95rem;
}

.detail-label {
    color: var(--og-muted);
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.detail-value {
    color: var(--og-text);
    font-size: 1rem;
    font-weight: 500;
}

.order-items-table {
    width: 100%;
    border-collapse: collapse;
}

.order-items-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.order-items-table tbody td {
    padding: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    color: var(--og-text);
}

.back-btn {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    transition: all 0.3s ease;
}

.back-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
}

.summary-total {
    background: rgba(20, 184, 166, 0.1);
    padding: 1.5rem;
    border-radius: 12px;
    margin-top: 1rem;
}

.total-row {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(20, 184, 166, 0.1);
}

.total-row:last-child {
    border-bottom: none;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--og-primary);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section class="hero-section" data-aos="fade-up">
    <div class="container-fluid p-0">
        <div class="premium-header">
            <div class="text-center">
                <h1 class="header-title">Order Details</h1>
                <p class="header-subtitle">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container-fluid">
        <div class="mb-4">
            <a href="{{ route('admin.orders.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Orders</span>
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="premium-card">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div style="padding: 0;">
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

                <div class="premium-card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Items</h5>
                    </div>
                    <div style="padding: 0;">
                        @if($order->items->count() > 0)
                            <div class="table-responsive">
                                <table class="order-items-table">
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

                            <div class="summary-total">
                                <div class="total-row">
                                    <span>Subtotal:</span>
                                    <span>₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Tax:</span>
                                    <span>₹{{ number_format($order->tax_amount ?? 0, 2) }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Order Total:</span>
                                    <span>₹{{ number_format($order->total_amount, 2) }}</span>
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
                <div class="premium-card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div style="padding: 0;">
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
