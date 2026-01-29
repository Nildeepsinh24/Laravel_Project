@extends('layouts.app')
@section('body-class', 'no-footer')

@section('title', 'Register')

@section('content')
<div class="auth-page-wrapper" style="background-color: #FDF8F0; min-height: 100vh; padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg" style="border: none; border-radius: 15px;">
                    <div class="card-body p-5">
                        <h3 class="mb-1 text-center" style="color: #5e3023; font-weight: 700; font-size: 28px;">Create account</h3>
                        <p class="text-center mb-4" style="color: #6B5344; font-size: 14px;">Join our farming community</p>

                        @if ($errors->any())
                            <div class="alert" style="background-color: #FFE5E5; color: #C41C3B; border: 1px solid #E56B7B; border-radius: 8px;">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Full Name</label>
                                <input type="text" name="name" class="form-control auth-input" value="{{ old('name') }}" required style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Email Address</label>
                                <input type="email" name="email" class="form-control auth-input" value="{{ old('email') }}" required style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Password</label>
                                <input type="password" name="password" class="form-control auth-input" required style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control auth-input" required style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <button type="submit" class="btn w-100" style="background-color: #5e3023; color: white; font-weight: 600; border: none; border-radius: 8px; padding: 11px; font-size: 15px;">Create Account</button>
                        </form>

                        <div class="text-center mt-4">
                            <small style="color: #6B5344;">Already have an account? <a href="{{ route('login') }}" style="color: #5e3023; text-decoration: none; font-weight: 600;">Sign in</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
