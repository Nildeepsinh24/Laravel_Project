@extends('admin.layouts.app')

@section('title','Products')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Products Management</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Add New Product
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <h5 class="mb-4">Product Records</h5>

                @foreach($categories as $category)
                <div class="mb-4">
                    <h6 class="mb-3 text-primary border-bottom pb-2">
                        <i class="bi bi-folder me-2"></i>{{ $category->name }}
                    </h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">ID</th>
                                    <th class="fw-semibold">Name</th>
                                    <th class="fw-semibold">Price</th>
                                    <th class="fw-semibold text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category->products as $product)
                                <tr>
                                    <td class="align-middle">#{{ $product->id }}</td>
                                    <td class="align-middle">
                                        {{ $product->name }}
                                    </td>
                                    <td class="align-middle">
                                        @if($product->sale_price && $product->sale_price < $product->original_price)
                                            <span class="text-decoration-line-through text-muted">₹{{ $product->original_price }}</span>
                                            <span class="text-success fw-bold ms-2">₹{{ $product->sale_price }}</span>
                                        @else
                                            <span class="fw-bold">₹{{ $product->original_price }}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        No products in this category
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach

                @if($uncategorized->count() > 0)
                <div class="mb-4">
                    <h6 class="mb-3 text-warning border-bottom pb-2">
                        <i class="bi bi-question-circle me-2"></i>Uncategorized
                    </h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">ID</th>
                                    <th class="fw-semibold">Name</th>
                                    <th class="fw-semibold">Price</th>
                                    <th class="fw-semibold text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uncategorized as $product)
                                <tr>
                                    <td class="align-middle">#{{ $product->id }}</td>
                                    <td class="align-middle">
                                        {{ $product->name }}
                                    </td>
                                    <td class="align-middle">
                                        @if($product->sale_price && $product->sale_price < $product->original_price)
                                            <span class="text-decoration-line-through text-muted">₹{{ $product->original_price }}</span>
                                            <span class="text-success fw-bold ms-2">₹{{ $product->sale_price }}</span>
                                        @else
                                            <span class="fw-bold">₹{{ $product->original_price }}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>View
                                            </a>
                                        </div>
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
    </div>
</div>
@endsection
