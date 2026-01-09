@extends('layouts.app')

@section('title', $blog->title)

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row recent-page-main-row" style="background: linear-gradient(135deg, #274C5B 0%, #68A47F 100%);">
                <h1 class="abt-hiro-head">{{ $blog->title }}</h1>
            </div>
        </div>
    </section>

    <section id="blog-detail-section">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Blog Header Info -->
                    <div class="blog-header-info mb-4 pb-4 border-bottom">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2">{{ $blog->category }}</span>
                            <span class="text-muted">
                                <i class="bi bi-calendar-event"></i> 
                                {{ $blog->published_at->format('F d, Y') }}
                            </span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="text-muted">
                                <i class="bi bi-person-fill me-2"></i> 
                                By <strong>{{ $blog->author }}</strong>
                            </span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($blog->image)
                        <div class="blog-featured-image mb-4">
                            <img src="{{ asset('assets/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded" style="max-height: 500px; object-fit: cover; width: 100%;">
                        </div>
                    @endif

                    <!-- Blog Content -->
                    <article class="blog-content">
                        {!! $blog->content !!}
                    </article>

                    <!-- Back to News Link -->
                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('news') }}" class="btn btn-md shop-btn btnefct-2">
                            <i class="bi bi-arrow-left-circle-fill me-2"></i> Back to News
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Posts -->
            <div class="row mt-5 pt-5">
                <div class="col-12">
                    <h3 class="mb-4">More Articles</h3>
                </div>
                @php
                    $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
                        ->where('published_at', '<=', now())
                        ->latest('published_at')
                        ->take(3)
                        ->get();
                @endphp
                @forelse($relatedBlogs as $relatedBlog)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 h-100 shadow-sm" style="transition: all 0.3s ease;">
                            @if($relatedBlog->image)
                                <img src="{{ asset('assets/' . $relatedBlog->image) }}" class="card-img-top" alt="{{ $relatedBlog->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <small class="text-muted d-block mb-2">
                                    {{ $relatedBlog->published_at->format('M d, Y') }} • By {{ $relatedBlog->author }}
                                </small>
                                <h5 class="card-title">{{ Str::limit($relatedBlog->title, 60) }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($relatedBlog->excerpt, 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="btn btn-sm shop-btn w-100">
                                    Read More <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>No related articles found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .blog-content h1, 
        .blog-content h2, 
        .blog-content h3 {
            color: #274C5B;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .blog-content p {
            font-size: 1rem;
            line-height: 1.8;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .blog-content ul, 
        .blog-content ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
            color: #333;
        }

        .blog-content li {
            margin-bottom: 0.8rem;
            line-height: 1.6;
        }

        .blog-content strong {
            color: #274C5B;
            font-weight: 600;
        }

        .card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(104, 164, 127, 0.25) !important;
        }

        .badge {
            padding: 0.5rem 0.75rem;
            font-weight: 500;
        }
    </style>
@endsection
