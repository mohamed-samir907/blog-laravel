@extends('front.layouts.app')

@section('style')
.avatar {
    max-width: 100px;
}
@endsection

@section('content')
<div class="content-wrapper">

<!-- Stunning Header -->
@if($post)
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post->title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="text-center" style="width: 100%">
                        <img style="float: none;" class="post-thumb img-responsive center-block" src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post__content">
                        <div class="post-additional-info">
                            <div class="post__author author vcard">
                                Posted by
                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">
                                        {{ $post->user->name }}
                                    </a>
                                </div>
                            </div>

                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $post->category->id]) }}">
                                    {{ $post->category->name }}
                                </a>
                            </span>

                            <span class="category">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span>{{ $post->viewed }}</span>
                            </span>
                            

                        </div>

                        <div class="post__content-info">

                            {!! html_entity_decode($post->content) !!}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                    @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials text-center">
                        <div class="addthis_inline_share_toolbox_xpmx"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb avatar">
                        <img src="{{ asset($post->user->profile->avatar) }}" alt="{{ $post->user->name }}">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                            <p class="author-info">{{ $post->user->profile->occupation }}</p>
                        </div>
                        <p class="text">{{ $post->user->profile->about }}</p>
                        <div class="socials">

                            <a href="{{ $post->user->profile->facebook }}" target="_blank" class="social__item">
                                <img src="app/svg/circle-facebook.svg" alt="facebook">
                            </a>

                            <a href="{{ $post->user->profile->linkedin }}" target="_blank" class="social__item">
                                <img src="app/svg/linkedin.svg" alt="linkedin">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    
                    @if($next_post)
                    <a href="{{ route('post.single', ['slug' => $next_post->slug]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                    @if($prev_post)
                    <a href="{{ route('post.single', ['slug' => $prev_post->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ $prev_post->title }}</p>
                        </div>
                    </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                    {{-- Inlcude Disqus Comment System --}}
                    @include('front.layouts.disqus')

                </div>

            </div>

            <!-- End Post Details -->
            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach($tags as $tag)
                            <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@else
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Post Not Found</h1>
    </div>
</div>
@endif
@endsection