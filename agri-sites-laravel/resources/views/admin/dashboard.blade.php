@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<style>
    .dashboard-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #edf2f7 100%);
        padding: 30px;
        border-radius: 10px;
    }
    .dashboard-header {
        margin-bottom: 40px;
    }
    .dashboard-header h1 {
        color: #1a202c;
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 32px;
    }
    .dashboard-header p {
        color: #718096;
        margin: 0;
        font-size: 16px;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }
    .stat-card {
        background: white;
        padding: 28px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 6px solid;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
    .stat-card.products {
        border-left-color: #667eea;
    }
    .stat-card.orders {
        border-left-color: #48bb78;
    }
    .stat-card.customers {
        border-left-color: #ed8936;
    }
    .stat-card.revenue {
        border-left-color: #9f7aea;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(102, 126, 234, 0.08);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }
    .stat-icon {
        display: inline-block;
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
        font-weight: bold;
    }
    .stat-card.products .stat-icon {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
    }
    .stat-card.orders .stat-icon {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    }
    .stat-card.customers .stat-icon {
        background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
    }
    .stat-card.revenue .stat-icon {
        background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);
    }
    .stat-label {
        color: #718096;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }
    .stat-value {
        color: #1a202c;
        font-size: 36px;
        font-weight: 800;
        position: relative;
        z-index: 1;
        line-height: 1;
    }
    .recent-orders-section {
        background: white;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .section-title {
        color: #1a202c;
        font-weight: 800;
        margin-bottom: 24px;
        font-size: 22px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .section-title::before {
        content: '';
        width: 5px;
        height: 28px;
        background: linear-gradient(180deg, #667eea 0%, #9f7aea 100%);
        border-radius: 3px;
    }
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }
    .orders-table thead {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
        border-bottom: 2px solid #e2e8f0;
    }
    .orders-table th {
        padding: 14px;
        text-align: left;
        color: #2d3748;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .orders-table td {
        padding: 16px 14px;
        border-bottom: 1px solid #e2e8f0;
        color: #2d3748;
    }
    .orders-table tbody tr:hover {
        background: #f7fafc;
    }
    .order-id-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 700;
    }
    .order-id-link:hover {
        text-decoration: underline;
    }
    .badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }
    .badge-pending {
        background: #fef3c7;
        color: #92400e;
    }
    .badge-completed {
        background: #d1fae5;
        color: #065f46;
    }
    .view-btn {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all 0.2s ease;
        display: inline-block;
    }
    .view-btn:hover {
        background: linear-gradient(135deg, #5568d3 0%, #4652ba 100%);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
    }
    .empty-message {
        text-align: center;
        padding: 40px;
        color: #a0aec0;
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
        <p>Welcome to your admin control panel</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card products">
            <div class="stat-icon">📦</div>
            <div class="stat-label">Total Products</div>
            <div class="stat-value">{{ $products }}</div>
        </div>
        <div class="stat-card orders">
            <div class="stat-icon">📋</div>
            <div class="stat-label">Total Orders</div>
            <div class="stat-value">{{ $orders }}</div>
        </div>
        <div class="stat-card customers">
            <div class="stat-icon">👥</div>
            <div class="stat-label">Total Customers</div>
            <div class="stat-value">{{ $customers }}</div>
        </div>
        <div class="stat-card revenue">
            <div class="stat-icon">💰</div>
            <div class="stat-label">Total Revenue</div>
            <div class="stat-value">₹{{ number_format($revenue, 0) }}</div>
        </div>
    </div>

    <div class="recent-orders-section">
        <div class="section-title">Recent Orders</div>
        @if($recentOrders->count() > 0)
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td><a href="{{ route('admin.orders.show', $order) }}" class="order-id-link">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</a></td>
                        <td>{{ $order->user->name ?? $order->first_name }}</td>
                        <td style="font-weight: 600;">₹{{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            @if($order->status === 'completed')
                                <span class="badge badge-completed">Completed</span>
                            @else
                                <span class="badge badge-pending">{{ ucfirst($order->status ?? 'Pending') }}</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td><a href="{{ route('admin.orders.show', $order) }}" class="view-btn">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                <p>No orders yet</p>
            </div>
        @endif
    </div>
</div>
@endsection
