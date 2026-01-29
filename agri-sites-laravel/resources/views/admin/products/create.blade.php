@extends('admin.layouts.app')

@section('title','Create Product')

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
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .create-product-wrapper {
        background: linear-gradient(135deg, #f8f9fa 0%, #edf2f7 100%);
        padding: 30px;
        border-radius: 10px;
        animation: fadeInUp 0.6s ease;
    }
    .form-container {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        max-width: 700px;
        margin: 0 auto;
        animation: fadeInUp 0.6s ease 0.1s both;
    }
    .form-header {
        margin-bottom: 30px;
        animation: slideInRight 0.6s ease 0.2s both;
    }
    .form-header h2 {
        color: #1a202c;
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 28px;
    }
    .form-header p {
        color: #718096;
        margin: 0;
        font-size: 14px;
    }
    .form-group {
        margin-bottom: 24px;
    }
    .form-group label {
        display: block;
        color: #2d3748;
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
        color: #2d3748;
        background: #f7fafc;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    .form-error {
        color: #e53e3e;
        font-size: 12px;
        margin-top: 6px;
        font-weight: 600;
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }
    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #5568d3 100%);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        flex: 1;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #5568d3 0%, #4652ba 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    .btn-cancel {
        background: #e2e8f0;
        color: #2d3748;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-cancel:hover {
        background: #cbd5e0;
        color: #1a202c;
        text-decoration: none;
        transform: translateY(-2px);
    }
</style>

<div class="create-product-wrapper">
    <div class="form-container">
        <div class="form-header">
            <h2>Add New Product</h2>
            <p>Fill in the product details below</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Product Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter product name">
                @error('name')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id">
                        <option value="">-- None --</option>
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <input type="number" name="rating" value="{{ old('rating', 0) }}" min="0" max="5" step="0.1" placeholder="0 - 5">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Original Price *</label>
                    <input type="number" name="original_price" value="{{ old('original_price') }}" step="0.01" required placeholder="Enter original price">
                    @error('original_price')<span class="form-error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Sale Price *</label>
                    <input type="number" name="sale_price" value="{{ old('sale_price') }}" step="0.01" required placeholder="Enter sale price">
                    @error('sale_price')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <label>Slug *</label>
                <input type="text" name="slug" value="{{ old('slug') }}" required placeholder="e.g., my-product-name">
                @error('slug')<span class="form-error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Image (filename)</label>
                <input type="text" name="image" value="{{ old('image') }}" placeholder="e.g., product-image.jpg">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Create Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
