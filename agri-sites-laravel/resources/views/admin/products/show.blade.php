@extends('admin.layouts.app')

@section('title','Product Details')

@section('content')
@php $asset = asset('assets'); @endphp
<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: var(--og-primary); color: white;">
                <div class="hiro-cnct-btn text-center">
                    <h6 class="hiro-headsix">Admin Panel</h6>
                    <h1 class="hiro-head-one">Product Details</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cnct-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4" style="background: var(--og-card); border: 1px solid var(--og-primary-soft);">
                    <h4 class="mb-3" style="color: var(--og-text);">Product Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong style="color: var(--og-text);">ID:</strong> {{ $product->id }}</p>
                            <p><strong style="color: var(--og-text);">Name:</strong> {{ $product->name }}</p>
                            <p><strong style="color: var(--og-text);">Slug:</strong> {{ $product->slug }}</p>
                            <p><strong style="color: var(--og-text);">Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong style="color: var(--og-text);">Original Price:</strong> ₹{{ $product->original_price }}</p>
                            <p><strong style="color: var(--og-text);">Sale Price:</strong> ₹{{ $product->sale_price }}</p>
                            <p><strong style="color: var(--og-text);">Rating:</strong> {{ $product->rating ?? 'N/A' }}</p>
                            <p><strong style="color: var(--og-text);">Image:</strong> {{ $product->image ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong style="color: var(--og-text);">Description:</strong></p>
                            <p style="color: var(--og-text);">{{ $product->description ?? 'No description' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="btn" style="background: var(--og-primary); color: white;">Back to Products</a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn" style="background: var(--og-primary); color: white; margin-left: 10px;">Edit Product</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection