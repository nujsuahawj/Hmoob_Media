@extends('layouts.pages')
@section('title', 'Blog')
@section('content')
<div class="page_header">
   <h1>{{__('Our blog')}}</h1>
</div>
<div class="flex-fill d-flex flex-column justify-content-center py-3">
   <div class="container">
      <form action="{{ route('blog') }}" method="GET" class="mb-3">
         <div class="input-icon">
            <span class="input-icon-addon">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <circle cx="10" cy="10" r="7"></circle>
                  <line x1="21" y1="21" x2="15" y2="15"></line>
               </svg>
            </span>
            <input type="text" name="q" class="form-control" placeholder="Search on blog…" aria-label="Search in website">
         </div>
      </form>
      @if($ads->blog_1 != null)
      <div class="blog_bottom_ad mb-3 d-none d-md-block">
         {!! $ads->blog_1 !!}
      </div>
      @endif
      @if($ads->blog_1 != null)
      <div class="blog_mobile_bottom_ad mb-3 d-block d-md-none">
         {!! $ads->blog_1 !!}
      </div>
      @endif
      @if($posts->count() > 0)
      <div class="row">
         @foreach($posts as $post)
         <div class="blog_post col-lg-6">
            <div class="blog_single_post">
               <a href="{{ route('View_blog_post', $post->slug) }}">
                  <div class="post_date">{{ $post->created_at->diffForHumans() }}</div>
                  <img src="{{ asset('images/blog/'.$post->image) }}" alt="{{ $post->title }}" width="100%" height="300">
                  <h1>{{ shortertext($post->title, 80) }}</h1>
               </a>
            </div>
         </div>
         @endforeach
      </div>
      @if(request()->input('q') == null)
      {{$posts->links()}}
      @endif
      @else 
      <div class="alert alert-info border-0 mt-3 text-center">{{__('No data found')}}</div>
      @endif
      @if($ads->blog_3 != null)
      <div class="blog_bottom_ad mt-3 d-none d-md-block">
         {!! $ads->blog_3 !!}
      </div>
      @endif
      @if($ads->blog_3 != null)
      <div class="blog_mobile_bottom_ad mt-3 d-block d-md-none">
         {!! $ads->blog_3 !!}
      </div>
      @endif
   </div>
</div>
@endsection