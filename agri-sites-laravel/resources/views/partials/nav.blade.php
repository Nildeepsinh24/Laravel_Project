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
            <div class="df-media" style="display: flex; align-items: center; gap: 20px; flex: 1; position: relative;">
                <div style="flex: 0 1 400px; position: relative;">
                    <form method="GET" action="{{ route('shop') }}" class="input-group flex-nowrap header-inpt-cntrl" id="searchForm">
                        <input type="text" name="q" id="searchInput" value="{{ request('q') }}" class="form-control brds-impt" placeholder="Search products" autocomplete="off">
                        <button class="input-group-text search-bar-head" id="addon-wrapping" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div id="searchDropdown" class="search-dropdown" style="display: none;">
                        <div id="searchResults"></div>
                    </div>
                </div>

                @auth
                    <div class="dropdown">
                        <button class="d-flex flex-column align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0; background: none; border: none; cursor: pointer; gap: 4px;">
                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-weight: 700; font-size: 16px;">
                                {{ $initial }}
                            </div>
                            <span style="font-size: 11px; color: #5e3023; font-weight: 600; white-space: nowrap;">Profile</span>
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
                                <a href="{{ route('profile') }}" class="btn btn-sm" style="background-color: #5e3023; color: white; border: 1px solid #5e3023;">View Profile</a>
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

                <a href="{{ route('cart.index') }}" class="cart text-decoration-none" style="display: flex; flex-direction: column; align-items: center; color: #5e3023; text-align: center; background: none; border: none; position: relative; gap: 4px;">
                    <div class="icn-crt" style="font-size: 18px;"><i class="bi bi-cart3"></i></div>
                    <span class="badge bg-danger" data-cart-count style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 20px; height: 20px; display: {{ $cartCount > 0 ? 'flex' : 'none' }}; align-items: center; justify-content: center; font-size: 11px;">{{ $cartCount }}</span>
                    <div class="cart-head" style="font-size: 11px; white-space: nowrap; font-weight: 600;">Cart</div>
                </a>

                @auth
                    @if($user->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="cart text-decoration-none" style="display: flex; flex-direction: column; align-items: center; color: #dc3545; text-align: center; background: none; border: none; gap: 4px;">
                            <div class="icn-crt" style="font-size: 18px;"><i class="bi bi-speedometer2"></i></div>
                            <div class="cart-head" style="font-size: 11px; white-space: nowrap; font-weight: 600;">Admin</div>
                        </a>
                    @endif
                    <a href="{{ route('wishlist.index') }}" class="cart text-decoration-none" style="display: flex; flex-direction: column; align-items: center; color: #5e3023; text-align: center; background: none; border: none; position: relative; gap: 4px;">
                        <div class="icn-crt" style="font-size: 18px;"><i class="bi bi-heart"></i></div>
                        <span class="badge bg-danger" data-wishlist-count style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 20px; height: 20px; display: {{ $wishlistCount > 0 ? 'flex' : 'none' }}; align-items: center; justify-content: center; font-size: 11px;">{{ $wishlistCount }}</span>
                        <div class="cart-head" style="font-size: 11px; white-space: nowrap; font-weight: 600;">Wishlist</div>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
.search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    max-height: 400px;
    overflow-y: auto;
    z-index: 1050;
    margin-top: 0;
}

.search-result-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background 0.2s;
    text-decoration: none;
    color: #333;
}

.search-result-item:hover {
    background: #f8f9fa;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 12px;
}

.search-result-info {
    flex: 1;
}

.search-result-name {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 4px;
    color: #333;
}

.search-result-price {
    font-size: 13px;
    color: #28a745;
    font-weight: 600;
}

.search-no-results {
    padding: 20px;
    text-align: center;
    color: #999;
}

.search-loading {
    padding: 15px;
    text-align: center;
    color: #666;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchDropdown = document.getElementById('searchDropdown');
    const searchResults = document.getElementById('searchResults');
    const searchForm = document.getElementById('searchForm');
    let searchTimeout;

    if (searchInput) {
        // Live search on input
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            if (query.length < 2) {
                searchDropdown.style.display = 'none';
                return;
            }

            // Show loading
            searchResults.innerHTML = '<div class="search-loading"><i class="bi bi-arrow-repeat" style="animation: spin 1s linear infinite;"></i> Searching...</div>';
            searchDropdown.style.display = 'block';

            // Debounce search
            searchTimeout = setTimeout(function() {
                fetch('{{ route("shop") }}?q=' + encodeURIComponent(query), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Parse the HTML to extract products
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const products = doc.querySelectorAll('.section-3-card-main');
                    
                    if (products.length === 0) {
                        searchResults.innerHTML = '<div class="search-no-results"><i class="bi bi-search"></i> No products found for "' + query + '"</div>';
                    } else {
                        let resultsHtml = '';
                        products.forEach((product, index) => {
                            if (index < 5) { // Show max 5 results
                                const link = product.querySelector('a');
                                const img = product.querySelector('img');
                                const name = product.querySelector('.crd-hsix');
                                const price = product.querySelector('.r-text');
                                
                                if (link && img && name && price) {
                                    resultsHtml += `
                                        <a href="${link.href}" class="search-result-item">
                                            <img src="${img.src}" alt="${name.textContent}" class="search-result-img">
                                            <div class="search-result-info">
                                                <div class="search-result-name">${name.textContent}</div>
                                                <div class="search-result-price">${price.textContent}</div>
                                            </div>
                                        </a>
                                    `;
                                }
                            }
                        });
                        
                        if (products.length > 5) {
                            resultsHtml += '<a href="{{ route("shop") }}?q=' + encodeURIComponent(query) + '" class="search-result-item" style="justify-content: center; color: #28a745; font-weight: 600;"><i class="bi bi-arrow-right-circle me-2"></i>View all ' + products.length + ' results</a>';
                        }
                        
                        searchResults.innerHTML = resultsHtml;
                    }
                })
                .catch(error => {
                    searchResults.innerHTML = '<div class="search-no-results">Error loading results</div>';
                });
            }, 50); // Reduced debounce timing for faster response
        });

        // Form submission still works for Enter key
        searchForm.addEventListener('submit', function(e) {
            searchDropdown.style.display = 'none';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
                searchDropdown.style.display = 'none';
            }
        });

        // Show dropdown when focusing on input with existing query
        searchInput.addEventListener('focus', function() {
            if (this.value.trim().length >= 2 && searchResults.innerHTML) {
                searchDropdown.style.display = 'block';
            }
        });
    }
});
</script>

<style>
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>
