@extends('layouts.app')

@section('title', 'Our Team')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row our-team-head-main-row">
                <h1 class="abt-hiro-head">Our Team</h1>
            </div>
        </div>
    </section>

    <section id="abt-team-section">
        <div class="container about-team-cnctrn-main">
            <h2 class="ctcgry-head-abt-t-m" data-aos="fade-up" data-aos-duration="1000">Team</h2>
            <h1 class="oupd-abt-h-one-team" data-aos="fade-up" data-aos-duration="1100">Our Organic Experts</h1>
            <p class="s4-pera s4-pera-ab-tm mt-3">Meet the passionate individuals behind Organick who work tirelessly to bring you the finest organic products while championing sustainable agriculture and environmental conservation.</p>

            <div class="row abt-main-team">
                <div class="col-md-4 clm-tean-main-one hover-card-mn" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card main-teancard-brdrdis">
                        <img src="{{ $asset }}/card-team-one-Image.png" class="card-img-top" alt="Giovani Bacardo">
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

                <div class="col-md-4 clm-tean-main-two" data-aos="fade-up" data-aos-duration="1100">
                    <div class="card main-teancard-brdrdis hover-card-mn">
                        <img src="{{ $asset }}/card-team-twoImage (1).png" class="card-img-top" alt="Marianne Loreno">
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

                <div class="col-md-4 clm-tean-main-three hover-card-mn" data-aos="fade-up" data-aos-duration="1200">
                    <div class="card main-teancard-brdrdis">
                        <img src="{{ $asset }}/card-team-threeImage (2).png" class="card-img-top" alt="Riga Pelore">
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

            <div class="row abt-main-team">
                <div class="col-md-4 clm-tean-main-one hover-card-mn" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card main-teancard-brdrdis">
                        <img src="{{ $asset }}/OUR-TEAM-IMG-4.png" class="card-img-top" alt="Keira Knightley">
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Keira Knightley</h5>
                            <h6 class="cnct-one-1-abt">Farmer <div class="card-ftr-cocl">
                                    <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                                    <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 clm-tean-main-two" data-aos="fade-up" data-aos-duration="1100">
                    <div class="card main-teancard-brdrdis hover-card-mn">
                        <img src="{{ $asset }}/our-team-5.png" class="card-img-top" alt="Scott Lawrence">
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Scott Lawrence</h5>
                            <h6 class="cnct-one-1-abt">Designer <div class="card-ftr-cocl">
                                    <a href="#"><img src="{{ $asset }}/Insta.png" class="img-fluid" alt="Instagram"></a>
                                    <a href="#"><img src="{{ $asset }}/Fb.png" class="img-fluid" alt="Facebook"></a>
                                    <a href="#"><img src="{{ $asset }}/Twiter.png" class="img-fluid" alt="Twitter"></a>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 clm-tean-main-three hover-card-mn" data-aos="fade-up" data-aos-duration="1200">
                    <div class="card main-teancard-brdrdis">
                        <img src="{{ $asset }}/out-team-five-5.png" class="card-img-top" alt="Karen Allen">
                        <div class="card-body hvr-effct">
                            <h5 class="card-text crd-hsix">Karen Allen</h5>
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

    @include('partials.newsletter')
@endsection
