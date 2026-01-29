@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<style>
    @keyframes floatUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes slideInLeft {
        from {
            transform: translateX(-30px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes countUp {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.3); }
        50% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.6); }
    }
    
    .dashboard-container {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        padding: 40px;
        border-radius: 20px;
        min-height: 100vh;
    }
    
    .dashboard-header {
        margin-bottom: 50px;
        animation: slideInLeft 0.8s ease;
        position: relative;
        z-index: 2;
    }
    
    .dashboard-header h1 {
        color: #ffffff;
        font-weight: 900;
        margin-bottom: 12px;
        font-size: 48px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -1px;
    }
    
    .dashboard-header p {
        color: #94a3b8;
        margin: 0;
        font-size: 17px;
        font-weight: 400;
        letter-spacing: 0.3px;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 28px;
        margin-bottom: 50px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0.02) 100%);
        backdrop-filter: blur(10px);
        padding: 32px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        position: relative;
        overflow: hidden;
        animation: floatUp 0.6s ease backwards;
    }
    
    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    
    .stat-card:hover {
        transform: translateY(-12px);
        border-color: rgba(255,255,255,0.2);
        background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.04) 100%);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.15), transparent);
        border-radius: 50%;
        transition: all 0.4s ease;
        pointer-events: none;
    }
    
    .stat-card:hover::before {
        top: -30%;
        right: -30%;
    }
    
    .stat-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .stat-card.products::after {
        background: linear-gradient(90deg, transparent, #667eea, transparent);
    }
    .stat-card.orders::after {
        background: linear-gradient(90deg, transparent, #48bb78, transparent);
    }
    .stat-card.customers::after {
        background: linear-gradient(90deg, transparent, #ed8936, transparent);
    }
    .stat-card.revenue::after {
        background: linear-gradient(90deg, transparent, #9f7aea, transparent);
    }
    
    .stat-card:hover::after {
        opacity: 1;
    }
    
    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        font-weight: bold;
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
    }
    
    .stat-card:hover .stat-icon {
        transform: scale(1.15) rotate(5deg);
    }
    
    .stat-card.products .stat-icon {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.35);
    }
    
    .stat-card.orders .stat-icon {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        box-shadow: 0 8px 24px rgba(72, 187, 120, 0.35);
    }
    
    .stat-card.customers .stat-icon {
        background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
        box-shadow: 0 8px 24px rgba(237, 137, 54, 0.35);
    }
    
    .stat-card.revenue .stat-icon {
        background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);
        box-shadow: 0 8px 24px rgba(159, 122, 234, 0.35);
    }
    
    .stat-label {
        color: #cbd5e1;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 14px;
        position: relative;
        z-index: 1;
        opacity: 0.8;
    }
    
    .stat-value {
        color: #ffffff;
        font-size: 42px;
        font-weight: 900;
        position: relative;
        z-index: 1;
        line-height: 1;
        letter-spacing: -1px;
    }
    
    .recent-orders-section {
        background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0.02) 100%);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 36px;
        border: 1px solid rgba(255,255,255,0.1);
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        animation: floatUp 0.8s ease 0.5s backwards;
    }
    
    .section-title {
        color: #ffffff;
        font-weight: 900;
        margin-bottom: 32px;
        font-size: 26px;
        display: flex;
        align-items: center;
        gap: 16px;
        letter-spacing: -0.5px;
    }
    
    .section-title::before {
        content: '';
        width: 6px;
        height: 36px;
        background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        border-radius: 3px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }
    
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .orders-table thead {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-bottom: 2px solid rgba(255,255,255,0.1);
    }
    
    .orders-table th {
        padding: 16px;
        text-align: left;
        color: #cbd5e1;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    
    .orders-table td {
        padding: 18px 16px;
        border-bottom: 1px solid rgba(255,255,255,0.06);
        color: #e2e8f0;
    }
    
    .orders-table tbody tr {
        transition: all 0.3s ease;
        position: relative;
    }
    
    .orders-table tbody tr::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        border-radius: 6px;
    }
    
    .orders-table tbody tr:hover::before {
        opacity: 1;
    }
    
    .orders-table tbody tr:hover {
        transform: translateX(4px);
    }
    
    .order-id-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 800;
        transition: all 0.2s ease;
        position: relative;
    }
    
    .order-id-link:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    .badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .badge-pending {
        background: linear-gradient(135deg, rgba(217, 119, 6, 0.2) 0%, rgba(180, 83, 9, 0.2) 100%);
        color: #fed7aa;
        border: 1px solid rgba(217, 119, 6, 0.4);
    }
    
    .badge-completed {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(21, 128, 61, 0.2) 100%);
        color: #86efac;
        border: 1px solid rgba(34, 197, 94, 0.4);
    }
    
    .badge:hover {
        transform: scale(1.05);
    }
    
    .view-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
        display: inline-block;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .view-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .view-btn:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .view-btn:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    
    .empty-message {
        text-align: center;
        padding: 50px;
        color: #94a3b8;
        font-size: 16px;
        font-weight: 500;
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
