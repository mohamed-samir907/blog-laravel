@extends('front.layouts.app')

@section('style')
.avatar {
    max-width: 100px;
}
@endsection

@section('content')
<div class="content-wrapper">

<!-- Stunning Header -->
@if($tag)
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag: {{ $tag->tag }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        @if($tag->posts->count() > 0)
        	@foreach($tag->posts as $post)
	        <div class="col-lg-6">
	            <article class="hentry post post-standard has-post-thumbnail sticky">
	                <div class="post-thumb">
	                    <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
	                    <div class="overlay"></div>
	                    <a href="{{ asset($post->featured) }}" class="link-image js-zoom-image">
	                        <i class="seoicon-zoom"></i>
	                    </a>
	                    <a href="#" class="link-post">
	                        <i class="seoicon-link-bold"></i>
	                    </a>
	                </div>
	                <div class="post__content">
	                    <div class="post__content-info">
	                        <h2 class="post__title entry-title text-center">
	                            <a href="{{ route('post.single', ['slug' => $post->slug]) }}">
	                                {{ $post->title }}
	                            </a>
	                        </h2>
	                        <div class="post-additional-info text-center">
	                            <span class="post__date">
	                                <i class="seoicon-clock"></i>
	                                <time class="published">
	                                    {{ $post->created_at->diffForHumans() }}
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
	                    </div>
	                </div>
	            </article>
	        </div>
        	@endforeach
    	@else
    	<div class="col-lg-2"></div>
        <div class="col-lg-8 text-center">
            <i class="fa fa-newspaper-o soon"></i>
            <br>
            <h4 class="text-center">No Posts Added Under This Tag</h4>
        </div>
		
    	@endif
    </div>
</div>
@else
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag Not Found</h1>
    </div>
</div>
@endif
@endsection