@extends('layouts.app')

@section('title', 'Licenses')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row licenses-main-row">
                <h1 class="abt-hiro-head">Licenses</h1>
            </div>
        </div>
    </section>

    <div class="container lsns-mn-contnr">
        <div class="row lsns-mn-row">
            <div class="col-md-3 lsns-mn-clm-one">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">Icon & Graphics</h3>
            </div>

            <div class="col-md-9 lsns-mn-col-two" data-aos="fade-up" data-aos-duration="1200">
                <p class="cnct-one-1-pera">Icons and Graphics are manually designed by the VictorFlow Templates team. You may download these and edit them to fit your website without asking for permission or providing credit.</p>
                <p class="cnct-one-1-pera">Upon purchasing Software UI Kit Template our team grants you a nonexclusive, worldwide copyright license to download, copy, modify, and use the icons.</p>
            </div>

            <div class="col-md-3 lsns-mn-clm-one">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">Photography</h3>
            </div>

            <div class="col-md-9 lsns-mn-col-two">
                <p class="cnct-one-1-pera" data-aos="fade-up" data-aos-duration="1000">IAll images used in the Organick Webflow Template are licensed for free personal and commercial use. If you'd like to use any specific image, you can check the licenses and download the images for free on Unsplash, Pexels‍. And Freepik.</p>

                <h5 class="lsn-h6" data-aos="fade-up" data-aos-duration="1000">Unsplash</h5>
                <p class="cnct-one-1-pera" data-aos="fade-up" data-aos-duration="1000">Image 1, Image 2, Image 3, Image 4, Image 5, Image 6, Image 7, Image 8, Image 9, Image 10, Image 11, Image 12, Image 13, Image 14, Image 15, Image 16, Image 17, Image 18, Image 19, Image 20, Image 21, Image 22, Image 23, Image 24, Image 25,</p>

                <h5 class="lsn-h6" data-aos="fade-up" data-aos-duration="1000">Pixcel</h5>
                <p class="cnct-one-1-pera" data-aos="fade-up" data-aos-duration="1000">Image 1, Image 2, Image 3, Image 4, Image 5, Image 6, Image 7, Image 8, Image 9, Image 10, Image 11, Image 12, Image 13, Image 14, Image 15, Image 16, Image 17,</p>
            </div>

            <div class="col-md-3 lsns-mn-clm-one">
                <h3 class="licenses-head-right" data-aos="fade-up" data-aos-duration="1000">Font</h3>
            </div>

            <div class="col-md-9 lsns-mn-col-two" data-aos="fade-up" data-aos-duration="1000">
                <p class="cnct-one-1-pera">Organick template uses free licensed Google Fonts. Please check <span class="fand-cand-blt">Roboto, Yellowtail</span> and <span class="fand-cand-blt">Open Sans.</span></p>
            </div>
        </div>
    </div>

    @include('partials.newsletter')
@endsection
