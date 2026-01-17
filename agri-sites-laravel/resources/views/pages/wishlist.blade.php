@extends('layouts.app')

@section('title', 'My Wishlist')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row shop-main-row">
                <h1 class="abt-hiro-head">My Wishlist</h1>
            </div>
        </div>
    </section>

    <section id="card-section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row card-row-section">
                @forelse($wishlists as $index => $wishlist)
                <div class="col-md-3 @switch($index % 4)
                    @case(0)card-cl-one@break
                    @case(1)card-cl-two@break
                    @case(2)card-cl-three@break
                    @case(3)card-cl-four@break
                @endswitch card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card section-3-card-main position-relative">
                        <form method="POST" action="{{ route('wishlist.remove', $wishlist->product->slug) }}" class="position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger rounded-circle" style="width: 35px; height: 35px;" title="Remove from Wishlist">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        </form>
                        <a href="{{ route('shop.single', $wishlist->product->slug) }}">
                            <div class="card-body">
                                <span class="card-title ctone">{{ $wishlist->product->category }}</span>
                                <img src="{{ $asset }}/{{ $wishlist->product->image }}" class="img-fluid c-8mtmb" alt="{{ $wishlist->product->name }}">
                                <h6 class="card-text crd-hsix">{{ $wishlist->product->name }}</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>₹{{ number_format($wishlist->product->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">₹{{ number_format($wishlist->product->sale_price, 2) }}</h6>
                                    </div>
                                    <div class="star">
                                        @for($i = 0; $i < $wishlist->product->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-heart" style="font-size: 4rem; color: #ddd;"></i>
                    <h4 class="mt-3">Your wishlist is empty</h4>
                    <p class="text-muted">Start adding products you love!</p>
                    <a href="{{ route('shop') }}" class="btn btn-success mt-3">Browse Products</a>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
