@extends('layouts.app')

@section('title', 'Order Confirmation')

@php $asset = asset('assets'); @endphp

@section('content')
<section id="about-hiro-section">
    <div class="container-fluid p-0">
        <div class="row shop-single-main-row">
            <h1 class="abt-hiro-head">Order Confirmation</h1>
        </div>
    </div>
</section>

<section class="confirmation-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div style="font-size: 80px; color: #28a745; margin-bottom: 20px;">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <h2 class="text-success">Order Placed Successfully!</h2>
                            <p class="text-muted mt-2">Thank you for your purchase. Your order has been received and is being processed.</p>
                        </div>

                        <hr class="my-4">

                        <div class="order-details mt-4">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h5 class="mb-3">Order Information</h5>
                                    <p><strong>Order Number:</strong> <span class="badge bg-success">{{ $order->order_number }}</span></p>
                                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y H:i A') }}</p>
                                    <p><strong>Status:</strong> 
                                        <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                    </p>
                                    <p><strong>Payment Method:</strong> 
                                        @if($order->payment_method === 'cod')
                                            Cash on Delivery
                                        @else
                                            Credit/Debit Card
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-3">Delivery Address</h5>
                                    <p>
                                        {{ $order->first_name }} {{ $order->last_name }}<br>
                                        {{ $order->address }}<br>
                                        {{ $order->city }}, {{ $order->state }} {{ $order->zip }}<br>
                                        {{ $order->country }}
                                    </p>
                                    <p><strong>Email:</strong> {{ $order->email }}</p>
                                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">Order Items</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="border-bottom">
                                            <th>Product</th>
                                            <th class="text-end">Qty</th>
                                            <th class="text-end">Price</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr class="border-bottom">
                                            <td>{{ $item->product_name }}</td>
                                            <td class="text-end">{{ $item->quantity }}</td>
                                            <td class="text-end">${{ number_format($item->unit_price, 2) }}</td>
                                            <td class="text-end"><strong>${{ number_format($item->total_price, 2) }}</strong></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="border-top pt-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Subtotal:</span>
                                            <strong>${{ number_format($order->total_amount, 2) }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Shipping:</span>
                                            <span class="text-success">Free</span>
                                        </div>
                                        <div class="d-flex justify-content-between pt-2 border-top">
                                            <h5 class="mb-0">Total Amount:</h5>
                                            <h5 class="text-success mb-0">${{ number_format($order->total_amount, 2) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($order->notes)
                            <div class="alert alert-info mt-4">
                                <strong>Order Notes:</strong> {{ $order->notes }}
                            </div>
                            @endif
                        </div>

                        <hr class="my-4">

                        <div class="text-center mt-4">
                            <a href="{{ route('order.print', $order->id) }}" class="btn btn-primary me-2" target="_blank">
                                <i class="bi bi-printer"></i> Print Bill
                            </a>
                            <a href="{{ route('shop') }}" class="btn btn-success">
                                <i class="bi bi-shop"></i> Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
