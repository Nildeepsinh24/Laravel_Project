@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    $user = Auth::user();
    $initial = $user ? strtoupper(Str::substr($user->name, 0, 1)) : '';
    $wishlistCount = $user ? \App\Models\Wishlist::where('user_id', $user->id)->count() : 0;
    $cartCount = session('cart.items') ? collect(session('cart.items'))->sum('qty') : 0;
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
            <div class="df-media" style="display: flex; align-items: center; gap: 20px; flex: 1;">
                <form method="GET" action="{{ route('shop') }}" class="input-group flex-nowrap header-inpt-cntrl" style="flex: 0 1 400px;">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control brds-impt" placeholder="Search products">
                    <button class="input-group-text search-bar-head" id="addon-wrapping" type="submit"><i class="bi bi-search"></i></button>
                </form>

                @auth
                    <div class="dropdown">
                        <button class="btn btn-light border d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 6px 10px;">
                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; font-weight: 700; font-size: 14px;">
                                {{ $initial }}
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-3 shadow" aria-labelledby="profileDropdown" style="min-width: 240px;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; font-weight: 700;">
                                    {{ $initial }}
                                </div>
                                <div class="ms-2">
                                    <div class="fw-semibold">{{ $user->name }}</div>
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
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="font-size: 14px;">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-success" style="padding: 6px 16px; font-size: 13px;">Register</a>
                    </div>
                @endauth

                <a href="{{ route('cart.index') }}" class="cart text-decoration-none" style="display: flex; flex-direction: column; align-items: center; color: #333; text-align: center; background: none; border: none; position: relative;">
                    <div class="icn-crt" style="font-size: 20px;"><i class="bi bi-cart3"></i></div>
                    <span class="badge bg-danger" data-cart-count style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 20px; height: 20px; display: {{ $cartCount > 0 ? 'flex' : 'none' }}; align-items: center; justify-content: center; font-size: 11px;">{{ $cartCount }}</span>
                    <div class="cart-head" style="font-size: 12px; white-space: nowrap;">Cart</div>
                </a>

                @auth
                    <a href="{{ route('wishlist.index') }}" class="cart text-decoration-none" style="display: flex; flex-direction: column; align-items: center; color: #333; text-align: center; background: none; border: none; position: relative;">
                        <div class="icn-crt" style="font-size: 20px;"><i class="bi bi-heart"></i></div>
                        <span class="badge bg-danger" data-wishlist-count style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 20px; height: 20px; display: {{ $wishlistCount > 0 ? 'flex' : 'none' }}; align-items: center; justify-content: center; font-size: 11px;">{{ $wishlistCount }}</span>
                        <div class="cart-head" style="font-size: 12px; white-space: nowrap;">Wishlist</div>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
