@extends('admin.layouts.app')

@section('title','Customers')

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
    .customers-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #edf2f7 100%);
        padding: 30px;
        border-radius: 10px;
        animation: fadeInUp 0.6s ease;
    }
    .customers-header {
        margin-bottom: 30px;
        animation: fadeInUp 0.6s ease 0.1s both;
    }
    .customers-header h2 {
        color: #1a202c;
        font-weight: 800;
        font-size: 32px;
        margin: 0;
    }
    .customers-table-wrapper {
        background: white;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        animation: fadeInUp 0.6s ease 0.2s both;
    }
    .customers-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }
    .customers-table thead {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
        border-bottom: 2px solid #e2e8f0;
    }
    .customers-table th {
        padding: 14px 16px;
        text-align: left;
        color: #2d3748;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .customers-table td {
        padding: 16px;
        border-bottom: 1px solid #e2e8f0;
        color: #2d3748;
    }
    .customers-table tbody tr {
        transition: all 0.2s ease;
    }
    .customers-table tbody tr:hover {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
    }
    .customer-name {
        font-weight: 700;
        color: #1a202c;
        font-size: 15px;
    }
    .customer-email {
        color: #718096;
        font-size: 14px;
    }
    .order-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        border-radius: 50%;
        font-weight: 700;
        font-size: 14px;
    }
    .view-btn {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
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
    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 8px;
    }
    .pagination a, .pagination span {
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    .pagination a {
        background: #e2e8f0;
        color: #2d3748;
    }
    .pagination a:hover {
        background: #667eea;
        color: white;
    }
    .pagination span.active {
        background: #667eea;
        color: white;
    }
</style>

<div class="customers-container">
    <div class="customers-header">
        <h2>Customers Management</h2>
    </div>

    <div class="customers-table-wrapper">
        @if($customers->count() > 0)
            <table class="customers-table">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td><span style="color: #667eea; font-weight: 700;">#{{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                        <td><span class="customer-name">{{ $customer->name }}</span></td>
                        <td><span class="customer-email">{{ $customer->email }}</span></td>
                        <td><span class="order-count">{{ $customer->orders->count() }}</span></td>
                        <td><a href="{{ route('admin.customers.show', $customer) }}" class="view-btn">View Profile</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination">
                {{ $customers->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #a0aec0;">
                <p style="font-size: 16px;">No customers found</p>
            </div>
        @endif
    </div>
</div>
@endsection
