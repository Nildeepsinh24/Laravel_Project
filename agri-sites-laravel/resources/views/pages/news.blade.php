@extends('layouts.app')

@section('title', 'News & Blog')

@php $asset = asset('assets'); @endphp

@section('content')
    <!-- Hero Section -->
    <section id="news-hero-section" class="news-hero-section">
        <div class="container-fluid p-0">
            <div class="news-hero-wrapper">
                <div class="news-hero-gradient"></div>
                <div class="news-hero-content">
                    <div class="container">
                        <h1 class="news-hero-title">Latest News & Articles</h1>
                        <p class="news-hero-subtitle">Discover insights about organic farming, sustainable agriculture, and healthy living</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section id="news-grid-section" class="news-grid-section py-5">
        <div class="container">
            <div class="row">
                @forelse($blogs as $index => $blog)
                    <div class="col-lg-6 col-md-12 mb-4" data-aos="fade-up" data-aos-duration="{{ 1000 + ($index * 100) }}">
                        <div class="news-card-wrapper">
                            <div class="news-card">
                                <!-- Featured Image -->
                                @if($blog->image)
                                    <div class="news-card-image">
                                        <img src="{{ asset('assets/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
                                        <div class="news-card-overlay"></div>
                                        <span class="news-card-badge">{{ $blog->category }}</span>
                                    </div>
                                @else
                                    <div class="news-card-image-placeholder">
                                        <div class="news-card-overlay"></div>
                                        <span class="news-card-badge">{{ $blog->category }}</span>
                                    </div>
                                @endif

                                <!-- Content -->
                                <div class="news-card-content">
                                    <!-- Date Circle -->
                                    <div class="news-card-date-circle">
                                        <span class="date-day">{{ $blog->published_at->format('d') }}</span>
                                        <span class="date-month">{{ $blog->published_at->format('M') }}</span>
                                    </div>

                                    <!-- Meta Info -->
                                    <div class="news-card-meta">
                                        <span class="meta-item">
                                            <i class="bi bi-person-fill"></i>
                                            {{ $blog->author }}
                                        </span>
                                        <span class="meta-separator">•</span>
                                        <span class="meta-item">
                                            <i class="bi bi-clock"></i>
                                            {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read
                                        </span>
                                    </div>

                                    <!-- Title -->
                                    <h3 class="news-card-title">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="news-card-title-link">
                                            {{ $blog->title }}
                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="news-card-excerpt">{{ $blog->excerpt }}</p>

                                    <!-- Read More Button -->
                                    <div class="news-card-footer">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="news-read-more-btn">
                                            Read More
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-newspaper"></i>
                            <h4>No blog posts available at the moment.</h4>
                            <p class="text-muted">Check back soon for new articles!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        /* Hero Section */
        .news-hero-section {
            position: relative;
            overflow: hidden;
            background: #fff;
        }

        .news-hero-wrapper {
            position: relative;
            height: 350px;
            display: flex;
            align-items: center;
        }

        .news-hero-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 350"><defs><pattern id="dots" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse"><circle cx="40" cy="40" r="25" fill="rgba(255,107,107,0.1)"/><path d="M40,15 Q60,40 40,65 Q20,40 40,15" stroke="rgba(104,164,127,0.1)" stroke-width="2" fill="none"/></pattern></defs><rect width="1200" height="350" fill="%23274C5B"/><rect width="1200" height="350" fill="url(%23dots)"/><rect width="1200" height="350" fill="rgba(104,164,127,0.1)"/></svg>');
            background-size: cover;
            background-position: center;
            z-index: 0;
        }

        .news-hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            color: white;
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

        .news-hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #FFD93D 0%, #FFA500 50%, #FF6B6B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .news-hero-subtitle {
            font-size: 1.15rem;
            opacity: 0.95;
            margin-bottom: 0;
            max-width: 600px;
            line-height: 1.6;
        }

        /* Grid Section */
        .news-grid-section {
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        /* News Card */
        .news-card-wrapper {
            height: 100%;
            perspective: 1000px;
        }

        .news-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            border: 1px solid rgba(104, 164, 127, 0.1);
        }

        .news-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(104, 164, 127, 0.25);
        }

        /* Card Image */
        .news-card-image {
            position: relative;
            height: 280px;
            overflow: hidden;
            background: linear-gradient(135deg, #274C5B 0%, #68A47F 100%);
        }

        .news-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .news-card:hover .news-card-image img {
            transform: scale(1.12) rotate(1deg);
        }

        .news-card-image-placeholder {
            position: relative;
            height: 280px;
            background: linear-gradient(135deg, #FF6B6B 0%, #FFA500 50%, #68A47F 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .news-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(39, 76, 91, 0.15) 0%, rgba(104, 164, 127, 0.2) 100%);
            transition: all 0.4s ease;
            z-index: 1;
        }

        .news-card:hover .news-card-overlay {
            background: linear-gradient(135deg, rgba(39, 76, 91, 0.35) 0%, rgba(104, 164, 127, 0.4) 100%);
        }

        /* Badge */
        .news-card-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.95), rgba(255, 165, 0, 0.85));
            color: white;
            padding: 0.7rem 1.4rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 5;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        /* Card Content */
        .news-card-content {
            padding: 2.5rem 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Date Circle */
        .news-card-date-circle {
            position: absolute;
            top: -40px;
            left: 2rem;
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #FF6B6B 0%, #FFA500 100%);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
            border: 5px solid white;
            z-index: 3;
            animation: float 3.5s ease-in-out infinite;
            font-weight: 800;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-12px);
            }
        }

        .date-day {
            font-size: 2rem;
            line-height: 1;
        }

        .date-month {
            font-size: 0.9rem;
            margin-top: 0.2rem;
            opacity: 0.95;
            letter-spacing: 1px;
        }

        /* Meta Info */
        .news-card-meta {
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.9rem;
            color: #999;
            flex-wrap: wrap;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
        }

        .meta-item:hover {
            background: rgba(104, 164, 127, 0.1);
            color: #68A47F;
        }

        .meta-item i {
            color: #FF6B6B;
            font-size: 1rem;
        }

        .meta-separator {
            opacity: 0.4;
        }

        /* Title */
        .news-card-title {
            margin: 0 0 1.2rem 0;
            color: #274C5B;
            font-size: 1.35rem;
            font-weight: 800;
            line-height: 1.4;
            min-height: 3.5rem;
        }

        .news-card-title-link {
            color: #274C5B;
            text-decoration: none;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #FF6B6B 0%, #68A47F 100%);
            background-size: 200% 200%;
            background-position: left;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .news-card-title-link:hover {
            background-position: right;
        }

        /* Excerpt */
        .news-card-excerpt {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Footer */
        .news-card-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 2px solid rgba(104, 164, 127, 0.15);
        }

        .news-read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            color: white;
            text-decoration: none;
            font-weight: 800;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: linear-gradient(135deg, #68A47F 0%, #5a916d 100%);
            padding: 0.7rem 1.4rem;
            border-radius: 8px;
            width: fit-content;
        }

        .news-read-more-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
            border-radius: 8px;
            z-index: 0;
        }

        .news-read-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(104, 164, 127, 0.3);
            gap: 1rem;
        }

        .news-read-more-btn:hover::before {
            left: 100%;
        }

        .news-read-more-btn i {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .news-read-more-btn:hover i {
            transform: translateX(4px);
        }

        .news-read-more-btn span {
            position: relative;
            z-index: 1;
        }

        /* Empty State */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 5rem;
            background: linear-gradient(135deg, #FF6B6B 0%, #68A47F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .empty-state h4 {
            color: #274C5B;
            font-weight: 800;
            margin-bottom: 0.7rem;
            font-size: 1.4rem;
        }

        .empty-state p {
            color: #999;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-hero-title {
                font-size: 2.5rem;
            }

            .news-hero-subtitle {
                font-size: 1rem;
            }

            .news-hero-wrapper {
                height: 280px;
            }

            .news-card-date-circle {
                width: 75px;
                height: 75px;
                left: 1.5rem;
                top: -30px;
            }

            .date-day {
                font-size: 1.6rem;
            }

            .date-month {
                font-size: 0.8rem;
            }

            .news-card-content {
                padding: 2rem 1.5rem 1.5rem 1.5rem;
            }

            .news-card-title {
                font-size: 1.15rem;
                min-height: auto;
            }

            .news-card-image {
                height: 220px;
            }

            .news-card:hover {
                transform: translateY(-10px);
            }

            .news-read-more-btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.85rem;
            }
        }
    </style>
@endsection
