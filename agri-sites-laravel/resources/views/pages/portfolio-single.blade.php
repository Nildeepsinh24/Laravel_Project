@extends('layouts.app')

@section('title', $item->title)

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
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
        <div class="img-mn-full mb-3">
            <img src="{{ $asset }}/{{ $item->image }}" class="img-fluid" data-aos="fade-up" data-aos-duration="1000" alt="{{ $item->title }}">
            <p class="i-pera-top">{{ $item->service ?? 'Portfolio' }}</p>
        </div>
        @if($item->description)
            {!! $item->description !!}
        @else
            <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">Details coming soon.</p>
        @endif
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
