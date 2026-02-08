@extends('admin.layouts.app')

@section('title','Edit Product')

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

.premium-form-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    animation: fadeInUp 0.5s ease-out;
}

.form-label {
    color: var(--og-text);
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 0.75rem;
}

.form-control, .form-select {
    background: rgba(20, 184, 166, 0.05);
    border: 1px solid rgba(20, 184, 166, 0.3);
    color: var(--og-text);
    padding: 0.75rem 1rem;
    border-radius: 8px;
}

.form-control:focus, .form-select:focus {
    background: rgba(20, 184, 166, 0.08);
    border-color: rgba(20, 184, 166, 0.6);
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.15);
    color: var(--og-text);
}

.form-control::placeholder {
    color: var(--og-muted);
}

.submit-btn {
    background: linear-gradient(135deg, var(--og-primary), #0f766e);
    color: #fff;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(20, 184, 166, 0.25);
}

.cancel-btn {
    background: rgba(20, 184, 166, 0.1);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
}

.cancel-btn:hover {
    background: rgba(20, 184, 166, 0.15);
    border-color: rgba(20, 184, 166, 0.5);
}

.text-danger {
    color: #ef4444 !important;
    font-size: 0.85rem;
    margin-top: 0.375rem;
    display: block;
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

<section class="hero-section" data-aos="fade-up">
    <div class="container-fluid p-0">
        <div class="premium-header">
            <div class="text-center">
                <h1 class="header-title">Edit Product</h1>
                <p class="header-subtitle">Update the product information</p>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="premium-form-card">
                <form action="{{ route('admin.products.update', $product) }}" method="POST">
                    @csrf @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Product Name *</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" required placeholder="Enter product name">
                                    @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">-- None --</option>
                                        @foreach($categories as $c)
                                        <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="original_price" class="form-label">Original Price *</label>
                                    <input type="number" name="original_price" value="{{ $product->original_price }}" step="0.01" class="form-control" required placeholder="Enter original price">
                                    @error('original_price')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_price" class="form-label">Sale Price *</label>
                                    <input type="number" name="sale_price" value="{{ $product->sale_price }}" step="0.01" class="form-control" required placeholder="Enter sale price">
                                    @error('sale_price')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug *</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" required placeholder="e.g., my-product-name">
                                    @error('slug')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <input type="number" name="rating" value="{{ $product->rating ?? 0 }}" min="0" max="5" step="0.1" class="form-control" placeholder="0 - 5">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image (filename)</label>
                                <input type="text" name="image" value="{{ $product->image }}" class="form-control" placeholder="e.g., product-image.jpg">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Enter product description">{{ $product->description }}</textarea>
                            </div>

                    <div style="display: flex; gap: 1rem;">
                        <button type="submit" class="submit-btn">Update Product</button>
                        <a href="{{ route('admin.products.index') }}" class="cancel-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
