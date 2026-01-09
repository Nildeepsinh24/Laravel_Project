@extends('layouts.app')

@section('title', 'Checkout')

@php $asset = asset('assets'); @endphp

@section('content')
<section id="about-hiro-section">
    <div class="container-fluid p-0">
        <div class="row shop-single-main-row">
            <h1 class="abt-hiro-head">Checkout</h1>
        </div>
    </div>
</section>

<section class="checkout-section py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(empty($cart['items']))
            <div class="text-center py-5">
                <p>Your cart is empty. <a href="{{ route('shop') }}">Continue shopping</a>.</p>
            </div>
        @else
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="mb-4">Billing Details</h3>
                    <form method="POST" action="{{ route('checkout.process') }}" id="checkout-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Street Address *</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="House number and street name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">State *</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="col-md-6">
                                <label for="zip" class="form-label">ZIP Code *</label>
                                <input type="text" class="form-control" id="zip" name="zip" required>
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country *</label>
                                <input type="text" class="form-control" id="country" name="country" value="United States" required>
                            </div>
                            <div class="col-12">
                                <label for="notes" class="form-label">Order Notes (Optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Notes about your order, e.g. special delivery instructions"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Your Order</h4>
                            
                            <div class="order-summary">
                                @foreach($cart['items'] as $item)
                                <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong>
                                        <br>
                                        <small class="text-muted">Qty: {{ $item['qty'] }}</small>
                                    </div>
                                    <span>${{ number_format($item['qty'] * $item['price'], 2) }}</span>
                                </div>
                                @endforeach

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <strong>${{ number_format($cart['total_price'], 2) }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span>Shipping</span>
                                    <span class="text-success">Free</span>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0">Total</h5>
                                    <h5 class="text-success mb-0">${{ number_format($cart['total_price'], 2) }}</h5>
                                </div>

                                <div class="payment-methods mb-4">
                                    <h6 class="mb-3">Payment Method</h6>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                        <label class="form-check-label" for="cod">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="payment_method" id="card" value="card">
                                        <label class="form-check-label" for="card">
                                            Credit/Debit Card
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" form="checkout-form" class="btn btn-success btn-lg w-100" style="border-radius: 50px; font-weight: 600;">
                                    Place Order &nbsp;<i class="bi bi-check-circle-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
