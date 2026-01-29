@extends('admin.layouts.app')

@section('title','Orders')

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
    .orders-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #edf2f7 100%);
        padding: 30px;
        border-radius: 10px;
        animation: fadeInUp 0.6s ease;
    }
    .orders-header {
        margin-bottom: 30px;
        animation: fadeInUp 0.6s ease 0.1s both;
    }
    .orders-header h2 {
        color: #1a202c;
        font-weight: 800;
        font-size: 32px;
        margin: 0;
    }
    .orders-table-wrapper {
        background: white;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        animation: fadeInUp 0.6s ease 0.2s both;
    }
    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
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
    .orders-table tbody tr {
        transition: all 0.2s ease;
    }
    .orders-table tbody tr:hover {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
    }
    .order-id {
        font-weight: 700;
        color: #667eea;
        font-size: 15px;
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
    .badge-processing {
        background: #dbeafe;
        color: #1e40af;
    }
    .amount-text {
        font-weight: 700;
        color: #667eea;
        font-size: 16px;
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

<div class="orders-container">
    <div class="orders-header">
        <h2>Orders Management</h2>
    </div>

    <div class="orders-table-wrapper">
        @if($orders->count() > 0)
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><span class="order-id">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span></td>
                        <td>{{ $order->user->name ?? $order->first_name . ' ' . $order->last_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td><span class="amount-text">₹{{ number_format($order->total_amount, 2) }}</span></td>
                        <td>
                            @if($order->status === 'completed')
                                <span class="badge badge-completed">Completed</span>
                            @elseif($order->status === 'processing')
                                <span class="badge badge-processing">Processing</span>
                            @else
                                <span class="badge badge-pending">{{ ucfirst($order->status ?? 'Pending') }}</span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.orders.show', $order) }}" class="view-btn">View Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination">
                {{ $orders->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #a0aec0;">
                <p style="font-size: 16px;">No orders found</p>
            </div>
        @endif
    </div>
</div>
@endsection
