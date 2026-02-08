@extends('admin.layouts.app')

@section('title','Profile')

@section('content')
@php $asset = asset('assets'); @endphp

<style>
.premium-header {
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.premium-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
    border-radius: 50%;
}

.header-title {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    position: relative;
    z-index: 1;
}

.header-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.premium-profile-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    animation: fadeInUp 0.5s ease-out;
}

.profile-header-section {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid rgba(20, 184, 166, 0.15);
}

.profile-avatar {
    width: 80px;
    height: 80px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 800;
    font-size: 32px;
    box-shadow: 0 8px 24px rgba(20, 184, 166, 0.25);
}

.profile-info h3 {
    margin: 0;
    color: var(--og-text);
    font-size: 1.5rem;
    font-weight: 700;
}

.profile-info-email {
    color: var(--og-muted);
    font-size: 0.95rem;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.detail-item {
    padding: 1.25rem;
    background: rgba(20, 184, 166, 0.05);
    border-left: 4px solid var(--og-primary);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.detail-item:hover {
    background: rgba(20, 184, 166, 0.1);
    transform: translateX(4px);
}

.detail-label {
    color: var(--og-muted);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.detail-value {
    color: var(--og-text);
    font-size: 1rem;
    font-weight: 500;
}

.info-text {
    margin-top: 2rem;
    padding: 1rem;
    background: rgba(245, 158, 11, 0.08);
    border-left: 4px solid var(--og-accent);
    color: var(--og-muted);
    font-size: 0.95rem;
    border-radius: 8px;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12">
                <div class="premium-header">
                    <div class="text-center">
                        <h1 class="header-title">Admin Profile</h1>
                        <p class="header-subtitle mt-2">Manage your account information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="premium-profile-card">
            <div class="profile-header-section">
                <div class="profile-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="profile-info">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p class="profile-info-email">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <h5 style="color: var(--og-text); margin-bottom: 1.5rem; font-weight: 700;">Account Details</h5>
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-hashtag me-2"></i>User ID
                    </div>
                    <div class="detail-value">#{{ auth()->user()->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-shield-alt me-2"></i>Role
                    </div>
                    <div class="detail-value">
                        @if(auth()->user()->is_admin)
                            <span style="color: var(--og-primary); font-weight: 700;">Administrator</span>
                        @else
                            <span>User</span>
                        @endif
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-calendar-alt me-2"></i>Joined Date
                    </div>
                    <div class="detail-value">{{ auth()->user()->created_at->format('M d, Y') }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-sync-alt me-2"></i>Last Updated
                    </div>
                    <div class="detail-value">{{ auth()->user()->updated_at->format('M d, Y') }}</div>
                </div>
            </div>

            <div class="info-text">
                <i class="fas fa-info-circle me-2"></i>
                You can view your account details here. For security-sensitive updates (password, 2FA), please use your main profile page.
            </div>
        </div>
    </div>
</section>
@endsection
