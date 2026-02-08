@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
@php $asset = asset('assets'); @endphp

<style>
.premium-stat-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 1.75rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.premium-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--og-primary), var(--og-accent));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.premium-stat-card:hover::before {
    opacity: 1;
}

.premium-stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.4);
}

.stat-icon-wrapper {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
    font-size: 1.75rem;
    position: relative;
    overflow: hidden;
}

.stat-icon-wrapper::after {
    content: '';
    position: absolute;
    inset: 0;
    background: inherit;
    opacity: 0.2;
    filter: blur(12px);
}

.stat-icon-wrapper i {
    position: relative;
    z-index: 1;
}

.icon-teal {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
    color: #fff;
}

.icon-amber {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
}

.icon-emerald {
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
}

.icon-violet {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: #fff;
}

.stat-value {
    font-size: 2.25rem;
    font-weight: 700;
    color: #fff;
    margin: 0.5rem 0;
    letter-spacing: -0.5px;
}

.stat-label {
    font-size: 0.875rem;
    color: #9ca3af;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8rem;
    padding: 0.25rem 0.625rem;
    border-radius: 6px;
    font-weight: 600;
    margin-top: 0.5rem;
}

.trend-up {
    background: rgba(34, 197, 94, 0.15);
    color: #4ade80;
}

.trend-neutral {
    background: rgba(59, 130, 246, 0.15);
    color: #60a5fa;
}

.premium-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.premium-card:hover {
    border-color: rgba(20, 184, 166, 0.35);
    box-shadow: 0 12px 40px rgba(20, 184, 166, 0.15);
}

.card-header-premium {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid rgba(20, 184, 166, 0.1);
}

.card-title-premium {
    font-size: 1.25rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-title-premium i {
    color: var(--og-primary);
}

.action-btn-premium {
    padding: 0.875rem 1.25rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.625rem;
    border: none;
    cursor: pointer;
}

.action-btn-premium.primary {
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    color: #fff;
    box-shadow: 0 4px 16px rgba(20, 184, 166, 0.3);
}

.action-btn-premium.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(20, 184, 166, 0.4);
}

.action-btn-premium.outline {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
}

.action-btn-premium.outline:hover {
    background: rgba(20, 184, 166, 0.15);
    border-color: rgba(20, 184, 166, 0.5);
}

.premium-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.premium-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.premium-table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.premium-table tbody tr:hover {
    background: rgba(20, 184, 166, 0.05);
    transform: scale(1.01);
}

.premium-table tbody td {
    padding: 1rem;
    color: var(--og-text);
}

.order-id-badge {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
}

.amount-highlight {
    color: #10b981;
    font-weight: 700;
    font-size: 1.05rem;
}

.animate-slide-up {
    animation: slideUpIn 0.6s ease-out;
}

@keyframes slideUpIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card-1 { animation-delay: 0.1s; }
.stat-card-2 { animation-delay: 0.2s; }
.stat-card-3 { animation-delay: 0.3s; }
.stat-card-4 { animation-delay: 0.4s; }
</style>

<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong)); color: white;">
                <div class="hiro-cnct-btn text-center py-4">
                    <h6 class="hiro-headsix mb-2">Admin Panel</h6>
                    <h1 class="hiro-head-one mb-0">Dashboard Overview</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cnct-one" class="py-4">
    <div class="container">
        <!-- Premium Stats Grid -->
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="premium-stat-card animate-slide-up stat-card-1">
                    <div class="stat-icon-wrapper icon-teal">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-label">Total Products</div>
                    <div class="stat-value">{{ $products ?? 0 }}</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>12% increase</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="premium-stat-card animate-slide-up stat-card-2">
                    <div class="stat-icon-wrapper icon-amber">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-value">{{ $totalOrders ?? 0 }}</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>8% increase</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="premium-stat-card animate-slide-up stat-card-3">
                    <div class="stat-icon-wrapper icon-emerald">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <div class="stat-label">Total Revenue</div>
                    <div class="stat-value">₹{{ number_format($revenue ?? 0) }}</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>23% increase</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="premium-stat-card animate-slide-up stat-card-4">
                    <div class="stat-icon-wrapper icon-violet">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-label">Total Customers</div>
                    <div class="stat-value">{{ $customers ?? 0 }}</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>15% increase</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="row g-4">
            <!-- Quick Actions -->
            <div class="col-lg-4">
                <div class="premium-card">
                    <div class="card-header-premium">
                        <h5 class="card-title-premium">
                            <i class="fas fa-bolt"></i>
                            Quick Actions
                        </h5>
                    </div>
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.products.create') }}" class="action-btn-premium primary">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add New Product</span>
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="action-btn-premium outline">
                            <i class="fas fa-shopping-cart"></i>
                            <span>View All Orders</span>
                        </a>
                        <a href="{{ route('admin.customers.index') }}" class="action-btn-premium outline">
                            <i class="fas fa-users"></i>
                            <span>Manage Customers</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="action-btn-premium outline">
                            <i class="fas fa-box"></i>
                            <span>All Products</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="col-lg-8">
                <div class="premium-card">
                    <div class="card-header-premium">
                        <h5 class="card-title-premium">
                            <i class="fas fa-history"></i>
                            Recent Orders
                        </h5>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="premium-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders ?? [] as $order)
                                <tr>
                                    <td><span class="order-id-badge">#{{ $order->id }}</span></td>
                                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                                    <td><span class="amount-highlight">₹{{ number_format($order->total_amount, 2) }}</span></td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td><span class="badge badge-success">Completed</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fas fa-inbox fa-2x mb-3 d-block" style="opacity: 0.3;"></i>
                                        <span>No recent orders</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
