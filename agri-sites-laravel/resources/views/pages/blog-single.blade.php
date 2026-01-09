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

    @include('partials.newsletter')
    <style>
        .blog-hero-section { position: relative; padding: 5rem 0; overflow: hidden; background-color: #274C5B; }
        .blog-hero-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; }
        .blog-hero-image { position: absolute; width: 100%; height: 100%; background-size: cover; background-position: center; }
        .blog-hero-overlay { position: absolute; width: 100%; height: 100%; background: rgba(39,76,91,0.6); background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 18px 18px; }
        .blog-hero-content { position: relative; z-index: 10; }
        .blog-hero-title { font-size: 2.5rem; font-weight: 800; color: #ffffff; margin-bottom: 1.4rem; line-height: 1.3; }
        .blog-hero-meta { display: flex; align-items: center; gap: 1rem; flex-wrap: wrap; }
        .meta-badge { background: rgba(255,255,255,0.12); color: rgba(255,255,255,0.9); padding: 0.6rem 1.2rem; border-radius: 50px; font-size: 0.9rem; font-weight: 700; border: 1px solid rgba(255,255,255,0.18); display: inline-flex; align-items: center; gap: 0.5rem; }
        .meta-divider { color: rgba(255,255,255,0.28); font-size: 1.5rem; }
        .meta-date, .meta-author { color: rgba(255,255,255,0.75); font-weight: 600; display: flex; align-items: center; gap: 0.5rem; }

        .blog-content-section { padding: 5rem 0; background: #ffffff; }
        .blog-content-row { gap: 3.5rem; }
        .article-body { font-size: 1.05rem; line-height: 2.1; color: #555; margin-bottom: 3.5rem; }
        .article-body p { margin-bottom: 1.5rem; }

        .blog-quote-section { margin: 3rem 0; }
        .blog-quote { background: linear-gradient(135deg, rgba(104,164,127,0.15) 0%, rgba(255,107,107,0.15) 100%); border-left: 5px solid #68A47F; padding: 2rem; border-radius: 8px; margin: 0; }
        .blog-quote i { color: #FFD93D; font-size: 2rem; opacity: 0.5; margin-bottom: 1rem; }
        .blog-quote p { font-size: 1.2rem; font-style: italic; color: #274C5B; margin: 0; font-weight: 600; line-height: 1.8; }

        .topic-guide { background: #f9fbfa; border: 1px solid rgba(104,164,127,0.15); border-radius: 12px; padding: 1.6rem; margin-top: 2rem; }
        .guide-title { color: #274C5B; font-size: 1.3rem; font-weight: 800; margin-bottom: 1rem; }
        .guide-list { margin: 0; padding-left: 1.2rem; color: #555; }
        .guide-list li { margin-bottom: 0.6rem; line-height: 1.8; }
        .guide-faq { margin-top: 1.2rem; }
        .faq-title { color: #274C5B; font-size: 1.1rem; font-weight: 800; margin-bottom: 0.8rem; }
        .faq-item { background: #ffffff; border: 1px solid #eee; border-radius: 10px; padding: 0.9rem 1rem; margin-bottom: 0.7rem; }
        .faq-q { color: #274C5B; font-weight: 700; margin: 0 0 0.4rem 0; }
        .faq-a { color: #666; margin: 0; }

        .article-share { display: flex; align-items: center; gap: 1.5rem; padding-top: 2rem; border-top: 2px solid #eee; margin-top: 3.5rem; }
        .share-label { color: #274C5B; font-weight: 700; }
        .share-buttons { display: flex; gap: 0.8rem; }
        .share-btn { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white; text-decoration: none; font-size: 1.2rem; transition: all 0.3s ease; }
        .share-facebook { background: #3b5998; }
        .share-twitter { background: #1DA1F2; }
        .share-linkedin { background: #0077B5; }
        .share-copy { background: #68A47F; }
        .share-btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }

        .sidebar-widget { background: white; border-radius: 12px; padding: 2rem; margin-bottom: 2.2rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border: 1px solid rgba(104,164,127,0.1); }
        .widget-title { color: #274C5B; font-weight: 800; margin-bottom: 1.5rem; font-size: 1.1rem; position: relative; padding-bottom: 1rem; }
        .widget-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: linear-gradient(90deg, #FF6B6B 0%, #68A47F 100%); }
        .author-card { text-align: center; }
        .author-avatar { width: 80px; height: 80px; background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 2rem; }
        .author-card h5 { color: #274C5B; margin-bottom: 0.8rem; font-weight: 800; }
        .author-card p { color: #666; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1rem; }
        .author-socials { display: flex; justify-content: center; gap: 0.8rem; }
        .author-socials a { width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background: rgba(104,164,127,0.15); border-radius: 50%; color: #68A47F; text-decoration: none; transition: all 0.3s ease; }
        .author-socials a:hover { background: #68A47F; color: white; transform: translateY(-3px); }

        .category-badge-large { background: linear-gradient(135deg, #274C5B 0%, #68A47F 100%); color: white; padding: 1rem; border-radius: 8px; text-align: center; font-weight: 800; font-size: 1rem; }
        /* Category-based gradient styles (softer tones) */
        .meta-badge.cat-default, .category-badge-large.cat-default { background: linear-gradient(135deg, #2B4E5D 0%, #5F8D79 100%); color: #ffffff; border-color: transparent; }
        .meta-badge.cat-farm-produce, .category-badge-large.cat-farm-produce { background: linear-gradient(135deg, #5FAF8A 0%, #97D8B8 100%); color: #ffffff; border-color: transparent; }
        .meta-badge.cat-sustainability, .category-badge-large.cat-sustainability { background: linear-gradient(135deg, #4F9E78 0%, #81C6A7 100%); color: #ffffff; border-color: transparent; }
        .meta-badge.cat-health, .category-badge-large.cat-health { background: linear-gradient(135deg, #D16464 0%, #E89A9A 100%); color: #ffffff; border-color: transparent; }

        .related-post-item { padding-bottom: 1.2rem; margin-bottom: 1.2rem; border-bottom: 1px solid #e0e0e0; transition: all 0.3s ease; }
        .related-post-item:last-child { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
        .related-post-item:hover { padding-left: 0.5rem; }
        .related-post-item h6 { margin: 0 0 0.5rem 0; }
        .related-post-item a { color: #274C5B; text-decoration: none; font-weight: 700; transition: color 0.3s ease; }
        .related-post-item:hover a { color: #68A47F; }
        .related-date { color: #999; font-size: 0.85rem; margin: 0; }

        @media (max-width: 768px) {
            .blog-hero-title { font-size: 2rem; }
            .blog-hero-section { padding: 3.5rem 0; }
            .blog-hero-meta { flex-direction: column; gap: 0.6rem; }
            .blog-content-row { gap: 2.2rem; }
            .article-share { flex-direction: column; align-items: flex-start; }
            .share-buttons { width: 100%; }
        }
    </style>
@endsection
