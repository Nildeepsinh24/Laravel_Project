@extends('layouts.app')

@section('title', 'Shop Single')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row shop-single-main-row">
                <h1 class="abt-hiro-head">Shop Single</h1>
            </div>
        </div>
    </section>

    <section id="shop-single-main-section">
        <div class="container shop-single-cnctrnr">
            <div class="row ss-main-row">
                <div class="col-md-6 clm-one-ss-one">
                    <div class="card-body buy-img-ss">
                        <span class="card-title ctone">Millets</span>
                        <div class="s-img-cntr">
                            <img src="{{ $asset }}/shop-single-600-removebg-preview.png" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Pistachios">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 clm-one-ss-two">
                    <div class="ss-buy-content-one">
                        <h4 class="cnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">Health Pistachios</h4>
                        <div class="star">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="cf-h mt-3">
                            <h6 class="card-text d-text"><del>$20.00</del></h6>
                            <h6 class="card-text r-text">$13.00</h6>
                        </div>
                        <p class="cnct-one-1-pera mt-2">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                        <div class="main-b">
                            <div class="buy-nm">
                                <h6 class="card-text r-text">Quantity :</h6>
                            </div>
                            <div class="m-smain">
                                <div class="input-group gp-iand-b">
                                    <input type="text" placeholder="1" class="form-control quntity-buy" required>
                                    <button type="button" class="btn btn-md shop-single-btn btnefct-2" data-hover="Click me!"><a href="#">Add To Cart &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pd-and-ainf">
        <div class="container pd-and-ainfo-main">
            <div class="a-and-p-dv">
                <button type="button" class="btn btn-md shop-single-btn s-9btn"><a href="#">Product Description</a></button>
                <button type="button" class="btn btn-md add-infobtn"><a href="#">Additional Info</a></button>
            </div>
            <p class="p-d-and-add-info-one-1-pera mt-3">Welcome to the world of natural and organic. Here you can discover the bounty of nature. We have grown on the principles of health, ecology, and care. We aim to give our customers a healthy chemical-free meal for perfect nutrition. It offers about 8-10% carbs. Simple sugars — such as glucose and fructose — make up 70% and 80% of the carbs in raw.</p>
        </div>
    </section>

    <section id="shop-single-related-product">
        <div class="container">
            <div class="row card-row-section">
                <h2 class="oupd" data-aos="fade-up" data-aos-duration="1000">Related Products</h2>

                <div class="col-md-3 card-cl-one card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="#">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">Vegetable</span>
                                <img src="{{ $asset }}/card-7.png" class="img-fluid c-i-7" alt="Calabrese Broccoli">
                                <h6 class="card-text crd-hsix">Calabrese Broccoli</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>$20.00</del></h6>
                                        <h6 class="card-text r-text">$13.00</h6>
                                    </div>
                                    <div class="star">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 card-cl-two card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="#">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">Fresh</span>
                                <img src="{{ $asset }}/card-6.png" class="img-fluid" alt="Fresh Banana">
                                <h6 class="card-text crd-hsix">Fresh Banana Fruites</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>$20.00</del></h6>
                                        <h6 class="card-text r-text">$14.00</h6>
                                    </div>
                                    <div class="star">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 card-cl-three card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="#">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">Millets</span>
                                <img src="{{ $asset }}/card-5.png" class="img-fluid c-5-r" alt="White Nuts">
                                <h6 class="card-text crd-hsix">White Nuts</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>$20.00</del></h6>
                                        <h6 class="card-text r-text">$15.00</h6>
                                    </div>
                                    <div class="star">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 card-cl-four card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="#">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">Vegetable</span>
                                <img src="{{ $asset }}/card-4.png" class="img-fluid ottre" alt="Vegan Red Tomato">
                                <h6 class="card-text crd-hsix">Vegan Red Tomato</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>$20.00</del></h6>
                                        <h6 class="card-text r-text">$17.00</h6>
                                    </div>
                                    <div class="star">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
