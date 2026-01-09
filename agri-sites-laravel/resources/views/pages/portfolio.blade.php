@extends('layouts.app')

@section('title', 'Portfolio')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row portfolio-main-row">
                <h1 class="abt-hiro-head prtflo-h1">Portfolio Standard</h1>
            </div>
        </div>
    </section>

    <div class="container portfolio-content-main">
        <div class="row prtflo-row mt-5">
            <div class="col-md-4 prtofl-clm-cnct-one">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Green &amp; Tasty Lemon</p>
                            <p class="p-c-s-two">Fruits</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 prtofl-clm-cnct-two">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg pimg-two-sec">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Organic Carrot</p>
                            <p class="p-c-s-two">Farmer</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 prtofl-clm-cnct-three">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg pimg-three-thrd">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Organic Betel Leaf</p>
                            <p class="p-c-s-two">Leaf</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row prtflo-row">
            <div class="col-md-4 prtofl-clm-cnct-one">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg pimg-four-fourth">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Natural Tommato</p>
                            <p class="p-c-s-two">Fruits</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 prtofl-clm-cnct-two">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg pimg-five-fiveth">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Black Raspberry</p>
                            <p class="p-c-s-two">Farmer</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 prtofl-clm-cnct-three">
                <a href="{{ route('portfolio.single') }}">
                    <div class="card portcard">
                        <div class="hvrefcimg pimg-six-sixth-img">
                            <div class="wht-bg-mn">
                                <div class="brs-hvr"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="card-body prtflo-c-bdy">
                            <p class="p-c-s-one">Honey Orange</p>
                            <p class="p-c-s-two">Farmer</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('partials.newsletter')
@endsection
