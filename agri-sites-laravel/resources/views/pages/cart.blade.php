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
            <p>Your cart is empty. <a href="{{ route('shop') }}">Go shopping</a>.</p>
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

            <div class="d-flex justify-content-between align-items-center mt-3">
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    <button class="btn btn-outline-secondary" type="submit">Clear Cart</button>
                </form>
                <div>
                    <strong>Total ({{ $cart['total_qty'] }} items):</strong>
                    <span class="ms-2">${{ number_format($cart['total_price'], 2) }}</span>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
