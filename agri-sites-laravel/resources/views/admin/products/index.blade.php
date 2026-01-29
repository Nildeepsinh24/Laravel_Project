@extends('admin.layouts.app')

@section('title','Products')

@section('content')
<style>
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
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .products-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #edf2f7 100%);
        padding: 30px;
        border-radius: 10px;
        animation: fadeInUp 0.6s ease;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        animation: slideInRight 0.6s ease;
    }
    .header-section h2 {
        margin: 0;
        color: #1a202c;
        font-weight: 800;
        font-size: 32px;
    }
    .btn-add-product {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 14px 28px;
        border-radius: 8px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }
    .btn-add-product::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255,255,255,0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    .btn-add-product:hover::before {
        width: 300px;
        height: 300px;
    }
    .btn-add-product:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
    }
    .category-section {
        background: white;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease;
        animation-fill-mode: both;
        border-top: 4px solid #667eea;
    }
    .category-section:nth-child(2) { animation-delay: 0.1s; }
    .category-section:nth-child(3) { animation-delay: 0.2s; }
    .category-section:nth-child(4) { animation-delay: 0.3s; }
    .category-section:nth-child(5) { animation-delay: 0.4s; }
    .category-section:nth-child(6) { animation-delay: 0.5s; }
    .category-section:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    .category-header {
        background: linear-gradient(135deg, #f8f9fb 0%, #ffffff 100%);
        border-bottom: 3px solid #667eea;
        color: #1a202c;
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .category-header:hover {
        border-bottom-color: #5568d3;
        background: linear-gradient(135deg, #f0f4ff 0%, #ffffff 100%);
    }
    .category-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #667eea;
        letter-spacing: 0.3px;
    }
    .category-count {
        background: #e2e8f0;
        color: #2d3748;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
    }
    .category-content {
        padding: 20px;
    }
    .product-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px;
        border-bottom: 1px solid #e2e8f0;
        transition: all 0.2s ease;
        border-radius: 8px;
        margin-bottom: 8px;
    }
    .product-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
    .product-item:hover {
        background: linear-gradient(90deg, #f7fafc 0%, #edf2f7 100%);
        transform: translateX(4px);
    }
    .product-info {
        flex-grow: 1;
    }
    .product-name {
        font-weight: 700;
        color: #2d3748;
        font-size: 16px;
        margin-bottom: 6px;
        transition: color 0.2s ease;
    }
    .product-item:hover .product-name {
        color: #667eea;
    }
    .product-price {
        color: #667eea;
        font-weight: 800;
        font-size: 17px;
    }
    .product-original-price {
        color: #a0aec0;
        font-size: 13px;
        text-decoration: line-through;
        margin-left: 8px;
    }
    .product-actions {
        display: flex;
        gap: 10px;
        margin-left: 16px;
    }
    .product-actions .btn {
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .btn-edit {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
    }
    .btn-edit:hover {
        background: linear-gradient(135deg, #5568d3 0%, #4652ba 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    .btn-delete {
        background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
        color: white;
    }
    .btn-delete:hover {
        background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(252, 129, 129, 0.4);
    }
    .empty-category {
        text-align: center;
        padding: 40px;
        color: #a0aec0;
        font-size: 15px;
    }
    .uncategorized-section {
        margin-top: 30px;
    }
</style>

<div class="products-container">
    <div class="header-section">
        <h2>Products Management</h2>
        <a href="{{ route('admin.products.create') }}" class="btn-add-product">
            <i class="bi bi-plus-circle"></i> Add New Product
        </a>
    </div>

    @forelse($categories as $category)
        <div class="category-section">
            <div class="category-header">
                <h4>{{ $category->name }}</h4>
                <span class="category-count"><i class="bi bi-box-seam"></i> {{ $category->products->count() }}</span>
            </div>
            <div class="category-content">
                @if($category->products->count() > 0)
                    @foreach($category->products as $product)
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-name">{{ $product->name }}</div>
                                <div>
                                    <span class="product-price">₹{{ number_format($product->sale_price, 2) }}</span>
                                    <span class="product-original-price">₹{{ number_format($product->original_price, 2) }}</span>
                                </div>
                            </div>
                            <div class="product-actions">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-category">No products in this category</div>
                @endif
            </div>
        </div>
    @empty
        <div class="category-section">
            <div class="category-header">
                <h4>No Categories</h4>
            </div>
            <div class="empty-category">Create a category first to add products</div>
        </div>
    @endforelse

    @if($uncategorized->count() > 0)
        <div class="category-section uncategorized-section">
            <div class="category-header" style="background: linear-gradient(135deg, #fc8181 0%, #f687b3 100%);">
                <h4><i class="bi bi-exclamation-triangle"></i> Uncategorized</h4>
                <span class="category-count">{{ $uncategorized->count() }} products</span>
            </div>
            <div class="category-content">
                @foreach($uncategorized as $product)
                    <div class="product-item">
                        <div class="product-info">
                            <div class="product-name">{{ $product->name }}</div>
                            <div>
                                <span class="product-price">₹{{ number_format($product->sale_price, 2) }}</span>
                                <span class="product-original-price">₹{{ number_format($product->original_price, 2) }}</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-edit">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
