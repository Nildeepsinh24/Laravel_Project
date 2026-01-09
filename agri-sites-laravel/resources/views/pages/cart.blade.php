@extends('layouts.app')

@section('title', 'Your Cart')

@php $asset = asset('assets'); @endphp

@section('content')
<section id="about-hiro-section">
    <div class="container-fluid p-0">
        <div class="row shop-single-main-row">
            <h1 class="abt-hiro-head">Your Cart</h1>
        </div>
    </div>
</section>

<section class="cart-section">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if(empty($cart['items']))
            <div class="text-center py-5">
                <i class="bi bi-cart-x" style="font-size: 80px; color: #ccc;"></i>
                <h3 class="mt-3">Your cart is empty</h3>
                <p class="text-muted">Start shopping to add items to your cart!</p>
                <a href="{{ route('shop') }}" class="btn btn-success btn-lg mt-3" style="padding: 12px 40px; border-radius: 50px;">
                    Browse Products &nbsp;<i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart['items'] as $item)
                        <tr>
                            <td style="width:100px">
                                <a href="{{ route('shop.single', $item['slug']) }}">
                                    <img src="{{ $asset }}/{{ $item['image'] }}" class="img-fluid" alt="{{ $item['name'] }}">
                                </a>
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td style="width:160px">
                                <form method="POST" action="{{ route('cart.update', $item['slug']) }}" class="d-flex gap-2">
                                    @csrf
                                    <input type="number" name="quantity" min="0" class="form-control" value="{{ $item['qty'] }}">
                                    <button class="btn btn-sm btn-outline-success" type="submit">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['qty'] * $item['price'], 2) }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.remove', $item['slug']) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    <button class="btn btn-outline-secondary" type="submit">Clear Cart</button>
                </form>
                <div class="cart-summary">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <strong>Total ({{ $cart['total_qty'] }} items):</strong>
                            <h3 class="text-success mb-0 d-inline ms-2">${{ number_format($cart['total_price'], 2) }}</h3>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-success btn-lg" style="padding: 12px 40px; border-radius: 50px; font-weight: 600;">
                            Proceed to Checkout &nbsp;<i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
