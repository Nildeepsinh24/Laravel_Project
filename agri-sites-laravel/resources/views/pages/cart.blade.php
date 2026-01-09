@extends('layouts.app')

@section('title', 'Your Cart')

@php $asset = asset('assets'); @endphp

@section('content')
<!-- Hero Section -->
<section id="cart-hero-section" class="cart-hero-section">
    <div class="container-fluid p-0">
        <div class="cart-hero-wrapper">
            <div class="cart-hero-gradient"></div>
            <div class="cart-hero-content">
                <div class="container">
                    <h1 class="cart-hero-title">Shopping Cart</h1>
                    <p class="cart-hero-subtitle">Review your items and proceed to checkout</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section -->
<section class="cart-section py-5">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(empty($cart['items']))
            <!-- Empty Cart State -->
            <div class="empty-cart-container">
                <div class="empty-cart-content">
                    <div class="empty-cart-icon">
                        <i class="bi bi-bag"></i>
                    </div>
                    <h3 class="empty-cart-title">Your cart is empty</h3>
                    <p class="empty-cart-text">No items in your cart yet. Start shopping to discover our amazing products!</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary cart-cta-btn">
                        <i class="bi bi-shop me-2"></i> Continue Shopping
                    </a>
                </div>
            </div>
        @else
            <!-- Cart Items -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-items-container">
                        <div class="cart-items-header">
                            <h5>Cart Items <span class="badge bg-success">{{ $cart['total_qty'] }}</span></h5>
                        </div>
                        
                        @foreach($cart['items'] as $item)
                        <div class="cart-item" data-aos="fade-up">
                            <div class="cart-item-image">
                                <a href="{{ route('shop.single', $item['slug']) }}" class="cart-item-image-link">
                                    <img src="{{ $asset }}/{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                                </a>
                                <div class="cart-item-overlay">
                                    <a href="{{ route('shop.single', $item['slug']) }}" class="view-product-btn">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </div>
                            </div>

                            <div class="cart-item-details">
                                <h6 class="cart-item-name">
                                    <a href="{{ route('shop.single', $item['slug']) }}" class="cart-item-link">
                                        {{ $item['name'] }}
                                    </a>
                                </h6>
                                <div class="cart-item-meta">
                                    <span class="cart-item-price">${{ number_format($item['price'], 2) }}</span>
                                    <span class="cart-item-stock">In Stock</span>
                                </div>
                            </div>

                            <div class="cart-item-quantity">
                                <form method="POST" action="{{ route('cart.update', $item['slug']) }}" class="quantity-form">
                                    @csrf
                                    <div class="quantity-control">
                                        <button type="button" class="qty-btn qty-minus" onclick="decreaseQty(this)">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" name="quantity" min="1" class="qty-input" value="{{ $item['qty'] }}">
                                        <button type="button" class="qty-btn qty-plus" onclick="increaseQty(this)">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="cart-item-subtotal">
                                <span class="subtotal-label">Subtotal</span>
                                <span class="subtotal-price">${{ number_format($item['qty'] * $item['price'], 2) }}</span>
                            </div>

                            <div class="cart-item-actions">
                                <form method="POST" action="{{ route('cart.remove', $item['slug']) }}" style="display: inline;">
                                    @csrf
                                    <button class="btn-remove" type="submit" title="Remove from cart">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="cart-actions-bottom">
                        <a href="{{ route('shop') }}" class="btn-continue-shopping">
                            <i class="bi bi-arrow-left"></i> Continue Shopping
                        </a>
                        <form method="POST" action="{{ route('cart.clear') }}" style="display: inline;">
                            @csrf
                            <button class="btn-clear-cart" type="submit">
                                <i class="bi bi-trash"></i> Clear Cart
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Cart Summary Sidebar -->
                <div class="col-lg-4">
                    <div class="cart-summary-widget">
                        <div class="summary-header">
                            <h5>Order Summary</h5>
                        </div>

                        <div class="summary-content">
                            <div class="summary-item">
                                <span class="summary-label">Subtotal</span>
                                <span class="summary-value">${{ number_format($cart['total_price'], 2) }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Shipping</span>
                                <span class="summary-value shipping-free">FREE</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Tax</span>
                                <span class="summary-value">${{ number_format($cart['total_price'] * 0.1, 2) }}</span>
                            </div>

                            <div class="summary-divider"></div>

                            <div class="summary-total">
                                <span class="total-label">Total</span>
                                <span class="total-price">${{ number_format($cart['total_price'] * 1.1, 2) }}</span>
                            </div>

                            <p class="summary-note">
                                <i class="bi bi-info-circle"></i> Free shipping on all orders!
                            </p>

                            <a href="{{ route('checkout') }}" class="btn-checkout-primary">
                                <i class="bi bi-credit-card"></i> Proceed to Checkout
                            </a>

                            <button class="btn-continue-shopping-secondary" onclick="window.location.href='{{ route('shop') }}'">
                                Continue Shopping
                            </button>
                        </div>

                        <!-- Trust Badge -->
                        <div class="trust-badge">
                            <div class="trust-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Secure Checkout</span>
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-truck"></i>
                                <span>Fast Delivery</span>
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span>Easy Returns</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    /* Hero Section */
    .cart-hero-section {
        position: relative;
        overflow: hidden;
        background: #fff;
    }

    .cart-hero-wrapper {
        position: relative;
        height: 250px;
        display: flex;
        align-items: center;
    }

    .cart-hero-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="pattern" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse"><circle cx="60" cy="60" r="40" fill="rgba(255,107,107,0.1)"/><path d="M60,20 Q90,50 60,80 Q30,50 60,20" stroke="rgba(68,164,127,0.1)" stroke-width="2" fill="none"/></pattern></defs><rect width="1200" height="600" fill="%23274C5B"/><rect width="1200" height="600" fill="url(%23pattern)"/><rect width="1200" height="600" fill="rgba(104,164,127,0.3)"/></svg>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: 0;
    }

    .cart-hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
        color: white;
        animation: slideUp 0.8s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .cart-hero-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        letter-spacing: -0.5px;
    }

    .cart-hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-bottom: 0;
    }

    /* Cart Section */
    .cart-section {
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
    }

    /* Empty Cart */
    .empty-cart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 500px;
    }

    .empty-cart-content {
        text-align: center;
        max-width: 400px;
    }

    .empty-cart-icon {
        font-size: 100px;
        color: #68A47F;
        margin-bottom: 1.5rem;
        opacity: 0.8;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    .empty-cart-title {
        color: #274C5B;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .empty-cart-text {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .cart-cta-btn {
        background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%);
        color: white !important;
        padding: 0.8rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        transition: all 0.4s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .cart-cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(104, 164, 127, 0.3);
    }

    /* Cart Items */
    .cart-items-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .cart-items-header {
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 1.5rem;
    }

    .cart-items-header h5 {
        color: #274C5B;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding: 1.5rem;
        border-radius: 10px;
        border: 1px solid #f0f0f0;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .cart-item:hover {
        border-color: #68A47F;
        box-shadow: 0 8px 20px rgba(104, 164, 127, 0.15);
    }

    .cart-item-image {
        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .cart-item-image:hover img {
        transform: scale(1.1);
    }

    .cart-item-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(39, 76, 91, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .cart-item:hover .cart-item-overlay {
        opacity: 1;
    }

    .view-product-btn {
        color: white;
        text-decoration: none;
        background: #68A47F;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .view-product-btn:hover {
        background: #5a916d;
        color: white;
    }

    .cart-item-details {
        flex: 1;
    }

    .cart-item-name {
        color: #274C5B;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .cart-item-link {
        color: #274C5B;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .cart-item-link:hover {
        color: #68A47F;
    }

    .cart-item-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .cart-item-price {
        color: #68A47F;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .cart-item-stock {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .cart-item-quantity {
        flex-shrink: 0;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        background: white;
        transition: all 0.3s ease;
    }

    .quantity-control:hover {
        border-color: #68A47F;
    }

    .qty-btn {
        background: none;
        border: none;
        color: #68A47F;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .qty-btn:hover {
        background: #f0f0f0;
        color: #274C5B;
    }

    .qty-input {
        width: 50px;
        border: none;
        text-align: center;
        font-weight: 600;
        color: #274C5B;
        padding: 0;
    }

    .qty-input:focus {
        outline: none;
    }

    .cart-item-subtotal {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 100px;
        flex-shrink: 0;
    }

    .subtotal-label {
        font-size: 0.85rem;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.4rem;
    }

    .subtotal-price {
        color: #274C5B;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .cart-item-actions {
        flex-shrink: 0;
    }

    .btn-remove {
        background: #fff5f5;
        border: none;
        color: #d32f2f;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .btn-remove:hover {
        background: #d32f2f;
        color: white;
        transform: scale(1.1);
    }

    /* Cart Actions Bottom */
    .cart-actions-bottom {
        display: flex;
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .btn-continue-shopping {
        flex: 1;
        background: white;
        color: #274C5B;
        border: 2px solid #274C5B;
        padding: 0.9rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-continue-shopping:hover {
        background: #274C5B;
        color: white;
    }

    .btn-clear-cart {
        background: #fff5f5;
        color: #d32f2f;
        border: 2px solid #d32f2f;
        padding: 0.9rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-clear-cart:hover {
        background: #d32f2f;
        color: white;
    }

    /* Cart Summary Sidebar */
    .cart-summary-widget {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 100px;
    }

    .summary-header {
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 1.5rem;
    }

    .summary-header h5 {
        color: #274C5B;
        font-weight: 700;
        margin: 0;
    }

    .summary-content {
        padding: 0;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .summary-label {
        color: #666;
        font-weight: 500;
    }

    .summary-value {
        color: #274C5B;
        font-weight: 600;
        font-size: 1.05rem;
    }

    .shipping-free {
        color: #68A47F;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    .summary-divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, #f0f0f0, transparent);
        margin: 1.5rem 0;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 0;
    }

    .total-label {
        color: #274C5B;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .total-price {
        color: #68A47F;
        font-weight: 800;
        font-size: 1.5rem;
    }

    .summary-note {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 0.8rem;
        border-radius: 6px;
        font-size: 0.9rem;
        margin: 1.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-checkout-primary {
        width: 100%;
        background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%);
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.4s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        font-size: 1.05rem;
        margin-bottom: 1rem;
    }

    .btn-checkout-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(104, 164, 127, 0.3);
    }

    .btn-continue-shopping-secondary {
        width: 100%;
        background: #f0f0f0;
        color: #274C5B;
        padding: 0.9rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-continue-shopping-secondary:hover {
        background: #e0e0e0;
        color: #274C5B;
    }

    /* Trust Badge */
    .trust-badge {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #f0f0f0;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1rem;
    }

    .trust-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 0.5rem;
    }

    .trust-item i {
        font-size: 1.5rem;
        color: #68A47F;
    }

    .trust-item span {
        font-size: 0.85rem;
        color: #666;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cart-hero-title {
            font-size: 2rem;
        }

        .cart-item {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .cart-item-details {
            width: 100%;
        }

        .cart-item-meta {
            justify-content: center;
            flex-wrap: wrap;
        }

        .cart-summary-widget {
            position: relative;
            top: 0;
            margin-top: 2rem;
        }

        .trust-badge {
            grid-template-columns: 1fr;
        }
    }

    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 2px solid #68A47F;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 2rem;
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    function increaseQty(btn) {
        const input = btn.parentElement.querySelector('.qty-input');
        input.value = parseInt(input.value) + 1;
    }

    function decreaseQty(btn) {
        const input = btn.parentElement.querySelector('.qty-input');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endsection
