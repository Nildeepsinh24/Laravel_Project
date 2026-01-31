@extends('admin.layouts.app')

@section('title','Edit Product')

@section('content')
<section class="hero-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content text-center">
                    <h1 class="hero-title">Edit Product</h1>
                    <p class="hero-subtitle">Update the product information</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
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

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
