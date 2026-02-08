@extends('admin.layouts.app')

@section('title','Products')

@section('content')
@php $asset = asset('assets'); @endphp

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
    margin: 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.add-product-btn {
    background: #fff;
    color: var(--og-primary);
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 1;
}

.add-product-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
    color: var(--og-primary-strong);
}

.premium-products-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

.category-section {
    margin-bottom: 2.5rem;
    animation: fadeInUp 0.5s ease-out;
}

.category-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    background: linear-gradient(90deg, rgba(20, 184, 166, 0.15), rgba(20, 184, 166, 0.05));
    border-left: 4px solid var(--og-primary);
    border-radius: 10px;
    margin-bottom: 1.25rem;
    transition: all 0.3s ease;
}

.category-header:hover {
    background: linear-gradient(90deg, rgba(20, 184, 166, 0.25), rgba(20, 184, 166, 0.1));
    transform: translateX(4px);
}

.category-header i {
    font-size: 1.25rem;
    color: var(--og-primary);
}

.category-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
}

.category-header.uncategorized {
    border-left-color: var(--og-accent);
    background: linear-gradient(90deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.05));
}

.category-header.uncategorized:hover {
    background: linear-gradient(90deg, rgba(245, 158, 11, 0.25), rgba(245, 158, 11, 0.1));
}

.category-header.uncategorized i {
    color: var(--og-accent);
}

.products-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.products-table thead th {
    background: rgba(20, 184, 166, 0.08);
    color: var(--og-primary);
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem;
    border-bottom: 2px solid rgba(20, 184, 166, 0.2);
}

.products-table tbody tr {
    transition: all 0.25s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.products-table tbody tr:hover {
    background: rgba(20, 184, 166, 0.08);
    transform: translateX(4px);
}

.products-table tbody td {
    padding: 1.25rem 1rem;
    color: var(--og-text);
    vertical-align: middle;
}

.product-id {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
}

.product-name {
    font-weight: 500;
    color: #e5e7eb;
}

.price-original {
    text-decoration: line-through;
    color: #9ca3af;
    font-size: 0.9rem;
}

.price-sale {
    color: #10b981;
    font-weight: 700;
    font-size: 1.05rem;
    margin-left: 0.5rem;
}

.price-regular {
    font-weight: 600;
    color: #e5e7eb;
    font-size: 1.05rem;
}

.view-btn {
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    transition: all 0.3s ease;
}

.view-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(20, 184, 166, 0.25);
}

.empty-state {
    text-align: center;
    padding: 3rem 1rem;
    color: #9ca3af;
}

.empty-state i {
    font-size: 3rem;
    opacity: 0.3;
    margin-bottom: 1rem;
    display: block;
}

.empty-state span {
    font-size: 0.95rem;
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
        <div class="row hiro-main">
            <div class="col-md-12">
                <div class="premium-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="header-title">Products Management</h1>
                            <p class="header-subtitle mt-2">Manage your entire product inventory</p>
                        </div>
                        <a href="{{ route('admin.products.create') }}" class="add-product-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add New Product</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="premium-products-card">
            @foreach($categories as $category)
            <div class="category-section">
                <div class="category-header">
                    <i class="fas fa-folder"></i>
                    <h6 class="category-title">{{ $category->name }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Pricing</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($category->products as $product)
                            <tr>
                                <td>
                                    <span class="product-id">#{{ $product->id }}</span>
                                </td>
                                <td>
                                    <span class="product-name">{{ $product->name }}</span>
                                </td>
                                <td>
                                    @if($product->sale_price && $product->sale_price < $product->original_price)
                                        <span class="price-original">₹{{ number_format($product->original_price, 2) }}</span>
                                        <span class="price-sale">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="price-regular">₹{{ number_format($product->original_price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="view-btn">
                                        <i class="fas fa-eye"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <span>No products in this category</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach

            @if($uncategorized->count() > 0)
            <div class="category-section">
                <div class="category-header uncategorized">
                    <i class="fas fa-question-circle"></i>
                    <h6 class="category-title">Uncategorized</h6>
                </div>
                <div class="table-responsive">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Pricing</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uncategorized as $product)
                            <tr>
                                <td>
                                    <span class="product-id">#{{ $product->id }}</span>
                                </td>
                                <td>
                                    <span class="product-name">{{ $product->name }}</span>
                                </td>
                                <td>
                                    @if($product->sale_price && $product->sale_price < $product->original_price)
                                        <span class="price-original">₹{{ number_format($product->original_price, 2) }}</span>
                                        <span class="price-sale">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="price-regular">₹{{ number_format($product->original_price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="view-btn">
                                        <i class="fas fa-eye"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
