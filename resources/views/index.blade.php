@extends('front.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        @if($first_post)
        <div class="col-lg-8">
            <article class="hentry post post-standard has-post-thumbnail sticky">
                <div class="post-thumb">
                    <img src="{{ asset($first_post->featured) }}" alt="{{ $first_post->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($first_post->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>
                <div class="post__content">
                    <div class="post__content-info">
                        <h2 class="post__title entry-title text-center">
                            <a href="{{ $first_post->slug }}">
                                {{ $first_post->title }}
                            </a>
                        </h2>
                        <div class="post-additional-info text-center">
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published">
                                    {{ $first_post->created_at->toFormattedDateString() }}
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $first_post->category->id]) }}">
                                    {{ $first_post->category->name }}
                                </a>
                            </span>
                            <span class="category">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span>{{ $first_post->viewed }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endif
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        @if($second_post)
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">
                <div class="post-thumb">
                    <img src="{{ asset($second_post->featured) }}" alt="{{ $second_post->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($second_post->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>
                <div class="post__content">
                    <div class="post__content-info">
                        <h2 class="post__title entry-title text-center">
                            <a href="{{ $second_post->slug }}">
                                {{ $second_post->title }}
                            </a>
                        </h2>
                        <div class="post-additional-info text-center">
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published">
                                    {{ $second_post->created_at->toFormattedDateString() }}
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $second_post->category->id]) }}">
                                    {{ $second_post->category->name }}
                                </a>
                            </span>
                            <span class="category">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span>{{ $second_post->viewed }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endif
        @if($third_post)
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">
                <div class="post-thumb">
                    <img src="{{ asset($third_post->featured) }}" alt="{{ $third_post->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($third_post->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>
                <div class="post__content">
                    <div class="post__content-info">
                        <h2 class="post__title entry-title text-center">
                            <a href="{{ $third_post->slug }}">
                                {{ $third_post->title }}
                            </a>
                        </h2>
                        <div class="post-additional-info text-center">
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published">
                                    {{ $third_post->created_at->toFormattedDateString() }}
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $third_post->category->id]) }}">
                                    {{ $third_post->category->name }}
                                </a>
                            </span>
                            <span class="category">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span>{{ $third_post->viewed }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endif
    </div>
</div>
@if(!$first_post && !$second_post && !$third_post)
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 text-center">
            <i class="fa fa-newspaper-o soon"></i>
            <br>
            <span>No Posts Added Yet!</span>
        </div>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">
            
            @if($laravel->count() > 0)

                @foreach($laravel as $l)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $l->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($l->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                    </div>
                                    <h6 class="case-item__title text-center">
                                        <a href="{{ $post->slug }}">
                                            {{ $post->title }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                @endforeach
            @endif
        </div>
        </div>
    </div>
</div>

@endsection