@extends('layouts.app')

@section('title', $product->name)

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row shop-single-main-row">
                <h1 class="abt-hiro-head">{{ $product->name }}</h1>
            </div>
        </div>
    </section>

    <section id="shop-single-main-section">
        <div class="container shop-single-cnctrnr">
            <div class="row ss-main-row">
                <div class="col-md-6 clm-one-ss-one">
                    <div class="card-body buy-img-ss">
                        <span class="card-title ctone">{{ $product->category }}</span>
                        <div class="s-img-cntr">
                            <img src="{{ $asset }}/{{ $product->image }}" class="img-fluid" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 clm-one-ss-two">
                    <div class="ss-buy-content-one">
                        <h4 class="cnct-one-1head-oactmd" data-aos="fade-up" data-aos-duration="1000">{{ $product->name }}</h4>
                        <div class="star">
                            @for($i = 0; $i < $product->rating; $i++)
                            <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        <div class="cf-h mt-3">
                            <h6 class="card-text d-text"><del>${{ number_format($product->original_price, 2) }}</del></h6>
                            <h6 class="card-text r-text">${{ number_format($product->sale_price, 2) }}</h6>
                        </div>
                        <p class="cnct-one-1-pera mt-2">{{ $product->description ?? 'Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.' }}</p>
                        <div class="main-b">
                            <div class="buy-nm">
                                <h6 class="card-text r-text">Quantity :</h6>
                            </div>
                            <div class="m-smain">
                                <form method="POST" action="{{ route('cart.add', $product->slug) }}" class="input-group gp-iand-b">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1" class="form-control quntity-buy" required>
                                    <button type="submit" class="btn btn-md shop-single-btn btnefct-2" data-hover="Click me!">Add To Cart &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pd-and-ainf">
        <div class="container pd-and-ainfo-main">
            <div class="tabs-wrapper">
                <div class="tab-buttons">
                    <button type="button" class="tab-btn active" onclick="showProductDescription()" id="btn-description">
                        <a href="javascript:void(0);">Product Description</a>
                    </button>
                    <button type="button" class="tab-btn" onclick="showAdditionalInfo()" id="btn-additional">
                        <a href="javascript:void(0);">Additional Info</a>
                    </button>
                </div>
            </div>
            
            <div class="tab-content-wrapper">
                <div id="product-description" class="tab-content active">
                    <div class="desc-block">
                        {!! $product->description ?? '<p>Welcome to the world of natural and organic. Here you can discover the bounty of nature. We have grown on the principles of health, ecology, and care.</p>' !!}

                        <h5 class="desc-subtitle">Key Benefits</h5>
                        <ul class="desc-list">
                            <li>100% natural, minimally processed ingredients.</li>
                            <li>Rich in essential nutrients, fiber, and wholesome goodness.</li>
                            <li>No artificial colors, flavors, or preservatives.</li>
                        </ul>

                        <h5 class="desc-subtitle">Usage Ideas</h5>
                        <ul class="desc-list">
                            <li>Great for everyday cooking: soups, salads, bowls, and stir‑fries.</li>
                            <li>Blend into smoothies or bake into healthy snacks.</li>
                            <li>Pairs well with fresh herbs, spices, and seasonal produce.</li>
                        </ul>

                        <h5 class="desc-subtitle">Storage Tips</h5>
                        <p>Store in a cool, dry place away from direct sunlight. Reseal after opening to maintain freshness. For longer shelf life, keep in an airtight container.</p>
                    </div>
                </div>
                
                <div id="additional-info" class="tab-content" style="display: none;">
                    {!! $product->additional_info ?? 'Weight: 500g | Storage: Cool & Dry Place | Shelf Life: 12 months' !!}
                </div>
            </div>
        </div>
    </section>

    <style>
        #pd-and-ainf {
            padding: 50px 0;
            background: #ffffff;
        }

        .tabs-wrapper {
            margin-bottom: 30px;
            border-bottom: 2px solid #e8e8e8;
        }

        .tab-buttons {
            display: flex;
            gap: 0;
            align-items: flex-end;
        }

        .tab-btn {
            background: transparent;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 600;
            color: #999;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            margin: 0;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
        }

        .tab-btn a {
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .tab-btn:hover {
            color: #28a745;
        }

        .tab-btn.active {
            color: #28a745;
            border-bottom-color: #28a745;
        }

        .tab-content-wrapper {
            padding: 30px 0;
            min-height: 200px;
        }

        .tab-content {
            animation: fadeIn 0.4s ease;
        }

        .tab-content p {
            line-height: 1.9;
            color: #555;
            font-size: 16px;
            margin: 0;
            text-align: justify;
        }

        .tab-content {
            line-height: 2;
            color: #555;
            font-size: 15px;
        }

        .tab-content .desc-block {
            color: #555;
            font-size: 16px;
            line-height: 1.85;
        }

        .tab-content .desc-subtitle {
            margin-top: 18px;
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: 700;
            color: #28a745;
        }

        .tab-content .desc-list {
            margin: 0 0 10px 0;
            padding-left: 0;
            list-style: none;
        }

        .tab-content .desc-list li {
            margin-bottom: 6px;
            line-height: 1.8;
        }

        .tab-content strong {
            color: #28a745;
            font-weight: 600;
        }

        .tab-content br {
            content: '';
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        function showProductDescription() {
            document.getElementById('product-description').style.display = 'block';
            document.getElementById('additional-info').style.display = 'none';
            document.getElementById('btn-description').classList.add('active');
            document.getElementById('btn-additional').classList.remove('active');
        }

        function showAdditionalInfo() {
            document.getElementById('product-description').style.display = 'none';
            document.getElementById('additional-info').style.display = 'block';
            document.getElementById('btn-description').classList.remove('active');
            document.getElementById('btn-additional').classList.add('active');
        }
    </script>

    <section id="shop-single-related-product">
        <div class="container">
            <div class="row card-row-section">
                <h2 class="oupd" data-aos="fade-up" data-aos-duration="1000">Related Products</h2>

                @foreach($relatedProducts as $index => $related)
                <div class="col-md-3 @switch($index % 4)
                    @case(0)card-cl-one@break
                    @case(1)card-cl-two@break
                    @case(2)card-cl-three@break
                    @case(3)card-cl-four@break
                @endswitch card-cl-mt" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('shop.single', $related->slug) }}">
                        <div class="card section-3-card-main">
                            <div class="card-body">
                                <span class="card-title ctone">{{ $related->category }}</span>
                                <img src="{{ $asset }}/{{ $related->image }}" class="img-fluid c-i-7" alt="{{ $related->name }}">
                                <h6 class="card-text crd-hsix">{{ $related->name }}</h6>
                                <hr class="hr hrsprt">
                                <div class="ftr-dv">
                                    <div class="cf-h">
                                        <h6 class="card-text d-text"><del>${{ number_format($related->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">${{ number_format($related->sale_price, 2) }}</h6>
                                    </div>
                                    <div class="star">
                                        @for($i = 0; $i < $related->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
