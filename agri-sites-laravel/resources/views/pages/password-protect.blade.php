@extends('layouts.app')

@section('title', 'Password Protected')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row licenses-main-row">
                <h1 class="passprot-hiro-head">Password Page</h1>
            </div>
        </div>
    </section>

    <div class="container pass-prot-main">
        <div class="row pptct-mn-row">
            <div class="col-md-3 cl-three" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <img src="{{ $asset }}/pptect-img-one.png" class="img-fluid" alt="Password protection">
            </div>

            <div class="col-md-9 cl-nine" data-aos="fade-up" data-aos-duration="1000">
                <form action="#">
                    <label class="lable-text">Password</label>
                    <input type="password" placeholder="Enter Your Password" class="form-control allbt-none" required />
                    <button type="submit" class="btn btn-md shop-btn btnefct-2" data-hover="Click me!"><a href="#">Send Now &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.newsletter')
@endsection
