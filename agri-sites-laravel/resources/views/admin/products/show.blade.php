@extends('admin.layouts.app')

@section('title','Product Details')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Product Details</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card p-4 mb-4">
                <h5 class="mb-4">
                    <i class="bi bi-info-circle me-2"></i>Product Information
                </h5>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="border-start border-primary border-4 ps-3">
                            <h6 class="text-primary mb-3">Basic Details</h6>
                            <div class="mb-2">
                                <strong class="text-muted">ID:</strong>
                                <span class="badge bg-primary ms-2">#{{ $product->id }}</span>
                            </div>
                            <div class="mb-2">
                                <strong class="text-muted">Name:</strong>
                                <span>{{ $product->name }}</span>
                            </div>
                            <div class="mb-2">
                                <strong class="text-muted">Slug:</strong>
                                <code>{{ $product->slug }}</code>
                            </div>
                            <div class="mb-2">
                                <strong class="text-muted">Category:</strong>
                                <span class="badge bg-info">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border-start border-success border-4 ps-3">
                            <h6 class="text-success mb-3">Pricing & Rating</h6>
                            <div class="mb-2">
                                <strong class="text-muted">Original Price:</strong>
                                <span class="text-decoration-line-through text-muted">₹{{ $product->original_price }}</span>
                            </div>
                            @if($product->sale_price && $product->sale_price < $product->original_price)
                            <div class="mb-2">
                                <strong class="text-muted">Sale Price:</strong>
                                <span class="text-success fw-bold fs-5">₹{{ $product->sale_price }}</span>
                                <span class="badge bg-success ms-2">
                                    {{ round((($product->original_price - $product->sale_price) / $product->original_price) * 100) }}% OFF
                                </span>
                            </div>
                            @endif
                            <div class="mb-2">
                                <strong class="text-muted">Rating:</strong>
                                @if($product->rating)
                                    <span class="text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->rating)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="ms-2">{{ $product->rating }}/5</span>
                                @else
                                    <span class="text-muted">Not rated yet</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-12">
                        <div class="border-start border-info border-4 ps-3">
                            <h6 class="text-info mb-3">Description</h6>
                            <div class="bg-light p-3 rounded">
                                {{ $product->description ?? 'No description available for this product.' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card p-4 mb-4">
                <h6 class="mb-3">
                    <i class="bi bi-image me-2"></i>Product Image
                </h6>
                @if($product->image)
                    <div class="text-center">
                        <img src="{{ asset('assets/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                    </div>
                @else
                    <div class="text-center p-4 bg-light rounded">
                        <i class="bi bi-image text-muted fs-1"></i>
                        <p class="text-muted mt-2">No image available</p>
                    </div>
                @endif
            </div>

            <div class="card p-4">
                <h6 class="mb-3">
                    <i class="bi bi-gear me-2"></i>Quick Actions
                </h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Product
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Back to Products
                    </a>
                    <a href="{{ route('shop.single', $product->slug) }}" target="_blank" class="btn btn-outline-success">
                        <i class="bi bi-eye me-2"></i>View on Site
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection