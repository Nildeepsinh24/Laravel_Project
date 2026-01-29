@extends('layouts.app')
@section('body-class', 'no-footer')

@section('title', 'Login')

@section('content')
<div class="auth-page-wrapper" style="background-color: #FDF8F0; min-height: 100vh; padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg" style="border: none; border-radius: 15px;">
                    <div class="card-body p-5">
                        <h3 class="mb-1 text-center" style="color: #5e3023; font-weight: 700; font-size: 28px;">Welcome back</h3>
                        <p class="text-center mb-4" style="color: #6B5344; font-size: 14px;">Sign in to your account</p>

                        @if ($errors->any())
                            <div class="alert" style="background-color: #FFE5E5; color: #C41C3B; border: 1px solid #E56B7B; border-radius: 8px;">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Email Address</label>
                                <input type="email" name="email" class="form-control auth-input" value="{{ old('email') }}" required autofocus style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color: #5e3023; font-weight: 600;">Password</label>
                                <input type="password" name="password" class="form-control auth-input" required style="border: 1px solid #E0D5C8; border-radius: 8px; padding: 10px 12px; font-size: 14px;">
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" style="border-color: #5e3023;">
                                <label class="form-check-label" for="remember" style="color: #6B5344; font-size: 14px;">Remember me</label>
                            </div>
                            <button type="submit" class="btn w-100" style="background-color: #5e3023; color: white; font-weight: 600; border: none; border-radius: 8px; padding: 11px; font-size: 15px;">Sign In</button>
                        </form>

                        <div class="text-center mt-4">
                            <small style="color: #6B5344;"><a href="{{ route('password.forgot') }}" style="color: #5e3023; text-decoration: none; font-weight: 600;">Forgot password?</a></small><br>
                            <small style="color: #6B5344; margin-top: 8px; display: block;">Don't have an account? <a href="{{ route('register') }}" style="color: #5e3023; text-decoration: none; font-weight: 600;">Register now</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
