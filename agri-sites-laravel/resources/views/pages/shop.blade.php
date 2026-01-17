@extends('layouts.app')

@section('title', 'Shop')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row shop-main-row">
                <h1 class="abt-hiro-head">Shop</h1>
            </div>
        </div>
    </section>

    <section id="card-section">
        <div class="container">
            @if(request('q'))
            <div class="row mb-4">
                <div class="col">
                    <div class="alert alert-success d-flex align-items-center justify-content-between" style="border-left: 4px solid #28a745; background: #f0f9f4;">
                        <div>
                            <i class="bi bi-search me-2"></i>
                            <strong>Search Results:</strong> 
                            <span class="ms-2">Found {{ $products->count() }} {{ Str::plural('product', $products->count()) }} for "{{ request('q') }}"</span>
                        </div>
                        <a href="{{ route('shop') }}" class="btn btn-sm btn-outline-success">Clear Search</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="row card-row-section">
                @forelse($products as $index => $product)
                <div class="col-md-3 @switch($index % 4)
                    @case(0)card-cl-one@break
                    @case(1)card-cl-two@break
                    @case(2)card-cl-three@break
                    @case(3)card-cl-four@break
                @endswitch card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card section-3-card-main position-relative">
                        @auth
                            @php
                                $inWishlist = \App\Models\Wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->exists();
                            @endphp
                            <div class="position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                                <button type="button" onclick="toggleWishlist(event, '{{ $product->slug }}', this)" class="btn btn-sm {{ $inWishlist ? 'btn-danger' : 'btn-outline-danger' }} rounded-circle wishlist-btn" style="width: 35px; height: 35px;" data-slug="{{ $product->slug }}" data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}" title="{{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                    <i class="bi {{ $inWishlist ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                                </button>
                            </div>
                        @endauth
                        <a href="{{ route('shop.single', $product->slug) }}">
                            <div class="card-body">
                                <span class="card-title ctone">{{ $product->category }}</span>
                                <img src="{{ $asset }}/{{ $product->image }}" class="img-fluid c-8mtmb" alt="{{ $product->name }}">
                                <h6 class="card-text crd-hsix">{{ $product->name }}</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>₹{{ number_format($product->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">₹{{ number_format($product->sale_price, 2) }}</h6>
                                    </div>
                                    <div class="star">
                                        @for($i = 0; $i < $product->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted">No products found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection

@push('scripts')
<script>
function toggleWishlist(event, slug, button) {
    event.preventDefault();
    event.stopPropagation();
    
    const isInWishlist = button.getAttribute('data-in-wishlist') === 'true';
    const action = isInWishlist ? 'remove' : 'add';
    
    // Build the URL
    const baseUrl = '{{ url("/") }}';
    const url = baseUrl + '/wishlist/' + action + '/' + slug;
    
    // Get CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    // Send AJAX request
    fetch(url, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Toggle button appearance
            if (data.in_wishlist) {
                button.classList.remove('btn-outline-danger');
                button.classList.add('btn-danger');
                button.setAttribute('data-in-wishlist', 'true');
                button.title = 'Remove from Wishlist';
            } else {
                button.classList.remove('btn-danger');
                button.classList.add('btn-outline-danger');
                button.setAttribute('data-in-wishlist', 'false');
                button.title = 'Add to Wishlist';
            }
            
            // Update heart icon
            const icon = button.querySelector('i');
            if (data.in_wishlist) {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
            } else {
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
            }

            // Update wishlist badge in navbar
            const wishlistBadge = document.querySelector('[data-wishlist-count]');
            if (wishlistBadge && data.wishlist_count !== undefined) {
                const count = Number(data.wishlist_count) || 0;
                wishlistBadge.textContent = count;
                wishlistBadge.style.display = count > 0 ? 'flex' : 'none';
            }
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.style.cssText = 'position: fixed; top: 100px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);';
            alert.innerHTML = `
                <strong>✓ Success!</strong> ${data.product_name} ${data.in_wishlist ? 'added to' : 'removed from'} wishlist.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.body.appendChild(alert);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                alert.remove();
            }, 3000);
        } else {
            throw new Error(data.message || 'Failed to update wishlist');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        
        // Show error message
        const alert = document.createElement('div');
        alert.className = 'alert alert-danger alert-dismissible fade show';
        alert.style.cssText = 'position: fixed; top: 100px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);';
        alert.innerHTML = `
            <strong>✗ Error!</strong> Failed to update wishlist. Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        document.body.appendChild(alert);
        
        setTimeout(() => {
            alert.remove();
        }, 5000);
    });
}
</script>
@endpush
