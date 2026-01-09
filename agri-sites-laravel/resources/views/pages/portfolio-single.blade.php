@extends('layouts.app')

@section('title', 'Portfolio Single')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row portfolio-single-main-row">
                <h1 class="portfolio-single-hiro-head"></h1>
            </div>
        </div>
    </section>

    <div class="container p-s-cnct-cntr-main">
        <div class="row s-row-p-main">
            <div class="col-md-8 cl-mn-s-p-one" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="service-single-hedcnct-one-1head-oactmd">Black Raspberry</h2>
                <p class="service-single-pera-first-cnct-one-1-pera mt-2">Established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed </p>
            </div>
            <div class="col-md-4 cl-mn-s-p-two" data-aos="fade-up" data-aos-duration="1500">
                <div class="d-c-c-s-main">
                    <div class="date-mn">
<pre> <span class="d-m">Date          :  </span><span class="d-emn">December 4, 2022</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Client        :  </span><span class="d-emn">Kevin Martin</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Category  :  </span><span class="d-emn">Agriculture , Eco</span></pre>
                    </div>
                    <div class="date-mn">
<pre> <span class="d-m">Service      :  </span><span class="d-emn">Organic Products</span></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ps-c-two-mnctr">
        <h3 class="service-single-hedcnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">About The Farm:</h3>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">this is a long established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and auncover many web sites still in their infancy. Various versions have evolved over the years</p>
        <div class="img-mn-full">
            <img src="{{ $asset }}/img-mn-p-sngl-onemnm.png" class="img-fluid" data-aos="fade-up" data-aos-duration="1000" alt="Organic Products">
            <p class="i-pera-top">The Organic Products</p>
        </div>
        <h3 class="service-single-hedcnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">How To Farm:</h3>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">this is a long established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and auncover many web sites still in their infancy. Various versions have evolved over the years</p>
        <h3 class="service-single-hedcnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">Conclusion:</h3>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">this is a long established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
        <p class="portfolio-single-pera-first-cnct-one-1-pera mt-2">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and auncover many web sites still in their infancy. Various versions have evolved over the years</p>
    </div>

    @include('partials.newsletter')
@endsection
