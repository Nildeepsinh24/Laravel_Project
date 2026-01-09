@extends('layouts.app')

@section('title', 'Services')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row service-page-main-row">
                <h1 class="abt-hiro-head">Services</h1>
            </div>
        </div>
    </section>

    <div class="container service-page-hiro-section">
        <div class="row service-page-main-hiro-row">
            <h2 class="ctcgry-head-abt-t-m" data-aos="fade-up" data-aos-duration="1000">What we Grow</h2>
            <h2 class="oupd-abt-h-one-team" data-aos="fade-up" data-aos-duration="1100">Better Agriculture for</h2>
            <h2 class="oupd-abt-h-one-team" data-aos="fade-up" data-aos-duration="1200">Better Future</h2>

            <div class="col-md-4 cl-hiro-srvc-one">
                <ul class="right-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-right-side-icon-oneIcon.svg" class="img-fluid" alt="Dairy Products"></li>
                    <li class="srvc-h-li">Dairy Products</li>
                    <li>
                        <p class="service-one-one-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
                <ul class="right-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-right-two-side-icon-oneIcon.svg.png" class="img-fluid" alt="Store Services"></li>
                    <li class="srvc-h-li">Store Services</li>
                    <li>
                        <p class="service-one-one-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
                <ul class="right-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-right-three-side-icon-oneIcon.svg.pngIcon.svg" class="img-fluid" alt="Delivery Services"></li>
                    <li class="srvc-h-li">Delivery Services</li>
                    <li>
                        <p class="service-one-one-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 cl-hiro-srvc-two p-0">
                <img src="{{ $asset }}/center-service-product-photos-removebg-preview.png" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Service Products">
            </div>

            <div class="col-md-4 cl-hiro-srvc-three">
                <ul class="left-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-left-three-side-icon-oneIcon.svg.pngIcon.svg.png" class="img-fluid" alt="Agricultural Services"></li>
                    <li class="srvc-h-li">Agricultural Services</li>
                    <li>
                        <p class="service-one-two-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
                <ul class="left-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-left-one-side-icon-oneIcon.svg.pngIcon.svg.png.png" class="img-fluid" alt="Organic Products"></li>
                    <li class="srvc-h-li">Organic Products</li>
                    <li>
                        <p class="service-one-two-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
                <ul class="left-side-service-ul" data-aos="fade-up" data-aos-duration="1000">
                    <li><img src="{{ $asset }}/service-right-two-side-icon-oneIcon.svg.pngIcon.svg.svg" class="img-fluid" alt="Fresh Vegetables"></li>
                    <li class="srvc-h-li">Fresh Vegetables</li>
                    <li>
                        <p class="service-one-two-1-pera">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremqlaudantium. Sed ut perspiciatis</p>
                    </li>
                </ul>
            </div>

            <p class="text-center servisecespbtns5-s8no">
                <button type="button" class="btn btn-md shops8-btns8-s8-none btnefct-1"><a href="{{ route('services.single') }}">Explore More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
            </p>
        </div>
    </div>

    <section id="clean-video-hiro-section">
        <div class="container-fluid p-0">
            <div class="row clean-service-page-main-row">
                <div class="clean-video-main">
                    <h2 class="ctcgry-head-abt-t-m" data-aos="fade-up" data-aos-duration="1000">Organic Only</h2>
                    <h2 class="oupd-abt-h-one-team" data-aos="fade-up" data-aos-duration="1000">Everyday Fresh &amp; Clean</h2>
                    <p class="clean-video-pera-tm mt-3">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the</p>
                    <div class="video-icom-clean btnefct-1" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"><a href="#"><i class="bi bi-play-fill"></i></a></div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
