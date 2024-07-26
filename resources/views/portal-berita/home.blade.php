@extends('layouts.portal-berita.index')
@section('title', 'Home')
@section('content')
<div class="row">
    <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="row">
            @if($posts->isEmpty())
            <p class="col-12">Tidak ada artikel</p>
            @else
            @foreach ($posts as $data)
            <div class="col-md-6 mb-4">
                <article class="card article-card article-card-sm h-100">
                    <a href="{{ route('portal-berita.show', $data->slug) }}">
                        <div class="card-image">
                            <div class="post-info">
                                <span class="text-uppercase">{{ $data->created_at->isoFormat('DD MMMM YYYY') }}</span>
                                <span class="text-uppercase">{{ $data->created_at->diffForHumans() }}</span>
                            </div>
                            <img loading="lazy" decoding="async" src="{{ asset('storage/' . $data->thumbnail) }}"
                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                        </div>
                    </a>
                    <div class="card-body px-0 pb-0">
                        <h2><a class="post-title" href="{{ route('portal-berita.show', $data->slug) }}">{{ $data->title
                                }}</a></h2>
                        <p class="card-text">{{ $data->getExcerpt(50) }}</p>
                        <div class="content">
                            <a class="read-more-btn" href="{{ route('portal-berita.show', $data->slug) }}">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <div class="col-lg-4">
        <div class="widget-blocks">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="widget">
                        <h2 class="section-title mb-3">Recommended</h2>
                        <div class="widget-body">
                            <div class="widget-list">
                                @if($recommendedPosts->isEmpty())
                                <p class="col-12">Tidak ada artikel yang direkomendasikan</p>
                                @else
                                @foreach ($recommendedPosts as $post)
                                <article class="card mb-4">
                                    <div class="card-image">
                                        <div class="post-info">
                                            <span class="text-uppercase">{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Thumbnail"
                                            class="w-100">
                                    </div>
                                    <div class="card-body px-0 pb-1">
                                        <h3><a class="post-title post-title-sm"
                                                href="{{ route('portal-berita.show', $post->slug) }}">{{ $post->title
                                                }}</a></h3>
                                        <p class="card-text">{{ Str::limit(strip_tags($post->body), 100, '...') }}</p>
                                        <div class="content">
                                            <a class="read-more-btn"
                                                href="{{ route('portal-berita.show', $post->slug) }}">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                @foreach ($recommendedPosts as $post)
                                <a class="media align-items-center"
                                    href="{{ route('portal-berita.show', $post->slug) }}">
                                    <img loading="lazy" decoding="async"
                                        src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Thumbnail"
                                        class="w-100">
                                    <div class="media-body ml-3">
                                        <h3 style="margin-top:-5px">{{ $post->title }}</h3>
                                        <p class="mb-0 small">{{ Str::limit(strip_tags($post->body), 50, '...') }}</p>
                                    </div>
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
