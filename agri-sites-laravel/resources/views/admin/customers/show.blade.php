@extends('admin.layouts.app')

@section('title','Customer Details')

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
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .customer-show-container {
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
    .profile-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        animation: fadeInUp 0.6s ease 0.1s both;
    }
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        padding: 28px;
        color: white;
    }
    .customer-name {
        font-size: 28px;
        font-weight: 800;
        margin: 0;
        color: white;
    }
    .card-body {
        padding: 28px;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
        margin-top: 0;
    }
    .stat-item {
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #667eea;
    }
    .stat-label {
        color: #718096;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    .stat-value {
        color: #1a202c;
        font-size: 24px;
        font-weight: 800;
    }
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 28px;
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
    .orders-section-header {
        color: #1a202c;
        font-weight: 700;
        font-size: 20px;
        margin-top: 28px;
        margin-bottom: 0;
    }
    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .orders-table thead {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
        border-bottom: 2px solid #e2e8f0;
    }
    .orders-table th {
        padding: 14px 16px;
        text-align: left;
        color: #2d3748;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .orders-table td {
        padding: 16px;
        border-bottom: 1px solid #e2e8f0;
        color: #2d3748;
    }
    .orders-table tbody tr:hover {
        background: #f7fafc;
    }
    .order-id {
        font-weight: 700;
        color: #667eea;
    }
    .amount-text {
        font-weight: 700;
        color: #667eea;
        font-size: 15px;
    }
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
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
    .view-btn {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        padding: 6px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        transition: all 0.3s ease;
        display: inline-block;
        border: none;
        cursor: pointer;
    }
    .view-btn:hover {
        background: linear-gradient(135deg, #5568d3 0%, #4652ba 100%);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    .orders-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        animation: fadeInUp 0.6s ease 0.2s both;
    }
    .orders-card .card-body {
        padding: 28px;
    }
</style>

<div class="customer-show-container">
    <a href="{{ route('admin.customers.index') }}" class="back-btn">← Back to Customers</a>

    <div class="profile-card">
        <div class="profile-header">
            <h2 class="customer-name">{{ $customer->name }}</h2>
        </div>
        <div class="card-body">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-value">{{ $customer->orders->count() }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Total Spent</div>
                    <div class="stat-value">₹{{ number_format($customer->orders->sum('total_amount'), 2) }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Avg Order Value</div>
                    <div class="stat-value">
                        @if($customer->orders->count() > 0)
                            ₹{{ number_format($customer->orders->sum('total_amount') / $customer->orders->count(), 2) }}
                        @else
                            ₹0
                        @endif
                    </div>
                </div>
            </div>

            <div class="info-grid" style="margin-top: 20px;">
                <div>
                    <div class="info-field">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">{{ $customer->email }}</div>
                    </div>
                </div>
                <div>
                    <div class="info-field">
                        <div class="info-label">Member Since</div>
                        <div class="info-value">{{ $customer->created_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="orders-card">
        <div class="card-body">
            <h4 class="orders-section-header">Order History</h4>
            
            @if($customer->orders->count() > 0)
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th style="text-align: right;">Amount</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->orders as $order)
                        <tr>
                            <td><span class="order-id">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span></td>
                            <td style="text-align: right;"><span class="amount-text">₹{{ number_format($order->total_amount, 2) }}</span></td>
                            <td>
                                @if($order->status === 'completed')
                                    <span class="status-badge completed">Completed</span>
                                @elseif($order->status === 'processing')
                                    <span class="status-badge processing">Processing</span>
                                @else
                                    <span class="status-badge pending">{{ ucfirst($order->status ?? 'Pending') }}</span>
                                @endif
                            </td>
                            <td style="text-align: center;"><a href="{{ route('admin.orders.show', $order) }}" class="view-btn">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div style="text-align: center; padding: 40px; color: #a0aec0;">
                    <p style="font-size: 16px;">No orders yet</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
