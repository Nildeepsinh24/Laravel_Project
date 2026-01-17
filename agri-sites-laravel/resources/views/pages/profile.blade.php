@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="mb-3">Your Profile</h3>
                    <p class="text-muted mb-4">Basic account information.</p>

                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ auth()->user()->name }}</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ auth()->user()->email }}</dd>

                        <dt class="col-sm-4">Joined</dt>
                        <dd class="col-sm-8">{{ optional(auth()->user()->created_at)->format('M d, Y') }}</dd>
                    </dl>

                    <hr class="my-4">
                    <h5 class="mb-3">Reset Password</h5>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </form>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to Home</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
