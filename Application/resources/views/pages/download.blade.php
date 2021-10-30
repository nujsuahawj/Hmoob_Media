@extends('layouts.pages')
@section('title', 'Download')
@section('content')
<div class="download_page my-3">
   <div class="container">
      @if($ads->download_1 != null)
      <div class="download_top_ad d-none d-md-block mb-3">
         {!! $ads->download_1 !!}
      </div>
      @endif
      <div class="row">
         @if($ads->download_2 != null)
         <div class="col-lg-4">
            <div class="download_left_ad d-none d-md-block">
               {!! $ads->download_2 !!}
            </div>
         </div>
         @endif
         <div class="col-lg-8 @if($ads->download_2 == null) m-auto @endif">
            <div class="download_box">
               @if($ads->download_1 != null)
               <div class="download_mobile_top_ad d-block d-md-none mb-3">
                  {!! $ads->download_1 !!}
               </div>
               @endif
               <div class="box">
                  <div class="box-body">
                     <div class="page-header">
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <img src="{{ fileIcon($file->file_type) }}" alt="{{ $file->main_filename }}" width="60" height="60">
                           </div>
                           <div class="col">
                              <h2 class="page-title">{{ shortertext($file->main_filename, 20) }}</h2>
                              <div class="page-subtitle">
                                 <div class="row">
                                    <div class="col-auto">
                                       <span class="text-reset">{{__('File Format : ')}}<span class="do-cap">{{ $file->file_type }}</span></span>
                                    </div>
                                    <div class="col-auto">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                          <polyline points="7 11 12 16 17 11" />
                                          <line x1="12" y1="4" x2="12" y2="16" />
                                       </svg>
                                       <span class="text-reset">{{ $file->downloads }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-auto flb_download_button">
                              <span class="flb_download_buttons" id="flb_download_files">
                                 <button id="flb_download_file" class="flb_download_file text-dark download_btn btn w-100 disabled"></button>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="box-footer">
                     <div class="row">
                        <div class="col">
                           {{__('Upload and share files free and easy')}}
                        </div>
                        <div class="col-auto">
                           <a href="#" class="btn btn-sm w-100 " data-bs-toggle="modal" data-bs-target="#report">
                           {{__('Report file')}}
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="modal modal-blur fade" id="report" tabindex="-1" style="display: none;" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 9v2m0 4v.01" />
                                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                                 </svg>
                                 {{__('Report a violation')}}
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form id="reportForm" action="{{ route('report.file', $file->file_id) }}" method="POST">
                              @csrf
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label>{{__('File ID :')}}</label>
                                    <input type="text" id="report_fileId" name="report_fileId" class="form-control" value="{{ $file->file_id }}" disabled>
                                 </div>
                                 <div class="form-group mb-0">
                                    <label>{{__('Reason :')}} <span class="fsgred">*</span></label>
                                    <textarea id="report_reason" name="report_reason" rows="6" class="form-control" placeholder="Explain to us the reason for reporting in 200 character" maxlength="200" required></textarea>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button id="reportBtn" type="submit" class="btn btn-danger">{{__('Report')}}</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="information-box mt-3">
               <div class="row">
                  <div class="col-lg-6 d-none d-md-flex">
                     <img src="{{ asset('images/sections/download.svg') }}" width="100%">
                  </div>
                  <div class="col-lg-6">
                     <ul class="list-group bg-white no-rounded">
                        <li class="list-group-item do-cap"><strong>{{__('File name :')}}</strong><span class="pull-right">{{ shortertext($file->main_filename, 20) }}</span></li>
                        <li class="list-group-item do-cap"><strong>{{__('File format :')}}</strong><span class="pull-right">{{ $file->file_type }}</span></li>
                        <li class="list-group-item do-cap"><strong>{{__('Downloads :')}}</strong><span class="pull-right">{{ $file->downloads }}</span></li>
                        <li class="list-group-item do-cap"><strong>{{__('Upload date :')}}</strong><span class="pull-right">@datetime($file->created_at)</span></li>
                     </ul>
                  </div>
               </div>
            </div>
            @if($ads->download_2 != null)
            <div class="download_mobile_bottom_ad d-block d-md-none mb-3 mt-3">
               {!! $ads->download_2 !!}
            </div>
            @endif
            <div class="file-description mt-3">
               <div class="file-link mb-3">
                  <h2>{{__('Share link :')}}</h2>
                  <div class="input-group">
                     <input type="text" class="form-control sharelink" id="sharelink" value="{{ route('download.file', $file->file_id) }}" readonly>
                     <button class="btn" id="copyLink">{{__('Copy')}}</button>
                  </div>
               </div>
               <h2>{{__('About ')}}{{ $file->main_filename }}</h2>
               <p>{{__('The name of this file is ')}}{{ $file->main_filename }}{{__(', which is a ')}}{{ $file->file_type }}{{__(' format, and it is one of the files that can be downloaded and used easily. You can upload similar files without the need for an account, or you can create an account on the site and you will be able to manage your files easily. The site supports many file formats. You can upload your files. Share it anywhere and download it anytime.')}}</p>
            </div>
         </div>
      </div>
      @if($ads->download_3 != null)
      <div class="download_bottom_ad mt-3 d-none d-md-block">
         {!! $ads->download_3 !!}
      </div>
      @endif
      @if($posts->count() > 0)
      <div class="flb_blog py-3">
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
         <div class="view_more">
            <a href="{{ route('blog') }}" class="btn btn-primary">{{__('View all posts')}}</a>
         </div>
      </div>
      @endif
      @if($ads->download_3 != null)
      <div class="download_mobile_down_ad d-block d-md-none">
         {!! $ads->download_3 !!}
      </div>
      @endif
   </div>
</div>
@endsection