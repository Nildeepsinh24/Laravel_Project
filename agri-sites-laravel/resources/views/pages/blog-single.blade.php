@extends('layouts.app')

@section('title', $blog->title)

@php
    $asset = asset('assets');
    $catKey = strtolower(trim($blog->category ?? ''));
    $categoryClassMap = [
        'farm produce' => 'cat-farm-produce',
        'sustainability' => 'cat-sustainability',
        'health' => 'cat-health',
    ];
    $catClass = $categoryClassMap[$catKey] ?? 'cat-default';

    $topicHighlights = [
        'farm produce' => [
            'title' => 'Farm Produce Highlights',
            'points' => [
                'Prioritize seasonal varieties for peak flavor and nutrient density.',
                'Adopt organic practices: composting, integrated pest management, minimal synthetic inputs.',
                'Post-harvest handling: cool chain, gentle washing, and breathable packaging maintain freshness.',
                'Certifications (organic, fair trade) build trust and justify premium pricing.',
                'Local distribution and CSA models reduce waste and strengthen community ties.',
            ],
            'faq' => [
                ['q' => 'How do I identify truly organic produce?', 'a' => 'Look for credible certification labels and transparent farm practices.'],
                ['q' => 'What storage method keeps leafy greens fresh?', 'a' => 'Rinse, dry thoroughly, and store in breathable bags with a paper towel.'],
            ],
        ],
        'sustainability' => [
            'title' => 'Sustainability Highlights',
            'points' => [
                'Soil health first: cover crops, reduced tillage, and diverse rotations.',
                'Water stewardship: drip irrigation, mulching, and rainwater harvesting.',
                'Biodiversity boosts resilience: hedgerows, pollinator habitats, and agroforestry.',
                'Carbon-smart farming: composting, biochar, and perennial systems sequester CO₂.',
                'Measure and improve: audits, lifecycle assessments, and traceable supply chains.',
            ],
            'faq' => [
                ['q' => 'What is the fastest way to improve soil?', 'a' => 'Use cover crops and compost consistently across seasons.'],
                ['q' => 'How can small farms reduce water usage?', 'a' => 'Switch to drip systems and mulch heavily to retain moisture.'],
            ],
        ],
        'health' => [
            'title' => 'Health & Nutrition Highlights',
            'points' => [
                'Fresh produce delivers vitamins, minerals, and fiber essential for wellness.',
                'Food safety: proper washing, clean prep surfaces, and cold-chain integrity.',
                'Diet diversity: mix colors and types to broaden micronutrient intake.',
                'Minimize ultra-processed foods; favor whole, minimally handled ingredients.',
                'Clear labeling helps track allergens and nutritional needs.',
            ],
            'faq' => [
                ['q' => 'Do organic foods have more nutrients?', 'a' => 'Nutrient levels vary; organic reduces synthetic residues and supports ecosystems.'],
                ['q' => 'How should I wash produce safely?', 'a' => 'Use clean water; avoid soaps. For firm items, gentle brushing helps.'],
            ],
        ],
    ];
    $guide = $topicHighlights[$catKey] ?? [
        'title' => 'Topic Highlights',
        'points' => [
            'Focus on practical steps and measurable outcomes.',
            'Use locally appropriate methods and adapt seasonally.',
            'Document practices for transparency and continuous improvement.',
        ],
        'faq' => [],
    ];
@endphp

