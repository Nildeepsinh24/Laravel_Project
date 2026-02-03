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
                            <h6 class="card-text d-text"><del>₹{{ number_format($product->original_price, 2) }}</del></h6>
                            <h6 class="card-text r-text">₹{{ number_format($product->sale_price, 2) }}</h6>
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
                                    <button type="submit" class="btn btn-md shop-single-btn btnefct-2" style="color: #fff;" data-hover="Click me!">Add To Cart &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></button>
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
                        <i class="bi bi-file-text"></i>
                        <a href="javascript:void(0);">Product Description</a>
                    </button>
                    <button type="button" class="tab-btn" onclick="showAdditionalInfo()" id="btn-additional">
                        <i class="bi bi-info-circle"></i>
                        <a href="javascript:void(0);">Additional Info</a>
                    </button>
                </div>
            </div>
            
            <div class="tab-content-wrapper">
                <div id="product-description" class="tab-content active">
                    <div class="desc-block">
                        <div class="main-description">
                            {!! $product->description ?? '<p>Welcome to the world of natural and organic. Here you can discover the bounty of nature. We have grown on the principles of health, ecology, and care.</p>' !!}
                        </div>

                        <div class="features-section">
                            <h5 class="desc-subtitle">
                                <i class="bi bi-heart-fill"></i> Key Benefits
                            </h5>
                            <ul class="desc-list benefits-list">
                                <li><span class="benefit-icon">✓</span>100% natural, minimally processed ingredients.</li>
                                <li><span class="benefit-icon">✓</span>Rich in essential nutrients, fiber, and wholesome goodness.</li>
                                <li><span class="benefit-icon">✓</span>No artificial colors, flavors, or preservatives.</li>
                            </ul>
                        </div>

                        <div class="usage-section">
                            <h5 class="desc-subtitle">
                                <i class="bi bi-lightbulb-fill"></i> Usage Ideas
                            </h5>
                            <ul class="desc-list usage-list">
                                <li><span class="usage-icon">→</span>Great for everyday cooking: soups, salads, bowls, and stir‑fries.</li>
                                <li><span class="usage-icon">→</span>Blend into smoothies or bake into healthy snacks.</li>
                                <li><span class="usage-icon">→</span>Pairs well with fresh herbs, spices, and seasonal produce.</li>
                            </ul>
                        </div>

                        <div class="storage-section">
                            <h5 class="desc-subtitle">
                                <i class="bi bi-box-seam"></i> Storage Tips
                            </h5>
                            <div class="storage-box">
                                <p>Store in a cool, dry place away from direct sunlight. Reseal after opening to maintain freshness. For longer shelf life, keep in an airtight container.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="additional-info" class="tab-content" style="display: none;">
                    <div class="additional-info-container">
                        <div class="specs-content">
                            {!! $product->additional_info ?? '<p>No additional information available for this product.</p>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        #pd-and-ainf {
            padding: 50px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        /* Tabs Wrapper */
        .tabs-wrapper {
            margin-bottom: 40px;
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
            padding: 16px 30px;
            font-size: 16px;
            font-weight: 600;
            color: #999;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            margin: 0;
            border-bottom: 4px solid transparent;
            margin-bottom: -2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tab-btn i {
            font-size: 18px;
        }

        .tab-btn a {
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .tab-btn:hover {
            color: #28a745;
            background: rgba(40, 167, 69, 0.05);
        }

        .tab-btn.active {
            color: #28a745;
            border-bottom-color: #28a745;
            background: rgba(40, 167, 69, 0.05);
        }

        /* Tab Content */
        .tab-content-wrapper {
            padding: 40px 30px;
            min-height: 200px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .tab-content {
            animation: fadeIn 0.4s ease;
        }

        .tab-content.active {
            display: block !important;
        }

        .desc-block {
            color: #555;
            font-size: 16px;
            line-height: 1.85;
        }

        /* Main Description */
        .main-description {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e8e8e8;
        }

        .main-description p {
            margin: 0;
            text-align: justify;
            color: #666;
            line-height: 1.9;
        }

        /* Subtitle with Icon */
        .desc-subtitle {
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 700;
            color: #28a745;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .desc-subtitle i {
            font-size: 20px;
        }

        /* Lists */
        .desc-list {
            margin: 0 0 0 0;
            padding-left: 0;
            list-style: none;
        }

        .benefits-list li,
        .usage-list li {
            margin-bottom: 12px;
            line-height: 1.8;
            color: #555;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 15px;
        }

        .benefit-icon,
        .usage-icon {
            color: #28a745;
            font-weight: bold;
            font-size: 16px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* Feature Sections */
        .features-section,
        .usage-section {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #f0f0f0;
        }

        .features-section:last-child,
        .usage-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        /* Storage Box */
        .storage-section {
            margin-top: 25px;
        }

        .storage-box {
            background: linear-gradient(135deg, #f0f8f5 0%, #e8f5e9 100%);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }

        .storage-box p {
            margin: 0;
            color: #555;
            line-height: 1.8;
            text-align: justify;
            font-size: 15px;
        }

        /* Additional Info */
        .additional-info-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .specs-content {
            background: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            text-align: left;
        }

        /* Specs Styling */
        .specs-content h3 {
            font-size: 24px;
            font-weight: 700;
            color: #222;
            margin: 30px 0 20px 0;
            padding-bottom: 0;
            border-bottom: none;
            position: relative;
            display: block;
            text-align: left;
        }

        .specs-content h3:first-child {
            margin-top: 0;
        }

        .specs-content h3::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
            border-radius: 2px;
        }

        .specs-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: #28a745;
            margin: 25px 0 12px 0;
            padding: 0;
            background: transparent;
            border-left: none;
            border-radius: 0;
            text-align: left;
        }

        .specs-content > p {
            color: #666;
            font-size: 15px;
            line-height: 1.9;
            margin: 10px 0 10px 0;
            padding: 0;
            background: transparent;
            border-left: none;
            border-radius: 0;
            text-align: left;
        }

        .specs-content > p strong {
            color: #28a745;
            font-weight: 700;
        }

        .specs-content ul {
            list-style: none;
            padding: 0;
            margin: 15px 0 20px 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px;
        }

        .specs-content ul li {
            color: #666;
            font-size: 15px;
            line-height: 1.8;
            padding: 15px 18px;
            position: relative;
            display: block;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 8px;
            border-left: 4px solid #28a745;
            transition: all 0.3s ease;
        }

        .specs-content ul li:hover {
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.1);
            transform: translateY(-2px);
        }

        .specs-content ul li:before {
            content: "✓";
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #28a745;
            font-size: 18px;
            font-weight: bold;
        }

        .specs-content ul li strong {
            color: #28a745;
            font-weight: 700;
            display: block;
            margin-bottom: 5px;
        }

        .specs-content ol {
            padding-left: 0;
            margin: 12px 0 20px 0;
            counter-reset: list-counter;
            list-style: none;
        }

        .specs-content ol li {
            color: #666;
            font-size: 15px;
            line-height: 1.9;
            padding: 10px 15px 10px 50px;
            margin-bottom: 8px;
            background: #f8f9fa;
            border-radius: 4px;
            position: relative;
            counter-increment: list-counter;
        }

        .specs-content ol li:before {
            content: counter(list-counter);
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: #28a745;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
        }

        .specs-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .specs-content table th,
        .specs-content table td {
            padding: 14px 16px;
            text-align: left;
            border: none;
            color: #555;
            font-size: 14px;
        }

        .specs-content table th {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 13px;
        }

        .specs-content table td {
            border-bottom: 1px solid #e8e8e8;
        }

        .specs-content table tr:last-child td {
            border-bottom: none;
        }

        .specs-content table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .specs-content table tr:hover {
            background: rgba(40, 167, 69, 0.05);
        }

        .specs-content blockquote {
            border-left: 4px solid #28a745;
            padding-left: 20px;
            margin: 15px 0;
            color: #666;
            font-style: italic;
            font-size: 15px;
            line-height: 1.8;
            background: rgba(40, 167, 69, 0.05);
            padding: 15px 20px;
            border-radius: 4px;
        }

        .additional-info-box p {
            margin: 10px 0;
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        .additional-info-box p:first-child {
            margin-top: 0;
        }

        .additional-info-box strong {
            color: #28a745;
            font-weight: 600;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tab-btn {
                padding: 12px 15px;
                font-size: 14px;
                gap: 6px;
            }

            .tab-btn i {
                font-size: 16px;
            }

            .tab-content-wrapper {
                padding: 20px;
            }

            .desc-subtitle {
                font-size: 16px;
            }

            .main-description p,
            .storage-box p {
                text-align: left;
                font-size: 14px;
            }

            .additional-info-container h3 {
                font-size: 18px;
            }

            .additional-info-container h4 {
                font-size: 14px;
            }

            .additional-info-container p,
            .additional-info-container li {
                font-size: 14px;
            }

            .additional-info-container table th,
            .additional-info-container table td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>

    <script>
        function showProductDescription() {
            document.getElementById('product-description').style.display = 'block';
            document.getElementById('product-description').classList.add('active');
            document.getElementById('additional-info').style.display = 'none';
            document.getElementById('additional-info').classList.remove('active');
            document.getElementById('btn-description').classList.add('active');
            document.getElementById('btn-additional').classList.remove('active');
        }

        function showAdditionalInfo() {
            document.getElementById('product-description').style.display = 'none';
            document.getElementById('product-description').classList.remove('active');
            document.getElementById('additional-info').style.display = 'block';
            document.getElementById('additional-info').classList.add('active');
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
                                        <h6 class="card-text d-text"><del>₹{{ number_format($related->original_price, 2) }}</del></h6>
                                        <h6 class="card-text r-text">₹{{ number_format($related->sale_price, 2) }}</h6>
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

@endsection
