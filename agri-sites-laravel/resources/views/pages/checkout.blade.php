@extends('layouts.app')

@section('title', 'Checkout')

@php $asset = asset('assets'); @endphp

@section('content')
<!-- Checkout Hero Section -->
<section class="checkout-hero">
    <div class="checkout-hero-bg"></div>
    <div class="checkout-hero-content">
        <div class="container">
            <div class="checkout-hero-wrapper">
                <h1 class="checkout-hero-title">Secure Checkout</h1>
                <p class="checkout-hero-subtitle">Complete your purchase safely and securely</p>
                <div class="checkout-progress">
                    <div class="progress-step active">
                        <span class="step-number">1</span>
                        <span class="step-label">Cart Review</span>
                    </div>
                    <div class="progress-connector"></div>
                    <div class="progress-step active">
                        <span class="step-number">2</span>
                        <span class="step-label">Billing</span>
                    </div>
                    <div class="progress-connector"></div>
                    <div class="progress-step">
                        <span class="step-number">3</span>
                        <span class="step-label">Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-section py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Please fix the following errors:</h5>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(empty($cart['items']))
            <div class="alert alert-warning" style="max-width: 600px; margin: 30px auto;">
                <h4>Your Cart is Empty</h4>
                <p>You haven't added any products to your cart yet. Please add some products before proceeding to checkout.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-shop"></i> Go to Shop
                </a>
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
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="col-12">
                                <label for="notes" class="form-label">Order Notes (Optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Notes about your order, e.g. special delivery instructions"></textarea>
                            </div>
                            <div class="col-12">
                                <h6 class="mb-3">Payment Method *</h6>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked required>
                                    <label class="form-check-label" for="cod">
                                        Cash on Delivery
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" required>
                                    <label class="form-check-label" for="card">
                                        Credit/Debit Card
                                    </label>
                                </div>
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
                                    <span>₹{{ number_format($item['qty'] * $item['price'], 2) }}</span>
                                </div>
                                @endforeach

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <strong>₹{{ number_format($cart['total_price'], 2) }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span>Shipping</span>
                                    <span class="text-success">Free</span>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0">Total</h5>
                                    <h5 class="text-success mb-0">₹{{ number_format($cart['total_price'], 2) }}</h5>
                                </div>

                                <button type="submit" form="checkout-form" class="btn btn-success btn-lg w-100" style="border-radius: 50px; font-weight: 600;" id="place-order-btn">
                                    <span class="btn-text">Place Order &nbsp;<i class="bi bi-check-circle-fill"></i></span>
                                    <span class="btn-spinner" style="display:none;">
                                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                        Processing...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    /* Checkout Hero Section */
    .checkout-hero {
        position: relative;
        padding: 4rem 0;
        overflow: hidden;
        background: #f8f9fa;
    }

    .checkout-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400"><defs><pattern id="p" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="30" fill="rgba(104,164,127,0.1)"/><path d="M50,20 L80,50 L50,80 L20,50 Z" stroke="rgba(255,107,107,0.1)" stroke-width="1" fill="none"/></pattern></defs><rect width="1200" height="400" fill="white"/><rect width="1200" height="400" fill="url(%23p)"/></svg>');
        background-size: cover;
        z-index: 0;
    }

    .checkout-hero-content {
        position: relative;
        z-index: 10;
        color: #274C5B;
    }

    .checkout-hero-wrapper {
        text-align: center;
        animation: fadeInDown 0.8s ease-out;
    }

    .checkout-hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #FF6B6B 0%, #FFA500 50%, #68A47F 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .checkout-hero-subtitle {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 2rem;
    }

    .checkout-progress {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        margin-top: 2.5rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        position: relative;
    }

    .step-number {
        width: 40px;
        height: 40px;
        background: #f0f0f0;
        border: 2px solid #ddd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #999;
        transition: all 0.3s ease;
    }

    .progress-step.active .step-number {
        background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%);
        color: white;
        border-color: #68A47F;
        box-shadow: 0 4px 15px rgba(104, 164, 127, 0.3);
    }

    .step-label {
        font-size: 0.9rem;
        color: #999;
        font-weight: 600;
        white-space: nowrap;
    }

    .progress-step.active .step-label {
        color: #68A47F;
        font-weight: 700;
    }

    .progress-connector {
        width: 60px;
        height: 2px;
        background: #ddd;
        margin: 0 1rem;
    }

    .progress-step.active ~ .progress-connector {
        background: linear-gradient(90deg, #68A47F 0%, #5a916d 100%);
    }

    /* Checkout Form Styling */
    .checkout-section .form-label {
        font-weight: 700;
        color: #274C5B;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .checkout-section .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .checkout-section .form-control:focus {
        border-color: #68A47F;
        box-shadow: 0 0 0 0.2rem rgba(104, 164, 127, 0.15);
    }

    .checkout-section h3 {
        color: #274C5B;
        font-weight: 800;
        position: relative;
        padding-bottom: 1rem;
        margin-bottom: 1.5rem;
    }

    .checkout-section h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(90deg, #FF6B6B 0%, #68A47F 100%);
        border-radius: 2px;
    }

    .checkout-section h6 {
        color: #274C5B;
        font-weight: 700;
    }

    .checkout-section .form-check-label {
        margin-left: 0.5rem;
        font-weight: 500;
        color: #555;
        cursor: pointer;
    }

    .checkout-section .form-check-input {
        border: 2px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .checkout-section .form-check-input:checked {
        background-color: #68A47F;
        border-color: #68A47F;
    }

    .checkout-section .card {
        border-radius: 12px;
        border: none;
        position: sticky;
        top: 20px;
    }

    .checkout-section .card-body {
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(240, 245, 242, 0.9) 100%);
    }

    .checkout-section .card h4 {
        color: #274C5B;
        font-weight: 800;
        position: relative;
        padding-bottom: 1rem;
    }

    .checkout-section .card h4::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 3px;
        background: linear-gradient(90deg, #FF6B6B 0%, #68A47F 100%);
    }

    .order-summary {
        animation: fadeIn 0.6s ease-out 0.2s both;
    }

    .checkout-section .d-flex.justify-content-between {
        color: #555;
    }

    .checkout-section .d-flex.justify-content-between strong {
        color: #274C5B;
    }

    .checkout-section h5 {
        color: #274C5B;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .checkout-hero-title {
            font-size: 1.8rem;
        }

        .checkout-progress {
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .progress-connector {
            width: 30px;
        }

        .checkout-section .card {
            position: static;
            margin-top: 2rem;
        }
    }
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('checkout-form');
    const button = document.getElementById('place-order-btn');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Form submitted!');
            
            // Show loading state
            if (button) {
                button.disabled = true;
                button.querySelector('.btn-text').style.display = 'none';
                button.querySelector('.btn-spinner').style.display = 'inline';
            }
            
            // Form will proceed with submission
        });
        console.log('Checkout form listener attached successfully');
    } else {
        console.log('ERROR: Checkout form not found!');
    }
});
</script>
@endpush
