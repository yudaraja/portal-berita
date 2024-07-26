@extends('layouts.portal-berita.index')
@section('title', 'Detail')
@section('content')
<div class="row no-gutters-lg">
    <div class="row">
        <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
            <img loading="lazy" decoding="async" src="{{ asset('storage/' . $post->thumbnail) }}"
                class="img-fluid w-100 mb-4" alt="Author Image">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <div class="content">
                <p>{!! $post->body !!}</p>
                <blockquote>
                    <p>{{ $post->getExcerpt() }}</p>
                </blockquote>
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
                                    @foreach ($recommendedPosts as $recommendedPost)
                                    <article class="card mb-4">
                                        <div class="card-image">
                                            <div class="post-info">
                                                <span class="text-uppercase">{{
                                                    $recommendedPost->created_at->diffForHumans() }}</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="{{ asset('storage/' . $recommendedPost->thumbnail) }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                        <div class="card-body px-0 pb-1">
                                            <h3>
                                                <a class="post-title post-title-sm"
                                                    href="{{ route('portal-berita.show', $recommendedPost->slug) }}">
                                                    {{ $recommendedPost->title }}
                                                </a>
                                            </h3>
                                            <p class="card-text">{{ $recommendedPost->getExcerpt() }}</p>
                                            <div class="content">
                                                <a class="read-more-btn"
                                                    href="{{ route('portal-berita.show', $recommendedPost->slug) }}">
                                                    Read Full Article
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
