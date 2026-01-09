@extends('layouts.app')

@section('title', 'Shop')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row shop-main-row">
                <h1 class="abt-hiro-head">Shop</h1>
            </div>
        </div>
    </section>

    <section id="card-section">
        <div class="container">
            <div class="row card-row-section">
                @foreach($products as $product)
                <div class="col-md-3 card-cl-four card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('shop.single', $product->slug) }}">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">{{ $product->category }}</span>
                                <img src="{{ $asset }}/{{ $product->image }}" class="img-fluid c-8mtmb" alt="{{ $product->name }}">
                                <h6 class="card-text crd-hsix">{{ $product->name }}</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>${{ number_format($product->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">${{ number_format($product->sale_price, 2) }}</h6>
                                    </div>
                                    <div class="star">
                                        @for($i = 0; $i < $product->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
