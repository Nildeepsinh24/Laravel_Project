@extends('layouts.app')

@section('title', $item->title)

@php 
    $asset = asset('assets');
    
    // Map categories to background images
    $categoryBackgrounds = [
        'Fruits' => 'portfolio-single-main-rowimg.png',
        'Farmer' => 'hiro-service-single-main-one.jpg',
        'Leaf' => 'clean-video-bg-main.png',
    ];
    
    $bgImage = $categoryBackgrounds[$item->category] ?? 'portfolio-single-main-rowimg.png';
@endphp

@section('content')
    <section id="about-hiro-section" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $asset }}/{{ $bgImage }}') center/cover no-repeat;">
        <div class="container-fluid p-0">
            <div class="row portfolio-single-main-row">
                <h1 class="portfolio-single-hiro-head">{{ $item->title }}</h1>
            </div>
        </div>
    </section>

    <div class="container p-s-cnct-cntr-main">
        <div class="row s-row-p-main">
            <div class="col-md-8 cl-mn-s-p-one" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="service-single-hedcnct-one-1head-oactmd">{{ $item->title }}</h2>
                @if($item->excerpt)
                <p class="service-single-pera-first-cnct-one-1-pera mt-2">{{ $item->excerpt }}</p>
                @endif
            </div>
            <div class="col-md-4 cl-mn-s-p-two" data-aos="fade-up" data-aos-duration="1500">
                <div class="d-c-c-s-main">
                    <div class="date-mn">
<pre> <span class="d-m">Date          :  </span><span class="d-emn">{{ optional($item->published_at)->format('F j, Y') }}</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Client        :  </span><span class="d-emn">{{ $item->client ?? 'N/A' }}</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Category  :  </span><span class="d-emn">{{ $item->category }}</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Service      :  </span><span class="d-emn">{{ $item->service ?? '—' }}</span></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ps-c-two-mnctr">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="portfolio-image-wrapper mb-4 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ $asset }}/{{ $item->image }}" class="img-fluid rounded shadow-sm" alt="{{ $item->title }}" style="max-height: 500px; object-fit: cover; width: 100%;">
                    <div class="mt-3 p-3 bg-light rounded">
                        <h5 class="text-success mb-2">{{ $item->service ?? 'Portfolio' }}</h5>
                        @if($item->excerpt)
                            <p class="text-muted mb-0">{{ $item->excerpt }}</p>
                        @endif
                    </div>
                </div>
                
                @if($item->description)
                    <div class="portfolio-description" style="line-height: 1.8; color: #555;">
                        {!! $item->description !!}
                    </div>
                @else
                    <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">Details coming soon.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @if(isset($related) && $related->count())
            <h3 class="service-single-hedcnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">Related Projects</h3>
            <div class="row mt-3">
                @foreach($related as $rel)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('portfolio.show', $rel->slug) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="{{ $asset }}/{{ $rel->image }}" class="card-img-top" alt="{{ $rel->title }}">
                            <div class="card-body">
                                <h6 class="mb-1">{{ $rel->title }}</h6>
                                <small class="text-muted">{{ $rel->category }}</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('partials.newsletter')
@endsection
