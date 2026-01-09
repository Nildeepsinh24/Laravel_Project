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
                <div class="input-group flex-nowrap header-inpt-cntrl">
                    <input type="text" class="form-control brds-impt" placeholder="">
                    <span class="input-group-text search-bar-head" id="addon-wrapping"><i class="bi bi-search"></i></span>
                </div>

                <div class="cart">
                    <div class="icn-crt"><i class="bi bi-cart3"></i></div>
                    <div class="cart-head">Cart(0)</div>
                </div>
            </div>
        </div>
    </div>
</nav>
