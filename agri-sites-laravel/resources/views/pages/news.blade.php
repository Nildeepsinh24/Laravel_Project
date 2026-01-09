@extends('layouts.app')

@section('title', 'News & Blog')

@php $asset = asset('assets'); @endphp

@section('content')
    <section id="about-hiro-section">
        <div class="container-fluid p-0">
            <div class="row recent-page-main-row">
                <h1 class="abt-hiro-head">Latest News & Articles</h1>
            </div>
        </div>
    </section>

    <section id="section-8-main">
        <div class="container recent-main-pagemndv mt-5">
            <div class="container section-8-cntrn">
                <div class="row s8-main-row">
                    @forelse($blogs as $index => $blog)
                        <div class="col-md-6 {{ $index % 2 == 0 ? 's8-cl-hf-one' : 's8-cl-hf-two' }} {{ $index >= 2 ? 'rcnt-mt-clm' : '' }}" data-aos="fade-up" data-aos-duration="{{ 1000 + ($index * 100) }}">
                            <div class="s8-bg-{{ $index % 2 == 0 ? 'first' : 'sec' }}{{ $index >= 2 ? ($index % 2 == 0 ? '-rcnt-one' : '-rcnt-two') : '' }}">
                                <div class="crcl-s8cnont">
                                    <p class="bg-s8-count">{{ $blog->published_at->format('d') }}</p>
                                    <p class="bg-s8-count">{{ $blog->published_at->format('M') }}</p>
                                </div>
                                <div class="s8-pcnct">
                                    <p class="s8-pm-pera"><span class="people-s8icn"><i class="bi bi-person-fill"></i></span> &nbsp; By {{ $blog->author }}</p>
                                    <div class="sec-8-cnct-one-pss8">
                                        <h5 class="cnct-one-h"><a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">{{ $blog->title }}</a></h5>
                                        <p class="cnct-one-pss8">{{ $blog->excerpt }}</p>
                                    </div>
                                    <button type="button" class="btn btn-md shop-btn-s5 rcnt-btn-smpl"><a href="{{ route('blog.show', $blog->slug) }}">Read More &nbsp;<i class="bi bi-arrow-right-circle-fill"></i></a></button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <h4>No blog posts available at the moment.</h4>
                            <p class="text-muted">Check back soon for new articles!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
