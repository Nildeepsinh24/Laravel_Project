@extends('admin.layouts.app')

@section('title','Orders')

@section('content')
@php $asset = asset('assets'); @endphp

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
    margin: 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.premium-orders-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    animation: fadeInUp 0.5s ease-out;
}

.orders-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.orders-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.orders-table tbody tr {
    transition: all 0.25s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.orders-table tbody tr:hover {
    background: rgba(20, 184, 166, 0.08);
    transform: translateX(4px);
}

.orders-table tbody td {
    padding: 1.25rem 1rem;
    color: var(--og-text);
    vertical-align: middle;
}

.order-id-badge {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
}

.customer-name {
    font-weight: 500;
    color: #e5e7eb;
}

.customer-icon {
    color: var(--og-primary);
    margin-right: 0.375rem;
    font-size: 0.9rem;
}

.amount-highlight {
    font-weight: 700;
    font-size: 1.05rem;
    color: #10b981;
}

.date-text {
    color: #9ca3af;
    font-size: 0.9rem;
}

.date-icon {
    color: var(--og-accent);
    margin-right: 0.375rem;
    font-size: 0.85rem;
}

.view-order-btn {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    transition: all 0.3s ease;
}

.view-order-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(20, 184, 166, 0.25);
}

.pagination-wrapper {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
}

.pagination-wrapper .pagination {
    gap: 0.5rem;
}

.pagination-wrapper .page-link {
    background: rgba(20, 184, 166, 0.1);
    border: 1px solid rgba(20, 184, 166, 0.3);
    color: var(--og-primary);
    border-radius: 8px;
    padding: 0.5rem 0.75rem;
    transition: all 0.3s ease;
}

.pagination-wrapper .page-link:hover {
    background: rgba(20, 184, 166, 0.2);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
}

.pagination-wrapper .page-item.active .page-link {
    background: var(--og-primary);
    border-color: var(--og-primary);
    color: #fff;
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

<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12">
                <div class="premium-header">
                    <div class="text-center">
                        <h1 class="header-title">Orders Management</h1>
                        <p class="header-subtitle mt-2">Track and manage all customer orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="premium-orders-card">
            <div class="table-responsive">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>
                                <span class="order-id-badge">#{{ $order->id }}</span>
                            </td>
                            <td>
                                <i class="fas fa-user customer-icon"></i>
                                <span class="customer-name">{{ $order->user->name ?? ($order->first_name . ' ' . $order->last_name) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="amount-highlight">₹{{ number_format($order->total_amount, 2) }}</span>
                            </td>
                            <td>
                                <i class="far fa-calendar-alt date-icon"></i>
                                <span class="date-text">{{ $order->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.orders.show', $order) }}" class="view-order-btn">
                                    <i class="fas fa-eye"></i>
                                    <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
