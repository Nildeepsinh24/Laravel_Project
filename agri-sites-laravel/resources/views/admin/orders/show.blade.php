@extends('admin.layouts.app')

@section('title','Order Details')

@section('content')
<style>
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
    .order-show-container {
        max-width: 900px;
        animation: fadeInUp 0.6s ease;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 700;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    .back-btn:hover {
        background: linear-gradient(135deg, #5568d3 0%, #4652ba 100%);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    .order-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        animation: fadeInUp 0.6s ease 0.1s both;
    }
    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        padding: 24px;
        color: white;
    }
    .card-header h4, .card-header h5 {
        color: white;
        margin: 0;
        font-weight: 800;
    }
    .card-body {
        padding: 28px;
    }
    .customer-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }
    .info-field {
        margin-bottom: 16px;
    }
    .info-label {
        color: #718096;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .info-value {
        color: #1a202c;
        font-weight: 600;
        font-size: 15px;
    }
    .status-badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }
    .status-badge.pending {
        background: #fef3c7;
        color: #92400e;
    }
    .status-badge.completed {
        background: #d1fae5;
        color: #065f46;
    }
    .status-badge.processing {
        background: #dbeafe;
        color: #1e40af;
    }
    .items-table {
        width: 100%;
        border-collapse: collapse;
    }
    .items-table thead {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
        border-bottom: 2px solid #e2e8f0;
    }
    .items-table th {
        padding: 14px 16px;
        text-align: left;
        color: #2d3748;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .items-table td {
        padding: 16px;
        border-bottom: 1px solid #e2e8f0;
        color: #2d3748;
    }
    .items-table tbody tr:hover {
        background: #f7fafc;
    }
    .product-name {
        font-weight: 600;
        color: #667eea;
    }
    .total-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e2e8f0;
        display: flex;
        justify-content: flex-end;
        gap: 40px;
        align-items: center;
    }
    .total-label {
        color: #718096;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
    }
    .total-amount {
        font-size: 28px;
        font-weight: 800;
        color: #667eea;
    }
</style>

<div class="order-show-container">
    <a href="{{ route('admin.orders.index') }}" class="back-btn">← Back to Orders</a>

    <div class="order-card">
        <div class="card-header">
            <h4>Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h4>
        </div>
        <div class="card-body">
            <h5 style="color: #1a202c; font-weight: 700; margin-bottom: 20px;">Customer Information</h5>
            
            <div class="customer-grid">
                <div>
                    <div class="info-field">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $order->user->name ?? ($order->first_name . ' ' . $order->last_name) }}</div>
                    </div>
                    <div class="info-field">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">{{ $order->email }}</div>
                    </div>
                </div>
                <div>
                    <div class="info-field">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $order->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="info-field">
                        <div class="info-label">Order Status</div>
                        <div class="info-value">
                            @if($order->status === 'completed')
                                <span class="status-badge completed">Completed</span>
                            @elseif($order->status === 'processing')
                                <span class="status-badge processing">Processing</span>
                            @else
                                <span class="status-badge pending">{{ ucfirst($order->status ?? 'Pending') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-field" style="margin-top: 20px;">
                <div class="info-label">Delivery Address</div>
                <div class="info-value">
                    {{ $order->address ?? 'N/A' }}
                    @if($order->city), {{ $order->city }}@endif
                    @if($order->state), {{ $order->state }}@endif
                    @if($order->zip) {{ $order->zip }}@endif
                </div>
            </div>
        </div>
    </div>

    <div class="order-card">
        <div class="card-header">
            <h5>Order Items</h5>
        </div>
        <div class="card-body">
            @if($order->items->count() > 0)
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: right;">Unit Price</th>
                            <th style="text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td><span class="product-name">{{ $item->product_name ?? $item->product->name ?? 'Unknown Product' }}</span></td>
                            <td style="text-align: center; font-weight: 600;">{{ $item->quantity }}</td>
                            <td style="text-align: right; font-weight: 600;">₹{{ number_format($item->unit_price ?? 0, 2) }}</td>
                            <td style="text-align: right; font-weight: 700; color: #667eea;">₹{{ number_format($item->total_price ?? ($item->unit_price ?? 0) * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total-section" style="flex-direction: column; align-items: flex-end;">
                    <div style="display:flex; gap:24px; align-items:center;">
                        <div>
                            <div class="total-label">Subtotal</div>
                        </div>
                        <div style="font-weight:700;">₹{{ number_format($order->subtotal ?? $order->total_amount, 2) }}</div>
                    </div>
                    <div style="display:flex; gap:24px; align-items:center; margin-top:8px;">
                        <div>
                            <div class="total-label">Tax</div>
                        </div>
                        <div style="font-weight:700;">₹{{ number_format($order->tax_amount ?? 0, 2) }}</div>
                    </div>
                    <div style="display:flex; gap:24px; align-items:center; margin-top:12px;">
                        <div>
                            <div class="total-label">Order Total</div>
                        </div>
                        <div class="total-amount">₹{{ number_format($order->total_amount, 2) }}</div>
                    </div>
                </div>
            @else
                <div style="text-align: center; padding: 40px; color: #a0aec0;">
                    <p>No items in this order</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
