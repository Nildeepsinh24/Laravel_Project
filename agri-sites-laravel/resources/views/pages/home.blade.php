@extends('layouts.app')

@section('title', 'Organic-Food')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="hiro-section">
        <div class="container-fluid p-0">
            <div class="row hiro-main">
                <div class="col-md-6 hiro-bgclr">
                    <div class="hiro-cnct-btn">
                        <h6 class="hiro-headsix">100% Natural Food</h6>
                        <h1 class="hiro-head-one">Choose the best healthier way of life</h1>
                        <button type="button" class="btn btn-md hiro-btn btnefct"><a href="{{ route('shop') }}">Explore Now &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                    </div>
                </div>
                <div class="col-md-6 hiro-bgimg">
                    <img src="{{ $asset }}/hiro-img.png" class="img-fluid" alt="Hero">
                </div>
            </div>
        </div>
    </section>

    <section id="cnct-one">
        <div class="container">
            <div class="row cnct-one-row">
                <div class="col-md-6 cnct-cl-one" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="sc-one2bg">
                        <div class="cnct-cool-one">
                            <h3 class="cnct-cl-head-three">Natural!!</h3>
                            <h1 class="cnct-cl-head-one">Get Garden <br> Fresh Fruits</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 cnct-cl-two" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="sc-two2bg">
                        <div class="cnct-cool-one">
                            <h3 class="cnct-cl2-head-three">Offer!!</h3>
                            <h1 class="cnct-cl2-head-one">Get 10% off <br> on Vegetables</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cnct-sec-2">
        <div class="container-fluid p-0">
            <div class="row cntnr-rw-2">
                <div class="col-md-6 cl-2-one">
                    <img src="{{ $asset }}/cnct-2-left-img.png" class="img-fluid" alt="About">
                </div>
                <div class="col-md-6 cl-2-two" data-aos="fade-up" data-aos-duration="1000">
                    <div class="cl-cnct-one-1">
                        <h4 class="cnct-one-1-abt">About Us</h4>
                        <h2 class="cnct-one-1head">We Believe in Working Accredited Farmers</h2>
                        <p class="cnct-one-1-pera">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                        <div class="card main-crd" data-aos="fade-up" data-aos-duration="1000">
                            <div class="row no-gutters crd-row">
                                <div class="col-md-2 dfjsal-org">
                                    <div class="org-img-1">
                                        <img src="{{ $asset }}/org-card-one.svg" class="img-fluid" alt="Organic">
                                    </div>
                                </div>
                                <div class="col-md-10 p-0">
                                    <div class="card-body">
                                        <h5 class="card-title ct-tl">Organic Foods Only</h5>
                                        <p class="card-text ct-cx">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card main-crd" data-aos="fade-up" data-aos-duration="1000">
                            <div class="row no-gutters crd-row">
                                <div class="col-md-2 dfjsal-org">
                                    <div class="org-img-1">
                                        <img src="{{ $asset }}/Mailbox Quality.png" class="img-fluid" alt="Quality">
                                    </div>
                                </div>
                                <div class="col-md-10 p-0">
                                    <div class="card-body">
                                        <h5 class="card-title ct-tl">Quality Standards</h5>
                                        <p class="card-text ct-cx">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-md shop-btn btnefct-2" data-hover="Click me!"><a href="{{ route('shop') }}">Shop Now &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="card-section">
        <div class="container">
            <div class="row card-row-section">
                <h2 class="ctcgry-head" data-aos="fade-up" data-aos-duration="1000">Categories</h2>
                <h1 class="oupd" data-aos="fade-up" data-aos-duration="2000">Our Products</h1>
                @foreach($products as $product)
                <div class="col-md-3 card-cl-one card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('shop.single', $product->slug) }}">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">{{ $product->category }}</span>
                                <img src="{{ $asset }}/{{ $product->image }}" class="img-fluid c-i-7" alt="{{ $product->name }}">
                                <h6 class="card-text crd-hsix">{{ $product->name }}</h6>
                                <hr class="hr hrsprt" />
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>${{ number_format($product->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">${{ number_format($product->sale_price, 2) }}</h6>
                                    </div>
                                    <div class="star">
                                        @for($i = 0; $i < $product->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <p class="text-center mt-3">
                    <button type="button" class="btn btn-md shop-btn btnefct-2" data-hover="Click me!"><a href="{{ route('shop') }}">Load More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                </p>
            </div>
        </div>
    </section>

    <section id="cnct-section-4">
        <div class="container-fluid p-0">
            <div class="row cnct-4-main-row">
                <div class="col-md-3 p-0 lft-bg-one">
                    <img src="{{ $asset }}/lft-bg.png" class="imrspo" alt="Left background">
                </div>
                <div class="col-md-6 cnct-bgcntr">
                    <div class="cnctm-main-s4">
                        <h4 class="ctcgry-head" data-aos="fade-up" data-aos-duration="1000">Testimonial</h4>
                        <h3 class="oupd" data-aos="fade-up" data-aos-duration="1500">What Our Customer Saying?</h3>
                        <div class="img-cnt-p-m mt-4">
                            <img src="{{ $asset }}/sldimg.png" class="img-fluid" alt="Testimonial">
                            <div class="star mt-2" data-aos="fade-up" data-aos-duration="1000">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="s4-pera mt-3" data-aos="fade-up" data-aos-duration="1000">Simply dummy text of the printing and typesetting industry. Lorem Ipsum simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                            <h6 class="card-text crd-hsix mt-3">Sara Taylor</h6>
                            <p class="s4-pera">Consumer</p>
                        </div>
                        <hr class="hr hrsprt mt-5" />
                        <div class="row cntor">
                            <div class="col-md-3 cntor-1">
                                <div class="crcl-main" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                    <h3 class="crcl-head mt-3"> <span class="count start">100</span>%</h3>
                                    <p class="crcl-pera">Organic</p>
                                </div>
                            </div>
                            <div class="col-md-3 cntor-2">
                                <div class="crcl-main" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                    <h3 class="crcl-head mt-3 count start">285</h3>
                                    <p class="crcl-pera">Active Product</p>
                                </div>
                            </div>
                            <div class="col-md-3 cntor-3">
                                <div class="crcl-main" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                    <h3 class="crcl-head mt-3"> <span class="count start">350</span>+</h3>
                                    <p class="crcl-pera">Organic Orchads</p>
                                </div>
                            </div>
                            <div class="col-md-3 cntor-4">
                                <div class="crcl-main" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                    <h3 class="crcl-head mt-3"> <span class="count start">25</span>+</h3>
                                    <p class="crcl-pera">Years of Farming</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-0 rgt-bg-two">
                    <img src="{{ $asset }}/rgt-bg.png" class="imrspo-1" alt="Right background">
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid sec-5-cnctnr-main">
        <div class="row main-section-5-mr">
            <div class="row p-0 rsec">
                <div class="col-md-10 p-0">
                    <h4 class="ctcgry-head-s5" data-aos="fade-up" data-aos-duration="1000">Offer</h4>
                    <h3 class="oupd-s5" data-aos="fade-up" data-aos-duration="1500">We Offer Organic For You</h3>
                </div>
                <div class="col-md-2 p-0 dnbtn">
                    <p class="text-center spbtns5">
                        <button type="button" class="btn btn-md shop-btn-s5 btnefct"><a href="{{ route('shop') }}">View All Product &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                    </p>
                </div>
            </div>
            @foreach($products->take(4) as $product)
            <div class="col-md-3 set-cl-1" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('shop.single', $product->slug) }}">
                    <div class="card section-3-card-main">
                        <div class="card-body">
                            <span class="card-title ctone">{{ $product->category }}</span>
                            <img src="{{ $asset }}/{{ $product->image }}" class="img-fluid crd-8-1" alt="{{ $product->name }}">
                            <h6 class="card-text crd-hsix">{{ $product->name }}</h6>
                            <hr class="hr hrsprt" />
                            <div class="ftr-dv">
                                <div class="cf-h">
                                    <h6 class="card-text d-text"><del>${{ number_format($product->original_price, 2) }}</del></h6>
                                    <h6 class="card-text r-text">${{ number_format($product->sale_price, 2) }}</h6>
                                </div>
                                <div class="star">
                                    @for($i = 0; $i < $product->rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <p class="text-center spbtns5 spbtns5-dn mt-4">
                <button type="button" class="btn btn-md shop-btn-s5 btnefct"><a href="{{ route('shop') }}">View All Product &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
            </p>
        </div>
    </div>

    <section id="cnct-sec-6">
        <div class="row s6mr">
            <div class="col-md-6 cnct-sec-6-1cl">
                <img src="{{ $asset }}/s-6-main-img.jpg" class="img-fluid" alt="Eco friendly">
            </div>
            <div class="col-md-6 cnct-sec-6-2cl">
                <div class="sec-6-cnct-m" data-aos="fade-up" data-aos-duration="1000">
                    <h4 class="sec-6-p1-head">Eco Friendly</h4>
                    <h3 class="sec-6-h1-head">Econis is a Friendly Organic Store</h3>
                    <div class="sec-6-cnct-one-p">
                        <h5 class="cnct-one-h">Start with Our Company First</h5>
                        <p class="cnct-one-p">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque laudantium. Sed ut perspiciatis.</p>
                    </div>
                    <div class="sec-6-cnct-one-p">
                        <h5 class="cnct-one-h">Learn How to Grow Yourself</h5>
                        <p class="cnct-one-p">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque laudantium. Sed ut perspiciatis.</p>
                    </div>
                    <div class="sec-6-cnct-one-p">
                        <h5 class="cnct-one-h">Farming Strategies of Today</h5>
                        <p class="cnct-one-p">Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque laudantium. Sed ut perspiciatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cnct-section-7">
        <div class="container-fluid section-7main">
            <div class="row s7-row">
                <div class="col-md-4 cl-s7-one">
                    <div class="s7-bg-1" data-aos="fade-up" data-aos-duration="1000">
                        <button type="button" class="btn btn-md s7-btn"><a href="{{ route('shop') }}">Organic Juice</a></button>
                    </div>
                </div>
                <div class="col-md-4 cl-s7-two">
                    <div class="s7-bg-2" data-aos="fade-up" data-aos-duration="1500">
                        <button type="button" class="btn btn-md s7-btn"><a href="{{ route('shop') }}">Organic Food</a></button>
                    </div>
                </div>
                <div class="col-md-4 cl-s7-three">
                    <div class="s7-bg-3" data-aos="fade-up" data-aos-duration="2000">
                        <button type="button" class="btn btn-md s7-btn"><a href="{{ route('shop') }}">Nuts Cookis</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-8-main">
        <div class="container section-8-cntrn">
            <div class="row s8-main-row">
                <div class="row p-0 rsec">
                    <div class="col-md-10 p-0">
                        <h4 class="ctcgry-head-s5" data-aos="fade-up" data-aos-duration="1000">News</h4>
                        <h3 class="s8m-s8" data-aos="fade-up" data-aos-duration="1200">Discover weekly content about organic food, & more</h3>
                    </div>
                    <div class="col-md-2 p-0 dnbtn">
                        <p class="text-center spbtns5">
                            <button type="button" class="btn btn-md shops8-btns8-s8 btnefct-1"><a href="{{ route('news') }}">More News &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 s8-cl-hf-one">
                    <div class="s8-bg-first" data-aos="fade-up" data-aos-duration="1000">
                        <div class="crcl-s8cnont">
                            <p class="bg-s8-count">25</p>
                            <p class="bg-s8-count">Nov</p>
                        </div>
                        <div class="s8-pcnct">
                            <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                            <div class="sec-8-cnct-one-pss8">
                                <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">The Benefits of Vitamin D & How to Get It</a></h5>
                                <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                            </div>
                            <button type="button" class="btn btn-md shop-btn-s5 btnefct"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 s8-cl-hf-two">
                    <div class="s8-bg-sec" data-aos="fade-up" data-aos-duration="1000">
                        <div class="crcl-s8cnont">
                            <p class="bg-s8-count">25</p>
                            <p class="bg-s8-count">Nov</p>
                        </div>
                        <div class="s8-pcnct">
                            <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                            <div class="sec-8-cnct-one-pss8">
                                <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">Our Favourite Summertime Tommeto</a></h5>
                                <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                            </div>
                            <button type="button" class="btn btn-md shop-btn-s5 btnefct"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                        </div>
                    </div>
                </div>
                <p class="text-center spbtns5-s8no">
                    <button type="button" class="btn btn-md shops8-btns8-s8-none btnefct-1"><a href="{{ route('news') }}">More News &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                </p>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
