@extends('layouts.app')

@section('title', 'Portfolio')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row portfolio-main-row">
                <h1 class="abt-hiro-head prtflo-h1">Portfolio Standard</h1>
            </div>
        </div>
    </section>

    <div class="container portfolio-content-main">
        <div class="row mt-4">
            <div class="col d-flex gap-2 align-items-center flex-wrap">
                <a href="{{ route('portfolio') }}" class="btn btn-sm {{ empty($category) ? 'btn-success' : 'btn-outline-success' }}">All</a>
                @foreach($categories as $cat)
                    <a href="{{ route('portfolio', ['category' => $cat]) }}" class="btn btn-sm {{ $category === $cat ? 'btn-success' : 'btn-outline-success' }}">{{ $cat }}</a>
                @endforeach
            </div>
        </div>

        <div class="row prtflo-row mt-4">
            @forelse($items as $idx => $item)
            <div class="col-md-4 mb-4">
                <a href="{{ route('portfolio.show', $item->slug) }}">
                    <div class="card portcard h-100">
                        <img src="{{ $asset }}/{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">{{ $item->title }}</p>
                            <p class="p-c-s-two">{{ $item->category }}</p>
                            @if($item->excerpt)
                            <p class="text-muted small mb-0">{{ $item->excerpt }}</p>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <p class="text-muted">No portfolio items found.</p>
            </div>
            @endforelse
        </div>
    </div>

    @include('partials.newsletter')
@endsection
