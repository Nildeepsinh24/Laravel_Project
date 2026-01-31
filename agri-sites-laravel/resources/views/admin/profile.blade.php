@extends('admin.layouts.app')

@section('title','Profile')

@section('content')
@php $asset = asset('assets'); @endphp
<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: var(--og-primary); color: white;">
                <div class="hiro-cnct-btn text-center">
                    <h6 class="hiro-headsix">Admin Panel</h6>
                    <h1 class="hiro-head-one">Profile</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cnct-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4" style="background: var(--og-card); border: 1px solid var(--og-primary-soft); max-width: 900px; margin: 0 auto;">
                    <div style="display:flex;align-items:center;gap:16px;margin-bottom:12px;">
                        <div style="width:72px;height:72px;border-radius:12px;background:linear-gradient(135deg,var(--og-primary),var(--og-sidebar));display:flex;align-items:center;justify-content:center;color:white;font-weight:800;font-size:28px;">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                        <div>
                            <h3 style="margin:0; color: var(--og-text);">{{ auth()->user()->name }}</h3>
                            <div style="color: var(--og-muted);">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <hr style="border-color: var(--og-primary-soft);" />
                    <h5 style="margin-top:12px; color: var(--og-text);">Account Details</h5>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:10px">
                        <div><strong style="color: var(--og-text);">User ID</strong><div style="color: var(--og-text);">{{ auth()->user()->id }}</div></div>
                        <div><strong style="color: var(--og-text);">Role</strong><div style="color: var(--og-text);">{{ auth()->user()->is_admin ? 'Administrator' : 'User' }}</div></div>
                        <div><strong style="color: var(--og-text);">Joined</strong><div style="color: var(--og-text);">{{ auth()->user()->created_at->format('M d, Y') }}</div></div>
                        <div><strong style="color: var(--og-text);">Last Updated</strong><div style="color: var(--og-text);">{{ auth()->user()->updated_at->format('M d, Y') }}</div></div>
                    </div>
                    <p style="margin-top:18px;color: var(--og-muted);">You can use this page to view and update admin account settings. For security-sensitive updates (password, 2FA) use your main profile page.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