@section('content')
    <!-- Hero Section -->
    <section class="blog-hero-section">
        <div class="blog-hero-bg">
            @if($blog->image)
                <div class="blog-hero-image" style="background-image: url('{{ asset('assets/' . $blog->image) }}');"></div>
            @endif
            <div class="blog-hero-overlay"></div>
        </div>
        <div class="blog-hero-content">
            <div class="container">
                <h1 class="blog-hero-title">{{ $blog->title }}</h1>
                <div class="blog-hero-meta">
                    <span class="meta-badge {{ $catClass }}"><i class="bi bi-tag-fill"></i> {{ $blog->category }}</span>
                    <span class="meta-divider">•</span>
                    <span class="meta-date"><i class="bi bi-calendar-event"></i> {{ $blog->published_at->format('F d, Y') }}</span>
                    <span class="meta-divider">•</span>
                    <span class="meta-author"><i class="bi bi-person-circle"></i> {{ $blog->author }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="blog-content-section">
        <div class="container">
            <div class="row blog-content-row">
                <div class="col-lg-8">
                    <article class="blog-article">
                        <div class="article-body">{!! nl2br(e(strip_tags($blog->content))) !!}</div>
                        @if($blog->excerpt)
                        <div class="blog-quote-section">
                            <blockquote class="blog-quote"><i class="bi bi-quote"></i><p>{{ $blog->excerpt }}</p></blockquote>
                        </div>
                        @endif

                        <!-- Topic-aware highlights for better, relevant content -->
                        <section class="topic-guide">
                            <h3 class="guide-title">{{ $guide['title'] }}</h3>
                            <ul class="guide-list">
                                @foreach(($guide['points'] ?? []) as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                            @if(!empty($guide['faq']))
                            <div class="guide-faq">
                                <h4 class="faq-title">Quick FAQs</h4>
                                @foreach($guide['faq'] as $faq)
                                    <div class="faq-item">
                                        <p class="faq-q"><i class="bi bi-question-circle"></i> {{ $faq['q'] }}</p>
                                        <p class="faq-a"><i class="bi bi-info-circle"></i> {{ $faq['a'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </section>

                        <div class="article-share">
                            <span class="share-label">Share this article:</span>
                            <div class="share-buttons">
                                <a href="#" class="share-btn share-facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="share-btn share-twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="share-btn share-linkedin"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="share-btn share-copy"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget author-widget">
                        <h4 class="widget-title">About Author</h4>
                        <div class="author-card">
                            <div class="author-avatar"><i class="bi bi-person-fill"></i></div>
                            <h5>{{ $blog->author }}</h5>
                            <p>Agricultural expert and passionate writer sharing insights about organic farming and sustainable agriculture practices.</p>
                            <div class="author-socials"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-twitter"></i></a><a href="#"><i class="bi bi-instagram"></i></a></div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Category</h4>
                        <div class="category-badge-large {{ $catClass }}">{{ $blog->category }}</div>
                    </div>
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Related Articles</h4>
                        <div class="related-posts">
                            @forelse($relatedBlogs as $related)
                            <div class="related-post-item">
                                <h6><a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a></h6>
                                <p class="related-date"><i class="bi bi-calendar"></i> {{ $related->published_at->format('M d, Y') }}</p>
                            </div>
                            @empty
                            <p class="text-muted" style="text-align: center; padding: 1rem 0;">No related articles found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* ===== Hero Section ===== */
        .blog-hero-section {
            position: relative;
            padding: 6rem 0;
            overflow: hidden;
            background-color: #274C5B;
            margin-bottom: 4rem;
        }

        .blog-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .blog-hero-image {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            animation: zoomIn 8s ease-out infinite;
        }

        @keyframes zoomIn {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        .blog-hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(39, 76, 91, 0.5) 0%, rgba(104, 164, 127, 0.3) 100%);
            backdrop-filter: blur(2px);
        }

        .blog-hero-content {
            position: relative;
            z-index: 10;
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog-hero-title {
            font-size: 3rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.5px;
        }

        .blog-hero-meta {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .meta-badge {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.85), rgba(255, 165, 0, 0.75));
            color: white;
            padding: 0.7rem 1.4rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
            transition: all 0.3s ease;
        }

        .meta-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
        }

        .meta-divider {
            color: rgba(255, 255, 255, 0.4);
            font-size: 1.5rem;
        }

        .meta-date,
        .meta-author {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.95rem;
        }

        /* ===== Content Section ===== */
        .blog-content-section {
            padding: 3rem 0 5rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        }

        .blog-content-row {
            gap: 3.5rem;
            align-items: flex-start;
        }

        /* ===== Article ===== */
        .blog-article {
            background: white;
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(104, 164, 127, 0.1);
        }

        .article-body {
            font-size: 1.1rem;
            line-height: 1.95;
            color: #555;
            margin-bottom: 3rem;
            font-family: "Georgia", serif;
        }

        .article-body p {
            margin-bottom: 1.8rem;
            text-align: justify;
        }

        /* ===== Quote Section ===== */
        .blog-quote-section {
            margin: 3.5rem 0;
            padding: 0;
        }

        .blog-quote {
            background: linear-gradient(135deg, rgba(104, 164, 127, 0.1) 0%, rgba(255, 107, 107, 0.08) 100%);
            border-left: 6px solid #FF6B6B;
            border-radius: 12px;
            padding: 2.5rem;
            margin: 0;
            position: relative;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.1);
        }

        .blog-quote i {
            color: #FFD93D;
            font-size: 2.5rem;
            opacity: 0.4;
            margin-bottom: 1rem;
            display: block;
        }

        .blog-quote p {
            font-size: 1.25rem;
            font-style: italic;
            color: #274C5B;
            margin: 0;
            font-weight: 700;
            line-height: 1.8;
            font-family: "Georgia", serif;
        }

        /* ===== Topic Guide ===== */
        .topic-guide {
            background: linear-gradient(135deg, #f9fbfa 0%, #f0f6f4 100%);
            border: 2px solid rgba(104, 164, 127, 0.2);
            border-radius: 14px;
            padding: 2.5rem;
            margin-top: 3rem;
        }

        .guide-title {
            color: #274C5B;
            font-size: 1.4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .guide-title::before {
            content: '';
            width: 5px;
            height: 30px;
            background: linear-gradient(180deg, #FF6B6B 0%, #68A47F 100%);
            border-radius: 3px;
        }

        .guide-list {
            margin: 0;
            padding-left: 1.5rem;
            color: #555;
            list-style: none;
        }

        .guide-list li {
            margin-bottom: 0.9rem;
            line-height: 1.9;
            position: relative;
            padding-left: 1.5rem;
            font-size: 1rem;
        }

        .guide-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #68A47F;
            font-weight: 900;
            font-size: 1.2rem;
        }

        /* ===== FAQ ===== */
        .guide-faq {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid rgba(104, 164, 127, 0.2);
        }

        .faq-title {
            color: #274C5B;
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .faq-item {
            background: white;
            border: 2px solid rgba(104, 164, 127, 0.15);
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #68A47F;
            box-shadow: 0 4px 12px rgba(104, 164, 127, 0.15);
            transform: translateX(5px);
        }

        .faq-q {
            color: #274C5B;
            font-weight: 800;
            margin: 0 0 0.6rem 0;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .faq-q i {
            color: #FF6B6B;
            font-size: 1.1rem;
        }

        .faq-a {
            color: #666;
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.7;
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
        }

        .faq-a i {
            color: #68A47F;
            font-size: 1rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* ===== Share Section ===== */
        .article-share {
            display: flex;
            align-items: center;
            gap: 2rem;
            padding-top: 2.5rem;
            border-top: 2px solid rgba(104, 164, 127, 0.2);
            margin-top: 3.5rem;
            flex-wrap: wrap;
        }

        .share-label {
            color: #274C5B;
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 700;
            position: relative;
            overflow: hidden;
        }

        .share-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .share-btn:hover::before {
            left: 100%;
        }

        .share-facebook {
            background: linear-gradient(135deg, #3b5998 0%, #2d4373 100%);
        }

        .share-twitter {
            background: linear-gradient(135deg, #1DA1F2 0%, #1a8cd8 100%);
        }

        .share-linkedin {
            background: linear-gradient(135deg, #0077B5 0%, #005885 100%);
        }

        .share-copy {
            background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%);
        }

        .share-btn:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .share-btn i {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .share-btn:hover i {
            transform: scale(1.15);
        }

        /* ===== Sidebar ===== */
        .sidebar-widget {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(104, 164, 127, 0.15);
            position: sticky;
            top: 20px;
            transition: all 0.3s ease;
        }

        .sidebar-widget:hover {
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .widget-title {
            color: #274C5B;
            font-weight: 900;
            margin-bottom: 1.5rem;
            font-size: 1.15rem;
            position: relative;
            padding-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B 0%, #68A47F 100%);
            border-radius: 2px;
        }

        /* ===== Author Card ===== */
        .author-card {
            text-align: center;
        }

        .author-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #FF6B6B 0%, #68A47F 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 8px 20px rgba(104, 164, 127, 0.25);
            animation: float 3.5s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .author-card h5 {
            color: #274C5B;
            margin-bottom: 0.8rem;
            font-weight: 900;
            font-size: 1.1rem;
        }

        .author-card p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 1.2rem;
        }

        .author-socials {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
        }

        .author-socials a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(104, 164, 127, 0.1), rgba(255, 107, 107, 0.1));
            border-radius: 50%;
            color: #68A47F;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(104, 164, 127, 0.2);
            font-size: 1.1rem;
        }

        .author-socials a:hover {
            background: linear-gradient(135deg, #68A47F, #FF6B6B);
            color: white;
            transform: translateY(-5px);
            border-color: transparent;
            box-shadow: 0 8px 20px rgba(104, 164, 127, 0.3);
        }

        /* ===== Category Badge ===== */
        .category-badge-large {
            background: linear-gradient(135deg, #274C5B 0%, #68A47F 100%);
            color: white;
            padding: 1.2rem;
            border-radius: 12px;
            text-align: center;
            font-weight: 900;
            font-size: 1.05rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 20px rgba(104, 164, 127, 0.25);
        }

        .category-badge-large.cat-farm-produce {
            background: linear-gradient(135deg, #5FAF8A 0%, #97D8B8 100%);
        }

        .category-badge-large.cat-sustainability {
            background: linear-gradient(135deg, #4F9E78 0%, #81C6A7 100%);
        }

        .category-badge-large.cat-health {
            background: linear-gradient(135deg, #D16464 0%, #E89A9A 100%);
        }

        /* ===== Related Posts ===== */
        .related-posts {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .related-post-item {
            padding-bottom: 1.3rem;
            margin-bottom: 1.3rem;
            border-bottom: 2px solid rgba(104, 164, 127, 0.15);
            transition: all 0.3s ease;
        }

        .related-post-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .related-post-item:hover {
            padding-left: 0.7rem;
        }

        .related-post-item h6 {
            margin: 0 0 0.6rem 0;
            font-size: 0.95rem;
        }

        .related-post-item a {
            color: #274C5B;
            text-decoration: none;
            font-weight: 800;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .related-post-item:hover a {
            color: #FF6B6B;
            transform: translateX(4px);
        }

        .related-date {
            color: #999;
            font-size: 0.85rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .related-date i {
            color: #FF6B6B;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .blog-hero-section {
                padding: 4rem 0 3rem 0;
            }

            .blog-hero-title {
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .blog-hero-meta {
                gap: 0.8rem;
                flex-direction: column;
                align-items: flex-start;
            }

            .blog-article {
                padding: 2rem;
            }

            .article-body {
                font-size: 1rem;
                line-height: 1.8;
            }

            .blog-content-row {
                gap: 2rem;
            }

            .article-share {
                gap: 1rem;
                flex-direction: column;
            }

            .share-buttons {
                width: 100%;
                justify-content: flex-start;
            }

            .sidebar-widget {
                position: static;
                margin-bottom: 2rem;
            }

            .topic-guide {
                padding: 1.5rem;
            }

            .guide-title {
                font-size: 1.2rem;
            }

            .blog-quote {
                padding: 1.5rem;
            }

            .blog-quote p {
                font-size: 1.1rem;
            }
        }
    </style>
@endsection
