@extends('layouts.app')

@section('title', 'Service Single')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row service-single-page-main-row">
                <h1 class="service-single-main-head-one-hiro-head">Quality Standard</h1>
            </div>
        </div>
    </section>

    <section id="service-single-page-mn">
        <div class="container mt-5">
            <img src="{{ $asset }}/hiro-service-single-main-one.jpg" class="img-fluid" alt="Service Hero">
        </div>

        <div class="container cnct-service-single-pagecnct mt-5">
            <h2 class="service-single-hedcnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">Organic Store Services</h2>
            <p class="service-single-pera-first-cnct-one-1-pera mt-2">this is a long established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            <p class="service-single-pera-first-cnct-one-1-pera mt-2">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and auncover many web sites still in their infancy. Various versions have evolved over the years</p>

            <div class="row one-sidebg-one-side-cnct-main mt-4">
                <div class="col-md-5 right-mainsidebgone">
                    <img src="{{ $asset }}/right-side-bg-onesideimg.png" class="img-fluid" alt="Why Organic">
                </div>
                <div class="col-md-7 left-mainsidebgtwo">
                    <div class="cnct-and-pera-srvc-pera" data-aos="fade-up" data-aos-duration="1000">
                        <div class="srvc-h-li">Why Organic</div>
                        <p class="service-one-two-1-pera s-sngl-respo mt-2">Sed ut perspiciatis unde omnis iste natus error sit voluptat. page editors now use Lorem Ipsum as their default model text, and auncover.</p>
                    </div>
                </div>
            </div>

            <div class="row one-sidebg-one-side-cnct-main mt-4">
                <div class="col-md-7 left-mainsidebgtwo">
                    <div class="cnct-and-pera-srvc-pera" data-aos="fade-up" data-aos-duration="1000">
                        <div class="srvc-h-li">Speciality Produce</div>
                        <p class="service-one-two-1-pera s-sngl-respo mt-2">Sed ut perspiciatis unde omnis iste natus error sit voluptat. page editors now use Lorem Ipsum as their default model text, and auncover.</p>
                    </div>
                </div>
                <div class="col-md-5 right-mainsidebgone">
                    <img src="{{ $asset }}/left-side-bg-twosideimg.pngImage.png" class="img-fluid" alt="Speciality">
                </div>
            </div>

            <div class="row srvc-sngl-end-mainrw">
                <div class="srvc-h-n-e-w-li" data-aos="fade-up" data-aos-duration="1000">Speciality Produce</div>
                <p class="service-one-first-n-e-w s-sngl-respo mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                <div class="brdr-prant-main">
                    <div class="brdr-sec-chld-two" data-aos="fade-up" data-aos-duration="1000">
                        <div class="brdrone-frt">01</div> Best quality support
                    </div>
                    <div class="brdr-sec-chld-two" data-aos="fade-up" data-aos-duration="1100">
                        <div class="brdrone-frt">02</div> Money back guarantee
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
