@extends('layouts.app')

@section('title', $blog->title)

@php $asset = asset('assets'); @endphp

@section('content')
    <!-- Hero Section -->
    <section id="blog-hero-section" class="blog-hero-section">
        <div class="container-fluid p-0">
            <div class="blog-hero-wrapper">
                @if($blog->image)
                    <div class="blog-hero-image" style="background-image: url('{{ asset('assets/' . $blog->image) }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
                        <div class="blog-hero-overlay"></div>
                    </div>
                @else
                    <div class="blog-hero-gradient"></div>
                @endif
                <div class="blog-hero-content">
                    <div class="container">
                        <div class="blog-hero-text">
                            <div class="blog-badge-group mb-3">
                                <span class="blog-badge bg-success">{{ $blog->category }}</span>
                            </div>
                            <h1 class="blog-hero-title">{{ $blog->title }}</h1>
                            <div class="blog-hero-meta">
                                <span class="blog-meta-item">
                                    <i class="bi bi-calendar3"></i> {{ $blog->published_at->format('F d, Y') }}
                                </span>
                                <span class="blog-meta-separator">•</span>
                                <span class="blog-meta-item">
                                    <i class="bi bi-person-circle"></i> {{ $blog->author }}
                                </span>
                                <span class="blog-meta-separator">•</span>
                                <span class="blog-meta-item">
                                    <i class="bi bi-clock"></i> <span class="read-time">{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section id="blog-main-section" class="blog-main-section py-5">
        <div class="container">
            <div class="row">
                <!-- Article Content -->
                <div class="col-lg-8">
                    <article class="blog-article">
                        <div class="blog-content-wrapper">
                            {!! $blog->content !!}
                        </div>

                        <!-- Share & Navigation -->
                        <div class="blog-footer-nav">
                            <div class="blog-share-section">
                                <h6 class="share-title">Share this article:</h6>
                                <div class="share-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-facebook" title="Share on Facebook">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="share-btn share-twitter" title="Share on Twitter">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-linkedin" title="Share on LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    <a href="mailto:?subject={{ urlencode($blog->title) }}&body={{ urlencode(request()->url()) }}" class="share-btn share-email" title="Share via Email">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                </div>
                            </div>

                            <a href="{{ route('news') }}" class="btn btn-back-link">
                                <i class="bi bi-arrow-left"></i> Back to News
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- About Author -->
                    <div class="blog-sidebar-widget">
                        <div class="widget-header">
                            <h5>About the Author</h5>
                        </div>
                        <div class="widget-content author-card">
                            <div class="author-avatar">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h6 class="author-name">{{ $blog->author }}</h6>
                            <p class="author-bio">Agriculture enthusiast and content creator dedicated to sharing knowledge about organic farming and sustainable practices.</p>
                        </div>
                    </div>

                    <!-- Article Info -->
                    <div class="blog-sidebar-widget">
                        <div class="widget-header">
                            <h5>Article Information</h5>
                        </div>
                        <div class="widget-content info-list">
                            <div class="info-item">
                                <span class="info-label"><i class="bi bi-calendar-event"></i> Published</span>
                                <span class="info-value">{{ $blog->published_at->format('M d, Y') }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="bi bi-tag"></i> Category</span>
                                <span class="info-value badge-inline">{{ $blog->category }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="bi bi-clock"></i> Read Time</span>
                                <span class="info-value">{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} minutes</span>
                            </div>
                        </div>
                    </div>

                    <!-- Table of Contents -->
                    <div class="blog-sidebar-widget">
                        <div class="widget-header">
                            <h5>Topics Covered</h5>
                        </div>
                        <div class="widget-content">
                            <ul class="toc-list">
                                @foreach(explode("\n", $blog->content) as $line)
                                    @if(str_contains($line, '<h2') || str_contains($line, '<h3'))
                                        <li><a href="#" class="toc-link">{{ strip_tags($line) }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    @php
        $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();
    @endphp

    @if($relatedBlogs->count() > 0)
    <section id="related-posts-section" class="related-posts-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">More Articles You Might Like</h2>
                <p class="section-subtitle">Continue reading our blog for more insights</p>
            </div>

            <div class="row">
                @foreach($relatedBlogs as $relatedBlog)
                    <div class="col-md-4 mb-4">
                        <div class="blog-card">
                            @if($relatedBlog->image)
                                <div class="blog-card-image">
                                    <img src="{{ asset('assets/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}" class="img-fluid">
                                    <div class="blog-card-overlay"></div>
                                    <span class="blog-card-category">{{ $relatedBlog->category }}</span>
                                </div>
                            @endif
                            <div class="blog-card-content">
                                <small class="blog-card-date">{{ $relatedBlog->published_at->format('M d, Y') }}</small>
                                <h5 class="blog-card-title">{{ $relatedBlog->title }}</h5>
                                <p class="blog-card-excerpt">{{ $relatedBlog->excerpt }}</p>
                                <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="blog-card-link">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <style>
        /* Hero Section */
        .blog-hero-section {
            position: relative;
            overflow: hidden;
        }

        .blog-hero-wrapper {
            position: relative;
            height: 400px;
            display: flex;
            align-items: flex-end;
        }

        .blog-hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .blog-hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(39, 76, 91, 0.2) 0%, rgba(39, 76, 91, 0.85) 100%);
        }

        .blog-hero-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #274C5B 0%, #68A47F 100%);
            z-index: 0;
        }

        .blog-hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            padding: 3rem 0;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog-hero-text {
            color: white;
            position: relative;
        }

        .blog-badge-group {
            display: flex;
            gap: 0.5rem;
            animation: slideUp 0.8s ease-out 0.1s both;
        }

        .blog-badge {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.15) !important;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .blog-badge:hover {
            background: rgba(255, 255, 255, 0.25) !important;
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .blog-badge.bg-success {
            background: linear-gradient(135deg, rgba(104, 164, 127, 0.9), rgba(104, 164, 127, 0.7)) !important;
            border-color: rgba(255, 255, 255, 0.4);
        }

        .blog-hero-title {
            font-size: 3.8rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            animation: slideUp 0.8s ease-out 0.2s both, titleColorShift 4s ease-in-out infinite 0.8s;
            letter-spacing: -1px;
            word-spacing: 0.15em;
            position: relative;
            display: inline-block;
            width: 100%;
            
            /* Vibrant multi-color gradient effect */
            background: linear-gradient(
                90deg,
                #FF6B6B 0%,
                #FFA500 15%,
                #FFD93D 30%,
                #68A47F 45%,
                #4ECDC4 60%,
                #45B7D1 75%,
                #FF6B6B 100%
            );
            background-size: 200% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            
            /* Multiple vibrant shadows for depth */
            filter: drop-shadow(0 10px 20px rgba(104, 164, 127, 0.35)) 
                    drop-shadow(0 4px 8px rgba(78, 205, 196, 0.25));
        }

        @keyframes titleColorShift {
            0%, 100% {
                background-position: 0% 0%;
                filter: drop-shadow(0 10px 20px rgba(104, 164, 127, 0.35)) 
                        drop-shadow(0 4px 8px rgba(78, 205, 196, 0.25));
            }
            25% {
                background-position: 50% 0%;
                filter: drop-shadow(0 12px 24px rgba(255, 107, 107, 0.35)) 
                        drop-shadow(0 6px 12px rgba(255, 165, 0, 0.25));
            }
            50% {
                background-position: 100% 0%;
                filter: drop-shadow(0 14px 28px rgba(78, 205, 196, 0.4)) 
                        drop-shadow(0 8px 16px rgba(69, 183, 209, 0.3));
            }
            75% {
                background-position: 50% 0%;
                filter: drop-shadow(0 12px 24px rgba(104, 164, 127, 0.35)) 
                        drop-shadow(0 6px 12px rgba(255, 217, 61, 0.25));
            }
        }

        .blog-hero-title::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 150px;
            height: 6px;
            background: linear-gradient(90deg, 
                #FF6B6B 0%,
                #FFA500 25%,
                #68A47F 50%,
                #4ECDC4 75%,
                #45B7D1 100%);
            border-radius: 3px;
            box-shadow: 0 6px 16px rgba(255, 107, 107, 0.5),
                        0 2px 8px rgba(78, 205, 196, 0.4);
            animation: expandLine 1s ease-out 1s both, colorPulse 4s ease-in-out infinite 2s;
        }

        @keyframes expandLine {
            from {
                width: 0;
                opacity: 0;
            }
            to {
                width: 150px;
                opacity: 1;
            }
        }

        @keyframes colorPulse {
            0%, 100% {
                box-shadow: 0 6px 16px rgba(255, 107, 107, 0.5),
                            0 2px 8px rgba(78, 205, 196, 0.4);
            }
            50% {
                box-shadow: 0 10px 24px rgba(255, 165, 0, 0.6),
                            0 4px 12px rgba(69, 183, 209, 0.5);
            }
        }

        .blog-hero-title::after {
            content: "";
            position: absolute;
            top: -10px;
            right: -10px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, 
                rgba(255, 107, 107, 0.2) 0%,
                rgba(78, 205, 196, 0.15) 50%,
                transparent 100%);
            border-radius: 50%;
            pointer-events: none;
            animation: floatOrb 6s ease-in-out infinite;
            box-shadow: inset 0 0 30px rgba(104, 164, 127, 0.15);
        }

        @keyframes floatOrb {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(-25px, -25px) scale(1.1);
            }
        }

        .blog-hero-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            font-size: 1.1rem;
            opacity: 1;
            animation: slideUp 0.8s ease-out 0.3s both;
            flex-wrap: wrap;
        }

        .blog-meta-item {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.8rem 1.4rem;
            border-radius: 30px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            position: relative;
            overflow: hidden;
            
            /* Gradient background with multiple colors */
            background: linear-gradient(135deg, 
                rgba(255, 107, 107, 0.15) 0%,
                rgba(255, 165, 0, 0.15) 25%,
                rgba(104, 164, 127, 0.15) 50%,
                rgba(78, 205, 196, 0.15) 75%,
                rgba(69, 183, 209, 0.15) 100%);
            background-size: 200% 200%;
            animation: bgShift 6s ease-in-out infinite;
            
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15),
                        inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        @keyframes bgShift {
            0%, 100% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
        }

        .blog-meta-item:hover {
            background: linear-gradient(135deg, 
                rgba(255, 107, 107, 0.25) 0%,
                rgba(255, 165, 0, 0.25) 25%,
                rgba(104, 164, 127, 0.25) 50%,
                rgba(78, 205, 196, 0.25) 75%,
                rgba(69, 183, 209, 0.25) 100%);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25),
                        inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .blog-meta-item i {
            font-size: 1.4rem;
            background: linear-gradient(135deg, 
                #FF6B6B 0%,
                #FFA500 25%,
                #68A47F 50%,
                #4ECDC4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: iconBounce 2s ease-in-out infinite;
            filter: drop-shadow(0 2px 4px rgba(104, 164, 127, 0.3));
        }

        @keyframes iconBounce {
            0%, 100% {
                transform: translateY(0px);
                filter: drop-shadow(0 2px 4px rgba(104, 164, 127, 0.3));
            }
            50% {
                transform: translateY(-3px);
                filter: drop-shadow(0 6px 12px rgba(78, 205, 196, 0.4));
            }
        }

        .read-time {
            background: linear-gradient(135deg, 
                #FFA500 0%,
                #FFD93D 50%,
                #68A47F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .blog-meta-separator {
            margin: 0;
            opacity: 0.5;
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.3rem;
            animation: separatorPulse 3s ease-in-out infinite;
        }

        @keyframes separatorPulse {
            0%, 100% {
                opacity: 0.4;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.2);
            }
        }

        /* Main Section */
        .blog-main-section {
            background-color: #fff;
        }

        /* Article */
        .blog-article {
            background: white;
        }

        .blog-content-wrapper {
            margin-bottom: 3rem;
            padding: 2rem;
            background: #fafafa;
            border-radius: 12px;
            border-left: 4px solid #68A47F;
        }

        /* Content Styling */
        .blog-content-wrapper h1, 
        .blog-content-wrapper h2, 
        .blog-content-wrapper h3 {
            color: #274C5B;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .blog-content-wrapper h1 {
            font-size: 2rem;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 1rem;
        }

        .blog-content-wrapper h2 {
            font-size: 1.75rem;
        }

        .blog-content-wrapper h3 {
            font-size: 1.4rem;
        }

        .blog-content-wrapper h4 {
            font-size: 1.2rem;
            color: #274C5B;
            font-weight: 600;
        }

        .blog-content-wrapper p {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #444;
            margin-bottom: 1.5rem;
        }

        .blog-content-wrapper ul, 
        .blog-content-wrapper ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
            color: #444;
        }

        .blog-content-wrapper li {
            margin-bottom: 0.8rem;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .blog-content-wrapper strong {
            color: #274C5B;
            font-weight: 700;
        }

        .blog-content-wrapper em {
            font-style: italic;
            color: #68A47F;
        }

        .blog-content-wrapper blockquote {
            border-left: 4px solid #68A47F;
            padding-left: 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #666;
            font-size: 1.1rem;
        }

        .blog-content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 2rem 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Footer Navigation */
        .blog-footer-nav {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .blog-share-section {
            flex: 1;
        }

        .share-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #274C5B;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .share-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .share-facebook {
            background-color: #3b5998;
        }

        .share-facebook:hover {
            background-color: #2d4373;
            transform: translateY(-3px);
        }

        .share-twitter {
            background-color: #1DA1F2;
        }

        .share-twitter:hover {
            background-color: #1a91da;
            transform: translateY(-3px);
        }

        .share-linkedin {
            background-color: #0077b5;
        }

        .share-linkedin:hover {
            background-color: #005a87;
            transform: translateY(-3px);
        }

        .share-email {
            background-color: #68A47F;
        }

        .share-email:hover {
            background-color: #5a916d;
            transform: translateY(-3px);
        }

        .btn-back-link {
            color: #274C5B;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 2px solid #274C5B;
            border-radius: 6px;
        }

        .btn-back-link:hover {
            background-color: #274C5B;
            color: white;
            transform: translateX(-3px);
        }

        /* Sidebar */
        .blog-sidebar-widget {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-top: 3px solid #68A47F;
            transition: all 0.3s ease;
        }

        .blog-sidebar-widget:hover {
            box-shadow: 0 6px 16px rgba(39, 76, 91, 0.12);
        }

        .widget-header h5 {
            color: #274C5B;
            font-weight: 700;
            margin: 0;
            font-size: 1.2rem;
        }

        .author-card {
            text-align: center;
            padding-top: 1rem;
        }

        .author-avatar {
            font-size: 4rem;
            color: #68A47F;
            margin-bottom: 1rem;
        }

        .author-name {
            color: #274C5B;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
        }

        .author-bio {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        .info-list {
            padding: 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-label i {
            color: #68A47F;
        }

        .info-value {
            color: #274C5B;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .badge-inline {
            display: inline-block;
            background-color: #68A47F;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .toc-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .toc-list li {
            margin-bottom: 0.5rem;
        }

        .toc-link {
            color: #68A47F;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .toc-link::before {
            content: "→";
            color: #68A47F;
        }

        .toc-link:hover {
            color: #274C5B;
            padding-left: 0.5rem;
        }

        /* Related Posts Section */
        .related-posts-section {
            background-color: #f9f9f9;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-title {
            color: #274C5B;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .blog-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(104, 164, 127, 0.25);
        }

        .blog-card-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-card:hover .blog-card-image img {
            transform: scale(1.05);
        }

        .blog-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(39, 76, 91, 0.1);
        }

        .blog-card-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #68A47F;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            z-index: 2;
        }

        .blog-card-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-card-date {
            color: #999;
            font-size: 0.85rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .blog-card-title {
            color: #274C5B;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .blog-card:hover .blog-card-title {
            color: #68A47F;
        }

        .blog-card-excerpt {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .blog-card-link {
            color: #68A47F;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .blog-card-link:hover {
            color: #274C5B;
            gap: 0.8rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .blog-hero-title {
                font-size: 2rem;
            }

            .blog-hero-meta {
                font-size: 0.9rem;
                flex-wrap: wrap;
            }

            .blog-content-wrapper {
                padding: 1.5rem;
            }

            .blog-footer-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .blog-content-wrapper h1 {
                font-size: 1.5rem;
            }

            .blog-content-wrapper h2 {
                font-size: 1.3rem;
            }
        }
    </style>
@endsection
