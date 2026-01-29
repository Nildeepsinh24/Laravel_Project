@extends('layouts.app')

@section('title', 'Contact Us')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row contact-page-main-row">
                <h1 class="abt-hiro-head">Contact Us</h1>
            </div>
        </div>
    </section>

    <section id="shop-single-main-section">
        <div class="container shop-single-cnctrnr">
            <div class="row ss-main-row">
                <div class="col-md-6 clm-one-ss-one">
                    <div class="card-body buy-img-ss p-0">
                        <div class="s-img-cntr">
                            <img src="{{ $asset }}/contact-us-main-right-bg.png" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="Contact Illustration">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 clm-one-ss-two">
                    <div class="ss-buy-content-one">
                        <h3 class="cnct-one-contct-pg-head" data-aos="fade-up" data-aos-duration="1000">We'd love to talk about how we can work together.</h3>
                        <p class="cnct-one-1-pera mt-2">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>

                        <div class="msgandcnct">
                            <div class="massage-cnct" data-aos="fade-up" data-aos-duration="1000">
                                <img src="{{ $asset }}/msg-box.svg" class="img-fluid" alt="Message">
                            </div>
                            <div class="call-cnct" data-aos="fade-up" data-aos-duration="1200">
                                <h6 class="card-title ct-tl">Massege</h6>
                                <p class="mail-pera">support@organic.com</p>
                            </div>
                        </div>

                        <div class="msgandcnct mt-2">
                            <div class="massage-cnct" data-aos="fade-up" data-aos-duration="1000">
                                <img src="{{ $asset }}/bi-phone-png.svg" class="img-fluid" alt="Phone">
                            </div>
                            <div class="call-cnct" data-aos="fade-up" data-aos-duration="1200">
                                <h6 class="card-title ct-tl">Contact Us</h6>
                                <p class="mail-pera">+01 123 456 789</p>
                            </div>
                        </div>

                        <div class="social-cnctrmain-cnct">
                            <div class="main-icn-social" data-aos="fade-up" data-aos-duration="1000">
                                <a href="#"><img src="{{ $asset }}/Insta.png" class="img-fluid" alt="Instagram"></a>
                            </div>
                            <div class="main-icn-social" data-aos="fade-up" data-aos-duration="1400">
                                <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                            </div>
                            <div class="main-icn-social" data-aos="fade-up" data-aos-duration="1800">
                                <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                            </div>
                            <div class="main-icn-social" data-aos="fade-up" data-aos-duration="2200">
                                <a href="#"><img src="{{ $asset }}/Pintrest.png" class="img-fluid" alt="Pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container c-o-farm" data-aos="fade-up" data-aos-duration="1000">
        <div class="farm-contant-main" data-aos="fade-up" data-aos-duration="1400">
            <h5 class="cnct-one-1-farm-mnin">Location</h5>
            <h3 class="card-title ct-tl-farm-m-head">Our Farms</h3>
            <p class="mail-pera-farm">Established fact that a reader will be distracted by the readable content of a page when looking a layout. The point of using.</p>

            <div class="mainloc">
                <div class="icn-lkc"><img src="{{ $asset }}/bifsLocation.png" class="img-fluid image-grnlkc" alt="Location"></div>
                <div class="lkc-add">
                    <span class="blt-fw">Rajkot, Gujarat:</span> <br>
                    Rajkot, Gujarat<br>
                    India
                </div>
            </div>

            <div class="mainloc">
                <div class="icn-lkc"><img src="{{ $asset }}/bifsLocation.png" class="img-fluid image-grnlkc" alt="Location"></div>
                <div class="lkc-add">
                    <span class="blt-fw">Ahmedabad, Gujarat:</span> <br>
                    Ahmedabad, Gujarat<br>
                    India
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-us-form-main p-0" data-aos="fade-up" data-aos-duration="1000">
        <form action="">
            <div class="row main-us-row">
                <div class="col-md-6 clm-one-us">
                    <label class="lable-text">Full Name*</label>
                    <input type="text" placeholder="Enter Your Name" class="form-control allbt-none" required>
                </div>
                <div class="col-md-6 clm-us-two">
                    <label class="lable-text">Your Email*</label>
                    <input type="text" placeholder="example@yourmail.com" class="form-control allbt-none" required>
                </div>
                <div class="col-md-6 clm-one-us">
                    <label class="lable-text">Phone Number*</label>
                    <input type="tel" name="phone" placeholder="+91 98765 43210" class="form-control allbt-none" required>
                </div>
                <div class="col-md-6 clm-us-two">
                    <label class="lable-text">Subject*</label>
                    <input type="text" placeholder="how can we help" class="form-control allbt-none" required>
                </div>
                <div class="textaria">
                    <label class="lable-text">Message*</label>
                    <textarea name="message" placeholder="Hello there, I would like to talk about how to..." class="allbt-none-one" required></textarea>
                </div>
                <button type="submit" class="btn btn-lg s-9btn-cnct-snd s-9btn">Send Message</button>
            </div>
        </form>
    </div>

    @include('partials.newsletter')
@endsection
