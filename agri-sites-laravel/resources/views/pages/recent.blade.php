@extends('layouts.app')

@section('title', 'Recent News')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row recent-page-main-row">
                <h1 class="abt-hiro-head">Recent News</h1>
            </div>
        </div>
    </section>

    <section id="section-8-main">
        <div class="container recent-main-pagemndv mt-5">
            <div class="container section-8-cntrn">
                <div class="row s8-main-row">
                    <div class="col-md-6 s8-cl-hf-one" data-aos="fade-up" data-aos-duration="1000">
                        <div class="s8-bg-first">
                            <div class="crcl-s8cnont">
                                <p class="bg-s8-count">25</p>
                                <p class="bg-s8-count">Nov</p>
                            </div>
                            <div class="s8-pcnct">
                                <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                                <div class="sec-8-cnct-one-pss8">
                                    <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">The Benefits of Vitamin D &amp; How to Get It</a></h5>
                                    <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                </div>
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 s8-cl-hf-two" data-aos="fade-up" data-aos-duration="1100">
                        <div class="s8-bg-sec">
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
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 s8-cl-hf-one rcnt-mt-clm" data-aos="fade-up" data-aos-duration="1000">
                        <div class="s8-bg-first-rcnt-one">
                            <div class="crcl-s8cnont">
                                <p class="bg-s8-count">25</p>
                                <p class="bg-s8-count">Nov</p>
                            </div>
                            <div class="s8-pcnct">
                                <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                                <div class="sec-8-cnct-one-pss8">
                                    <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">The Benefits of Vitamin C &amp; How to Get It</a></h5>
                                    <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                </div>
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 s8-cl-hf-two rcnt-mt-clm" data-aos="fade-up" data-aos-duration="1100">
                        <div class="s8-bg-second-rcnt-two">
                            <div class="crcl-s8cnont">
                                <p class="bg-s8-count">25</p>
                                <p class="bg-s8-count">Nov</p>
                            </div>
                            <div class="s8-pcnct">
                                <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                                <div class="sec-8-cnct-one-pss8">
                                    <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">Research More Organic Foods</a></h5>
                                    <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                </div>
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 s8-cl-hf-one rcnt-mt-clm" data-aos="fade-up" data-aos-duration="1000">
                        <div class="s8-bg-thrd-rcnt-three">
                            <div class="crcl-s8cnont">
                                <p class="bg-s8-count">25</p>
                                <p class="bg-s8-count">Nov</p>
                            </div>
                            <div class="s8-pcnct">
                                <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                                <div class="sec-8-cnct-one-pss8">
                                    <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">Everyday Fresh Fruites</a></h5>
                                    <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                </div>
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 s8-cl-hf-two rcnt-mt-clm" data-aos="fade-up" data-aos-duration="1100">
                        <div class="s8-bg-fourth-rcnt-four">
                            <div class="crcl-s8cnont">
                                <p class="bg-s8-count">25</p>
                                <p class="bg-s8-count">Nov</p>
                            </div>
                            <div class="s8-pcnct">
                                <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By Rachi Card</p>
                                <div class="sec-8-cnct-one-pss8">
                                    <h5 class="cnct-one-h"><a href="{{ route('blog.single') }}" class="text-decoration-none text-dark">Don’t Use Plastic Product! it’s Kill Nature</a></h5>
                                    <p class="cnct-one-pss8">Simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                                </div>
                                <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.single') }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
