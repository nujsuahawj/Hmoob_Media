@extends('layouts.pages')
@section('title', $post->title)
@section('content')
<div class="full-post py-3">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="post-side">
               <h1 class="title">{{ $post->title }}</h1>
               <p><span class="badge bg-info me-3">{{ $category->category_name }}</span>
                  <span class="text-muted">{{__('Posted at')}} : {{ date("F d, Y", strtotime($post->created_at)) }}</span>
               </p>
               <div class="post-header">
                  <div class="addthis_inline_share_toolbox"></div>
               </div>
               @if($ads->blog_1 != null)
               <div class="blog_bottom_ad py-2 d-none d-md-block">
                  {!! $ads->blog_1 !!}
               </div>
               @endif
               @if($ads->blog_1 != null)
               <div class="blog_mobile_bottom_ad py-2 d-block d-md-none">
                  {!! $ads->blog_1 !!}
               </div>
               @endif
               <div class="content">
                  <img class="post-image" src="{{ asset('images/blog/'.$post->image) }}" alt="{{ $post->title }}">
                  <div class="body">
                     {!! $post->content !!}
                  </div>
                  @if($ads->blog_3 != null)
                  <div class="blog_bottom_ad mb-3 d-none d-md-block">
                     {!! $ads->blog_3 !!}
                  </div>
                  @endif
                  @if($ads->blog_3 != null)
                  <div class="blog_mobile_bottom_ad mb-3 d-block d-md-none">
                     {!! $ads->blog_3 !!}
                  </div>
                  @endif
                  <div class="post-footer">
                     <div class="mb-2 share"><strong>{{__('Share This :')}}</strong></div>
                     <div class="addthis_inline_share_toolbox"></div>
                     <div class="mt-3" id="disqus_thread"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 d-none d-lg-block">
            <div class="side-box">
               @if($ads->blog_2 != null)
               <div class="blog_right_ad">
                  {!! $ads->blog_2 !!}
               </div>
               @endif
            </div>
            <div class="side-box">
               <h1>{{__('You May Also like')}}</h1>
               <div class="side-post">
                  @foreach($also_likes as $also_like)
                  <a href="{{ route('View_blog_post', $also_like->slug) }}">
                     <div class="row py-2">
                        <div class="col-4 col-lg-4">
                           <img src="{{ asset('images/blog/'.$also_like->image) }}" alt="{{ $also_like->title }}">
                        </div>
                        <div class="col-8 col-lg-8">
                           <h4 class="title">{{ shortertext($also_like->short_description, 50) }}</h4>
                           <small class="text-muted">{{ date("F d, Y", strtotime($also_like->created_at)) }}</small>
                        </div>
                     </div>
                  </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection