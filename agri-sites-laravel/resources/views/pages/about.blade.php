@extends('layouts.app')

@section('title', 'About Us')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row abt-main-row">
                <h1 class="abt-hiro-head">About Us</h1>
            </div>
        </div>
    </section>

    <section id="abt-section-one">
        <div class="container">
            <div class="row abt-main-section-two-row">
                <div class="col-md-6 abt-one-bg-clm">
                    <img src="{{ $asset }}/about-img-bg-two.png" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="About">
                </div>
                <div class="col-md-6 abt-two-bg-clm">
                    <div class="main-abt-cnct-clm">
                        <h4 class="cnct-one-1-abt" data-aos="fade-up" data-aos-duration="1000">About Us</h4>
                        <h2 class="cnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1100">We do Creative Things for Success</h2>
                        <p class="cnct-one-1-pera">Organick was founded on the principle that everyone deserves access to fresh, healthy, and sustainably grown food. We work directly with certified organic farmers who share our commitment to environmental stewardship and quality.</p>
                        <p class="cnct-one-1-pera">Our journey began with a simple mission: to bridge the gap between small-scale organic farmers and health-conscious consumers. Today, we proudly serve thousands of families with premium organic products while supporting local agriculture.</p>
                        <div class="row abt-t-and-s">
                            <div class="col-md-6 abt-tractors-one" data-aos="fade-up" data-aos-duration="1000">
                                <div class="row iand-rw">
                                    <div class="col-md-2 tractor-icon-clm">
                                        <img src="{{ $asset }}/Tractor.png" class="img-fluid" alt="Tractor">
                                    </div>
                                    <div class="col-md-10 tractor-icon-cnct-clm">
                                        <h5 class="ct-tl abt-cl">Modern Agriculture</h5>
                                        <h5 class="ct-tl abt-cl">Equipment</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 abt-ciramic-two" data-aos="fade-up" data-aos-duration="1000">
                                <div class="row iand-rw">
                                    <div class="col-md-2 tractor-icon-clm">
                                        <img src="{{ $asset }}/Chemical Plant.png" class="img-fluid" alt="Chemical Plant">
                                    </div>
                                    <div class="col-md-10 tractor-icon-cnct-clm">
                                        <h5 class="ct-tl abt-cl">No growth</h5>
                                        <h5 class="ct-tl abt-cl">hormones are used</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-md shop-btn mt-4 btnefct-2" data-hover="Click me!"><a href="{{ route('services') }}">Explore More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-section-two">
        <div class="container p-0">
            <div class="row abt-main-section-two-row p-0">
                <div class="col-md-6 abt-two-bg-clm p-0">
                    <div class="main-abt-cnct-clm">
                        <h4 class="cnct-one-1-abt" data-aos="fade-up" data-aos-duration="1000">Why Choose us?</h4>
                        <h2 class="cnct-one-1head-abt-two-head mt-3" data-aos="fade-up" data-aos-duration="1100">We do not buy from the open market & traders.</h2>
                        <p class="cnct-one-1-pera mt-3">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard the 1500s, when an unknown</p>
                        <div class="section-dpdn-cnctmain ">
                            <div class="border-r-onediv" data-aos="fade-up" data-aos-duration="1000">
                                <div class="brond-one"></div> 100% Natural Product
                            </div>
                            <p class="cnct-one-abt-1-pera">Simply dummy text of the printing and typesetting industry Lorem Ipsum</p>
                            <div class="border-r-onediv" data-aos="fade-up" data-aos-duration="1000">
                                <div class="brond-one"></div> Increases resistance
                            </div>
                            <p class="cnct-one-abt-1-pera">Filling, and temptingly healthy, our Biona Organic Granola with Wild Berries is just the thing</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 abt-one-bg-clm p-0">
                    <img src="{{ $asset }}/about-section-two-img.png" class="img-fluid" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="About section two">
                </div>
                <div class="row card-about-section-r">
                    <div class="col-md-3 card-abt-ones" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#">
                            <div class="card crd-br-r">
                                <div class="c-b-abt-icn-main">
                                    <img src="{{ $asset }}/abt-cart-Icon.svg" class="card-img-top svg-icon-w" alt="Return Policy">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text crd-hsix text-center">Return Policy</h5>
                                    <p class="card-text cnct-one-1-pera text-center mx-auto crd-w-set">Simply dummy text of the printintypesetting industry.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 card-abt-twos" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#">
                            <div class="card crd-br-r">
                                <div class="c-b-abt-icn-main">
                                    <img src="{{ $asset }}/abt-card-i1Icon (1).svg" class="card-img-top svg-icon-w" alt="Fresh">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text crd-hsix text-center">100% Fresh</h5>
                                    <p class="card-text cnct-one-1-pera text-center mx-auto crd-w-set">Simply dummy text of the printintypesetting industry.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 card-abt-threes" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#">
                            <div class="card crd-br-r">
                                <div class="c-b-abt-icn-main">
                                    <img src="{{ $asset }}/abt-ithreeIcon (2).svg" class="card-img-top svg-icon-w" alt="Support">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text crd-hsix text-center">Support 24/7</h5>
                                    <p class="card-text cnct-one-1-pera text-center mx-auto crd-w-set">Simply dummy text of the printintypesetting industry.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 card-abt-fours" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#">
                            <div class="card crd-br-r">
                                <div class="c-b-abt-icn-main">
                                    <img src="{{ $asset }}/abt-icnfourIcon (3).svg" class="card-img-top svg-icon-w" alt="Safe Payment">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text crd-hsix text-center">Safe Payment</h5>
                                    <p class="card-text cnct-one-1-pera text-center mx-auto crd-w-set">Simply dummy text of the printintypesetting industry.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="abt-team-section">
        <div class="container about-team-cnctrn-main">
            <h2 class="ctcgry-head-abt-t-m" data-aos="fade-up" data-aos-duration="1000">Team</h2>
            <h1 class="oupd-abt-h-one-team" data-aos="fade-up" data-aos-duration="1100">Our Organic Experts</h1>
            <p class="s4-pera s4-pera-ab-tm mt-3">Our dedicated team of agricultural experts, nutritionists, and logistics professionals work together to ensure every product meets our strict organic standards and reaches you in perfect condition.</p>
            <div class="row abt-main-team">
                <div class="col-md-4 clm-tean-main-one hover-card-mn">
                    <div class="card main-teancard-brdrdis" data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ route('team') }}">
                            <img src="{{ $asset }}/card-team-one-Image.png" class="card-img-top" alt="Giovani Bacardo">
                        </a>
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Giovani Bacardo</h5>
                            <h6 class="cnct-one-1-abt">Farmer <div class="card-ftr-cocl">
                                    <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                                    <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 clm-tean-main-two">
                    <div class="card main-teancard-brdrdis hover-card-mn" data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ route('team') }}">
                            <img src="{{ $asset }}/card-team-twoImage (1).png" class="card-img-top" alt="Marianne Loreno">
                        </a>
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Marianne Loreno</h5>
                            <h6 class="cnct-one-1-abt">Designer <div class="card-ftr-cocl">
                                    <a href="#"><img src="{{ $asset }}/Insta.png" class="img-fluid" alt="Instagram"></a>
                                    <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                                    <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 clm-tean-main-three hover-card-mn">
                    <div class="card main-teancard-brdrdis" data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ route('team') }}">
                            <img src="{{ $asset }}/card-team-threeImage (2).png" class="card-img-top" alt="Riga Pelore">
                        </a>
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Riga Pelore</h5>
                            <h6 class="cnct-one-1-abt">Farmer <div class="card-ftr-cocl">
                                    <a href="#"><img src="{{ $asset }}/Insta.png" class="img-fluid" alt="Instagram"></a>
                                    <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                                    <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-about-offer">
        <div class="container-fluid abt-offer-cnctr">
            <h2 class="ctcgry-head-abt-t-m" data-aos="fade-up" data-aos-duration="1000">About Us</h2>
            <h2 class="oupd-abt-h-one-team text-white" data-aos="fade-up" data-aos-duration="1100">What We Offer for You</h2>
            <div class="row r-ofr-main">
                <div class="col-md-3 clm-one-ftr">
                    <div class="card ftr-offer-crd">
                        <a href="#">
                            <div class="image-crd-brd">
                                <img src="{{ $asset }}/footer-ing-png-one.png" class="card-img-top" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Spicy">
                            </div>
                            <div class="card-body b-crd-ftr">
                                <p class="card-text text-center crd-abpera-one">Spicy</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 clm-two-ftr">
                    <div class="card ftr-offer-crd">
                        <a href="#">
                            <div class="image-crd-brd">
                                <img src="{{ $asset }}/footer-ing-png-two.png" class="card-img-top" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Nuts">
                            </div>
                            <div class="card-body b-crd-ftr">
                                <p class="card-text text-center crd-abpera-one">Nuts & Feesd</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 clm-three-ftr">
                    <div class="card ftr-offer-crd">
                        <a href="#">
                            <div class="image-crd-brd">
                                <img src="{{ $asset }}/footer-ing-png-three.png" class="card-img-top l-i-s-w" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Fruits">
                            </div>
                            <div class="card-body b-crd-ftr">
                                <p class="card-text text-center crd-abpera-one">Fruits</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 clm-four-ftr">
                    <div class="card ftr-offer-crd">
                        <a href="#">
                            <div class="image-crd-brd">
                                <img src="{{ $asset }}/footer-ing-png-four.png" class="card-img-top" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Vegetable">
                            </div>
                            <div class="card-body b-crd-ftr">
                                <p class="card-text text-center crd-abpera-one">Vegetable</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
