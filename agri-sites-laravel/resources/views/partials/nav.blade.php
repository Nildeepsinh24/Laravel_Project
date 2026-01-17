@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    $user = Auth::user();
    $initial = $user ? strtoupper(Str::substr($user->name, 0, 1)) : '';
@endphp
<nav class="navbar navbar-expand-md sticky-top navbar-light mnnvbr">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/Logo.svg') }}" class="img-fluid logoimg" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="menu">
                <input type="checkbox" id="check">
                <label for="check" class="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </button>

        <div class="collapse navbar-collapse header-dpdn" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}" href="{{ route('services') }}">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop*') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            <div class="df-media">
                <form method="GET" action="{{ route('shop') }}" class="input-group flex-nowrap header-inpt-cntrl">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control brds-impt" placeholder="Search products">
                    <button class="input-group-text search-bar-head" id="addon-wrapping" type="submit"><i class="bi bi-search"></i></button>
                </form>

                @auth
                    <div class="dropdown ms-3">
                        <button class="btn btn-light border d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-weight: 700;">
                                {{ $initial }}
                            </div>
                            <span class="ms-2 fw-semibold">{{ Str::limit($user->name, 12) }}</span>
                            <i class="bi bi-caret-down-fill ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-3 shadow" aria-labelledby="profileDropdown" style="min-width: 240px;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; font-weight: 700;">
                                    {{ $initial }}
                                </div>
                                <div class="ms-2">
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    <div class="text-muted small">{{ $user->email }}</div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile') }}" class="btn btn-outline-secondary btn-sm">View Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex align-items-center ms-3">
                        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-success btn-sm ms-2">Register</a>
                    </div>
                @endauth

                <a href="{{ route('cart.index') }}" class="cart text-decoration-none ms-3">
                    <div class="icn-crt"><i class="bi bi-cart3"></i></div>
                    <div class="cart-head">Cart({{ session('cart.total_qty', session('cart.total_qty') ?? (session('cart.items') ? collect(session('cart.items'))->sum('qty') : 0)) }})</div>
                </a>
            </div>
        </div>
    </div>
</nav>
