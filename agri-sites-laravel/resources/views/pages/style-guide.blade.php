@extends('layouts.app')

@section('title', 'Style Guide')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row licenses-main-row">
                <h1 class="passprot-hiro-head">Style Guide</h1>
            </div>
        </div>
    </section>

    <div class="container s-and-g-main">
        <div class="row s-g-mn-row ">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">Color</h3>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <div class="colormncode"></div>
                <p class="clr-code">#274C5B</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <div class="colormncode-two"></div>
                <p class="clr-code">#7EB693</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="colormncode-three"></div>
                <p class="clr-code">#EFD372</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="colormncode-four"></div>
                <p class="clr-code">#D4D4D4</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="colormncode-five"></div>
                <p class="clr-code">#F9F8F8</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="colormncode-six"></div>
                <p class="clr-code">#EFF6F1</p>
            </div>

            <div class="col-md-1 cl-s-gtwo" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="colormncode-saven"></div>
                <p class="clr-code">#525C60</p>
            </div>
        </div>

        <div class="row s-g-mn-row ">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">Text Styles</h3>
            </div>

            <div class="col-md-9 cl-s-gsec">
                <h1 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Display H1 Text</h1>
                <h2 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Heading H2 Text</h2>
                <h3 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Heading H3 Text</h3>
                <h4 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Heading H4 Text</h4>
                <h5 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Heading H5 Text</h5>
                <h6 class="heading-one-cl" data-aos="fade-up" data-aos-duration="1000">Heading H6 Text</h6>
            </div>
        </div>

        <div class="row s-g-mn-row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right">Paragraph</h3>
            </div>

            <div class="col-md-9 cl-s-gsec">
                <p class="style-guide-pera">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
            </div>
        </div>

        <div class="row s-g-mn-row">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">List</h3>
            </div>

            <div class="col-md-9 cl-s-gsec tallft">
                <p class="style-guide-pera" data-aos="fade-up" data-aos-duration="1000"><span class="styl-num-clr">1.</span> Publishing packages and web pageLorem Ipsum as their default</p>
                <p class="style-guide-pera" data-aos="fade-up" data-aos-duration="1000"><span class="styl-num-clr">2.</span> Content here, content here', making it look like readable</p>
                <p class="style-guide-pera" data-aos="fade-up" data-aos-duration="1000"><span class="styl-num-clr">3.</span> Packages and web pageLorem Ipsum as their default</p>
            </div>
        </div>

        <div class="row s-g-mn-row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right">Quotes</h3>
            </div>

            <div class="col-md-9 cl-s-gsec">
                <div class="cntr-clg-sng">
                    <p class="ccs-pera-one">“The first rule of any organic used in a business is that nature applied to an efficient operation will magnify the efficiency. The second is that organic applied to an inefficient operation will magnify the health.”</p>
                </div>
            </div>
        </div>

        <div class="row s-g-mn-row ">
            <div class="col-md-3 cl-s-gone">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="900">Button</h3>
            </div>

            <div class="col-md-9 cl-s-gsec">
                <button type="button" class="btn btn-md style-guide-defoult-btn m-b-set btnefct-2" data-hover="Click me!" data-aos="fade-up" data-aos-duration="1000"><a href="#">Default Button &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>

                <button type="button" class="btn btn-md hiro-btn m-b-set btnefct" data-aos="fade-up" data-aos-duration="1100"><a href="#">Default Button &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>

                <button type="button" class="btn btn-md shops8-btns8-s8 m-b-set btnefct-1" data-aos="fade-up" data-aos-duration="1200"><a href="#">Default Button &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>

                <button type="submit" class="btn btn-lg s-9btn" data-aos="fade-up" data-aos-duration="1000">Pagination Button</button>
            </div>
        </div>
    </div>

    @include('partials.newsletter')
@endsection
