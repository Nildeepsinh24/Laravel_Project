@extends('layouts.app')

@section('title', 'Page Not Found')

@php $asset = asset('assets'); @endphp

@section('content')
    <div class="container-fluid er-main-c-f p-0">
        <div class="row main-row-error">
            <div class="col-md-6 er-bg-right" data-aos="fade-up" data-aos-duration="1000"></div>

            <div class="col-md-6 er-cnct-left">
                <div class="cnct-er-mndv">
                    <img src="{{ $asset }}/404.png" class="img-fluid fofw" data-aos="fade-up" data-aos-duration="1000" alt="404">
                    <h1 class="hiro-head-one" data-aos="fade-up" data-aos-duration="1100">Page not found</h1>
                    <p class="cnct-one-1-pera-error">The page you are looking for doesn't exist or has been moved</p>

                    <button type="button" class="btn btn-md shop-btn-error btnefct-2" data-hover="Click me!" data-aos="fade-up" data-aos-duration="900">
                        <a href="{{ route('home') }}">Go to Homepage &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
