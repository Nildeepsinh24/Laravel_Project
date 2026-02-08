@extends('admin.layouts.app')

@section('title','Customer Details')

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

.stat-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    backdrop-filter: blur(10px);
    text-align: center;
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(20, 184, 166, 0.15);
}

.stat-value {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--og-muted);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.stat-icon {
    font-size: 2rem;
    margin-bottom: 0.75rem;
}

.premium-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    margin-bottom: 2rem;
}

.premium-card-header {
    background: rgba(20, 184, 166, 0.08);
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
    margin: -2rem -2rem 1.5rem -2rem;
    padding: 1.5rem 2rem;
    border-radius: 12px 12px 0 0;
}

.premium-card-header h5 {
    color: var(--og-primary);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.95rem;
    margin: 0;
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

.status-verified {
    background: rgba(34, 197, 94, 0.15);
    color: #10b981;
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
}

.status-unverified {
    background: rgba(251, 146, 60, 0.15);
    color: var(--og-accent);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
}

.action-btn {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.75rem 1.25rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
}

.action-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.order-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.order-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.order-table tbody td {
    padding: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    color: var(--og-text);
}

.order-table tbody tr:hover {
    background: rgba(20, 184, 166, 0.08);
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
    margin-bottom: 2rem;
}

.back-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
}

.no-orders-message {
    text-align: center;
    padding: 3rem 1rem;
    color: var(--og-muted);
}

.no-orders-message i {
    font-size: 2rem;
    opacity: 0.3;
    display: block;
    margin-bottom: 0.75rem;
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
                <h1 class="header-title">Customer Details</h1>
                <p class="header-subtitle">{{ $customer->name }}</p>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container-fluid">
        <a href="{{ route('admin.customers.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Customers</span>
        </a>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="color: var(--og-primary);"><i class="fas fa-shopping-bag"></i></div>
                    <div class="stat-value" style="color: var(--og-primary);">{{ $customer->orders->count() }}</div>
                    <div class="stat-label">Total Orders</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="color: #10b981;"><i class="fas fa-sack-dollar"></i></div>
                    <div class="stat-value" style="color: #10b981;">₹{{ number_format($customer->orders->sum('total_amount'), 2) }}</div>
                    <div class="stat-label">Total Spent</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="color: var(--og-accent);"><i class="fas fa-chart-line"></i></div>
                    <div class="stat-value" style="color: var(--og-accent);">
                        @if($customer->orders->count() > 0)
                            ₹{{ number_format($customer->orders->sum('total_amount') / $customer->orders->count(), 2) }}
                        @else
                            ₹0
                        @endif
                    </div>
                    <div class="stat-label">Avg Order Value</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="premium-card">
                    <div class="premium-card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div style="padding: 0;">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="premium-card">
                    <div class="premium-card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div style="display: grid; gap: 0.75rem;">
                        <a href="mailto:{{ $customer->email }}" class="action-btn">
                            <i class="fas fa-envelope"></i>
                            <span>Send Email</span>
                        </a>
                        <button class="action-btn" disabled>
                            <i class="fas fa-user-edit"></i>
                            <span>Edit Customer</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="premium-card">
                    <div class="premium-card-header">
                        <h5 class="mb-0">Order History</h5>
                    </div>
                    <div style="padding: 0;">
                        @if($customer->orders->count() > 0)
                            <div class="table-responsive">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th class="text-end">Amount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer->orders as $order)
                                        <tr>
                                            <td style="font-weight: 600;">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="text-end" style="font-weight: 700; color: #10b981;">₹{{ number_format($order->total_amount, 2) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.orders.show', $order) }}" class="action-btn" style="padding: 0.5rem 1rem;">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="no-orders-message">
                                <i class="fas fa-inbox"></i>
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
