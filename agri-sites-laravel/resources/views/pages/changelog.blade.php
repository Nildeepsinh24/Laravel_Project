@extends('layouts.app')

@section('title', 'Changelog')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row licenses-main-row">
                <h1 class="abt-hiro-head">Changelog</h1>
            </div>
        </div>
    </section>

    <div class="container cnglg-cntrnr">
        <div class="msgandcnct-changlog">
            <img src="{{ $asset }}/changelog-img.png" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000" alt="Changelog illustration">
            <div class="changlogcall-cnct">
                <p class="mail-pera"> <span class="fmly-clr">V.1</span> Initial Organick Webflow Template Release</p>
            </div>
        </div>
    </div>

    @include('partials.newsletter')
@endsection
