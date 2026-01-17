@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-4">
                    @php
                        $initial = strtoupper(substr(auth()->user()->name, 0, 1));
                    @endphp
                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 100px; height: 100px; font-size: 48px; font-weight: 700;">
                        {{ $initial }}
                    </div>
                    <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-3">{{ auth()->user()->email }}</p>
                    <div class="border-top pt-3">
                        <p class="mb-1 text-muted small">Member Since</p>
                        <p class="mb-0 fw-semibold">{{ optional(auth()->user()->created_at)->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card shadow-sm border-0 mt-3">
                <div class="card-body p-4">
                    <h6 class="mb-3 fw-bold">Account Overview</h6>
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-cart-check text-success me-2" style="font-size: 1.5rem;"></i>
                            <span>Total Orders</span>
                        </div>
                        <span class="badge bg-success">{{ auth()->user()->orders()->count() ?? 0 }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('wishlist.index') }}" class="text-decoration-none text-dark d-flex align-items-center flex-grow-1">
                            <i class="bi bi-heart text-danger me-2" style="font-size: 1.5rem;"></i>
                            <span>Wishlist</span>
                        </a>
                        <a href="{{ route('wishlist.index') }}" class="text-decoration-none">
                            <span class="badge bg-danger">{{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details & Settings -->
        <div class="col-md-8">
            <!-- Account Information -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>Account Information</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <p class="text-muted mb-1">Full Name</p>
                            <p class="fw-semibold mb-0">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1">Email Address</p>
                            <p class="fw-semibold mb-0">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1">Account Status</p>
                            <span class="badge bg-success">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Security Settings</h5>
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#resetPasswordForm" aria-expanded="false" aria-controls="resetPasswordForm">
                        <i class="bi bi-key me-2"></i>Change Password
                    </button>

                    <div class="collapse mt-4" id="resetPasswordForm">
                        <div class="bg-light p-4 rounded">
                            <h6 class="mb-3">Change Your Password</h6>
                            <form method="POST" action="{{ route('profile.password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><i class="bi bi-lock me-1"></i>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="bi bi-lock me-1"></i>New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                                    <small class="text-muted">Must be at least 8 characters</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="bi bi-lock-fill me-1"></i>Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter new password" required>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-1"></i>Update Password</button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#resetPasswordForm">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Last Password Change</h6>
                                <p class="text-muted small mb-0">Your password was last updated recently</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Back to Home
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-2px);
}
</style>
@endsection
