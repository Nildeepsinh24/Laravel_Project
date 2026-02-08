@extends('admin.layouts.app')

@section('title','Customers')

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

.premium-customers-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    animation: fadeInUp 0.5s ease-out;
}

.customers-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.customers-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.customers-table tbody tr {
    transition: all 0.25s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.customers-table tbody tr:hover {
    background: rgba(20, 184, 166, 0.08);
    transform: translateX(4px);
}

.customers-table tbody td {
    padding: 1.25rem 1rem;
    color: var(--og-text);
    vertical-align: middle;
}

.customer-id-badge {
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
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.customer-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: 700;
    font-size: 0.85rem;
}

.customer-email {
    color: #9ca3af;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.email-icon {
    color: var(--og-accent);
    font-size: 0.85rem;
}

.orders-count-badge {
    background: rgba(245, 158, 11, 0.15);
    color: var(--og-accent);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}

.date-text {
    color: #9ca3af;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.date-icon {
    color: var(--og-primary);
    font-size: 0.85rem;
}

.view-customer-btn {
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

.view-customer-btn:hover {
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
                        <h1 class="header-title">Customers Management</h1>
                        <p class="header-subtitle mt-2">Manage and view all registered customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="premium-customers-card">
            <div class="table-responsive">
                <table class="customers-table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th class="text-center">Total Orders</th>
                            <th>Joined Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>
                                <span class="customer-id-badge">#{{ $customer->id }}</span>
                            </td>
                            <td>
                                <div class="customer-name">
                                    <div class="customer-avatar">
                                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                                    </div>
                                    <span>{{ $customer->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="customer-email">
                                    <i class="fas fa-envelope email-icon"></i>
                                    <span>{{ $customer->email }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="orders-count-badge">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span>{{ $customer->orders->count() }}</span>
                                </span>
                            </td>
                            <td>
                                <div class="date-text">
                                    <i class="far fa-calendar-alt date-icon"></i>
                                    <span>{{ $customer->created_at->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.customers.show', $customer) }}" class="view-customer-btn">
                                    <i class="fas fa-eye"></i>
                                    <span>View Profile</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
