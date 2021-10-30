@extends('layouts.admin')
@section('title', 'Website Ads')
@section('content')
<div class="amazons3_page">
   <form id="adsForm" method="POST">
      <div class="card mb-3">
         <div class="card-header text-white bg-success"><h3 class="m-0">{{__('Home page')}}</h3></div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Top Ads (Synchronous) :')}}</label>
                     <textarea name="home_1" id="home_1" rows="7" class="form-control">{{ $ads->home_1 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Bottom Ads (Synchronous) :')}}</label>
                     <textarea name="home_2" id="home_2" rows="7" class="form-control">{{ $ads->home_2 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-3">
         <div class="card-header text-white bg-danger"><h3 class="m-0">{{__('Download page')}}</h3></div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Top Ads (Synchronous) :')}}</label>
                     <textarea name="download_1" id="download_1" rows="7" class="form-control">{{ $ads->download_1 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Left Ads (Synchronous) :')}}</label>
                     <textarea name="download_2" id="download_2" rows="7" class="form-control">{{ $ads->download_2 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (300x600) on mobile (300x280)')}}</small>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label>{{__('Bottom Ads (Synchronous) :')}}</label>
               <textarea name="download_3" id="download_3" rows="7" class="form-control">{{ $ads->download_3 }}</textarea>
               <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
            </div>
         </div>
      </div>
      <div class="card mb-3">
         <div class="card-header text-white bg-blue"><h3 class="m-0">{{__('Blog page')}}</h3></div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Top Ads (Synchronous) :')}}</label>
                     <textarea name="blog_1" id="blog_1" rows="7" class="form-control">{{ $ads->blog_1 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>{{__('Right Ads (Synchronous) :')}}</label>
                     <textarea name="blog_2" id="blog_2" rows="7" class="form-control">{{ $ads->blog_2 }}</textarea>
                     <small class="text-muted">{{__('Put synchronous code it will work on desktop (300x280)')}}</small>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label>{{__('Bottom Ads (Synchronous) :')}}</label>
               <textarea name="blog_3" id="blog_3" rows="7" class="form-control">{{ $ads->blog_3 }}</textarea>
               <small class="text-muted">{{__('Put synchronous code it will work on desktop (728x90) on mobile (300x280)')}}</small>
            </div>
         </div>
      </div>
      <div class="card mb-3">
         <div class="card-header text-white bg-warning"><h3 class="m-0">{{__('Mobile')}}</h3></div>
         <div class="card-body">
            <div class="form-group">
               <label>{{__('Mobile Ads :')}}</label>
               <textarea name="mobile" id="mobile" rows="7" class="form-control">{{ $ads->mobile }}</textarea>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <div class="note note-danger print-error-msg mb-3" style="display:none"><span></span></div>
            <button class="btnAds btn btn-primary" id="saveAdsBtn">{{__('Save changes')}}</button>
         </div>
      </div>
   </form>
</div>
@endsection