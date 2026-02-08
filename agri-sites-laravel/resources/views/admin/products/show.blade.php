@extends('admin.layouts.app')

@section('title','Product Details')

@php $asset = asset('assets'); @endphp

@section('content')
<style>
.premium-header {
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.premium-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
    border-radius: 50%;
}

.header-title {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    position: relative;
    z-index: 1;
}

.header-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0.5rem 0 0 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.premium-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    margin-bottom: 2rem;
}

.info-section-title {
    color: var(--og-primary);
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.detail-group {
    margin-bottom: 1.5rem;
}

.detail-label {
    color: var(--og-muted);
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.detail-value {
    color: var(--og-text);
    font-size: 1rem;
    font-weight: 500;
}

.price-badge {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
    margin-left: 0.5rem;
}

.category-badge {
    background: rgba(245, 158, 11, 0.15);
    color: var(--og-accent);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
    margin-left: 0.5rem;
}

.description-box {
    background: rgba(20, 184, 166, 0.05);
    padding: 1.5rem;
    border-left: 4px solid var(--og-primary);
    border-radius: 8px;
    color: var(--og-text);
    line-height: 1.6;
}

.action-btn {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.75rem 1.25rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    margin-bottom: 0.75rem;
    width: 100%;
    justify-content: center;
}

.action-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
    color: var(--og-primary);
}

.action-btn.edit {
    background: rgba(251, 146, 60, 0.15);
    color: var(--og-accent);
    border-color: rgba(245, 158, 11, 0.3);
}

.action-btn.edit:hover {
    background: rgba(251, 146, 60, 0.25);
    border-color: rgba(245, 158, 11, 0.5);
}

.action-btn.view-site {
    background: rgba(34, 197, 94, 0.15);
    color: #10b981;
    border-color: rgba(34, 197, 94, 0.3);
}

.action-btn.view-site:hover {
    background: rgba(34, 197, 94, 0.25);
    border-color: rgba(34, 197, 94, 0.5);
}

.image-container {
    background: rgba(20, 184, 166, 0.05);
    border: 2px dashed rgba(20, 184, 166, 0.2);
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 300px;
}

.image-placeholder {
    color: var(--og-muted);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.image-placeholder i {
    font-size: 3rem;
    opacity: 0.3;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0.5rem 0 0 0;
}

.breadcrumb-item {
    color: rgba(255, 255, 255, 0.6);
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: var(--og-primary);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="premium-header">
            <div>
                <h1 class="header-title">Product Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="premium-card">
                    <h5 class="info-section-title">
                        <i class="fas fa-info-circle me-2"></i>Product Information
                    </h5>

                    <div class="detail-group">
                        <h6 style="color: var(--og-primary); margin-bottom: 1rem; font-weight: 700;">Basic Details</h6>
                        <div class="mb-3">
                            <span class="detail-label">Product ID</span>
                            <div class="detail-value">#{{ $product->id }}</div>
                        </div>
                        <div class="mb-3">
                            <span class="detail-label">Name</span>
                            <div class="detail-value">{{ $product->name }}</div>
                        </div>
                        <div class="mb-3">
                            <span class="detail-label">Slug</span>
                            <div class="detail-value" style="font-family: monospace;">{{ $product->slug }}</div>
                        </div>
                        <div class="mb-3">
                            <span class="detail-label">Category</span>
                            <div class="detail-value">
                                @php
                                    $categoryName = null;
                                    if ($product->category_id) {
                                        $categoryObj = \App\Models\Category::find($product->category_id);
                                        if ($categoryObj) {
                                            $categoryName = $categoryObj->name;
                                        } elseif (is_string($product->category)) {
                                            $categoryName = $product->category;
                                        }
                                    }
                                @endphp
                                
                                @if($categoryName)
                                    <span class="category-badge">{{ $categoryName }}</span>
                                @else
                                    <span style="color: #9ca3af; font-size: 0.9rem;">No category assigned</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="detail-label">Original Price</span>
                            <div class="detail-value" style="text-decoration: line-through; opacity: 0.7;">₹{{ number_format($product->original_price, 2) }}</div>
                        </div>
                        @if($product->sale_price && $product->sale_price < $product->original_price)
                        <div class="mb-3">
                            <span class="detail-label">Sale Price</span>
                            <div class="detail-value" style="color: #10b981; font-size: 1.2rem;">
                                ₹{{ number_format($product->sale_price, 2) }}
                                <span class="price-badge" style="background: rgba(74, 222, 128, 0.15); color: #10b981;">
                                    {{ round((($product->original_price - $product->sale_price) / $product->original_price) * 100) }}% OFF
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div style="margin-top: 2rem;">
                        <h6 style="color: var(--og-primary); margin-bottom: 1rem; font-weight: 700;">Description</h6>
                        <div class="description-box">
                            {{ $product->description ?? 'No description available for this product.' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="premium-card">
                    <h6 class="info-section-title">
                        <i class="fas fa-image me-2"></i>Product Image
                    </h6>
                    @if($product->image)
                        <div class="image-container">
                            <img src="{{ $asset }}/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 400px; width: 100%; object-fit: contain;">
                        </div>
                    @else
                        <div class="image-container">
                            <div class="image-placeholder">
                                <i class="fas fa-image"></i>
                                <span>No image available</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="premium-card">
                    <h6 class="info-section-title">
                        <i class="fas fa-cog me-2"></i>Quick Actions
                    </h6>
                    <div style="display: grid; gap: 0.75rem;">
                        <a href="{{ route('admin.products.edit', $product) }}" class="action-btn edit">
                            <i class="fas fa-pencil-alt"></i>Edit Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="action-btn">
                            <i class="fas fa-arrow-left"></i>Back to Products
                        </a>
                        <a href="{{ route('shop.single', $product->slug) }}" target="_blank" class="action-btn view-site">
                            <i class="fas fa-eye"></i>View on Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection