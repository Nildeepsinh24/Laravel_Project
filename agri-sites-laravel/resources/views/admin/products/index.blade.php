@extends('admin.layouts.app')

@section('title','Products')

@section('content')
@php $asset = asset('assets'); @endphp
<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: var(--og-primary); color: white;">
                <div class="hiro-cnct-btn text-center">
                    <h6 class="hiro-headsix">Admin Panel</h6>
                    <h1 class="hiro-head-one">Products Management</h1>
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
                    <h4 class="mb-3" style="color: var(--og-text);">Product Records</h4>
                    @foreach($categories as $category)
                    <h5 style="color: var(--og-text); margin-top: 20px;">{{ $category->name }}</h5>
                    <table class="table table-striped">
                        <thead style="background: var(--og-primary-soft);">
                            <tr>
                                <th style="color: var(--og-text);">ID</th>
                                <th style="color: var(--og-text);">Name</th>
                                <th style="color: var(--og-text);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->products as $product)
                            <tr>
                                <td style="color: var(--og-text);">{{ $product->id }}</td>
                                <td style="color: var(--og-text);">{{ $product->name }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show',$product->id) }}" class="btn btn-sm" style="background: var(--og-primary); color: white;">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach
                    @if($uncategorized->count() > 0)
                    <h5 style="color: var(--og-text); margin-top: 20px;">Uncategorized</h5>
                    <table class="table table-striped">
                        <thead style="background: var(--og-primary-soft);">
                            <tr>
                                <th style="color: var(--og-text);">ID</th>
                                <th style="color: var(--og-text);">Name</th>
                                <th style="color: var(--og-text);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uncategorized as $product)
                            <tr>
                                <td style="color: var(--og-text);">{{ $product->id }}</td>
                                <td style="color: var(--og-text);">{{ $product->name }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show',$product->id) }}" class="btn btn-sm" style="background: var(--og-primary); color: white;">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
