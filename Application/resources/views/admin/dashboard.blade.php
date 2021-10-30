@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="ad__dashboard">
   @if(session('success'))
   <div class="note note-primary">
      {{ session('success') }}
   </div>
   @endif
   <div class="row">
      <div class="col-lg-3">
         <div class="card mb-3 bg-success text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                  <polyline points="9 15 12 12 15 15" />
                  <line x1="12" y1="12" x2="12" y2="21" />
               </svg>
               <h1>{{ $countUploads }}</h1>
               {{__('Total Uploads')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-blue text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="9" cy="7" r="4" />
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
               </svg>
               <h1>{{ $countUsers }}</h1>
               {{__('Total Users')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-secondary text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <rect x="3" y="5" width="18" height="14" rx="2" />
                  <polyline points="3 7 12 13 21 7" />
               </svg>
               <h1>{{ $countMessages }}</h1>
               {{__('Total messages')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-purple text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                  <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                  <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
               </svg>
               <h1>{{ $countPages }}</h1>
               {{__('Total pages')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-danger text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
               <h1>{{ $countReports }}</h1>
               {{__('Total reports')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-dark text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
               <h1>{{ $countFeatures }}</h1>
               {{__('Total features')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-warning text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><line x1="8" y1="8" x2="12" y2="8" /><line x1="8" y1="12" x2="12" y2="12" /><line x1="8" y1="16" x2="12" y2="16" /></svg>
               <h1>{{ $countPosts }}</h1>
               {{__('Total posts')}}
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card mb-3 bg-info text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><rect x="9" y="3" width="6" height="4" rx="2" /><line x1="9" y1="12" x2="9.01" y2="12" /><line x1="13" y1="12" x2="15" y2="12" /><line x1="9" y1="16" x2="9.01" y2="16" /><line x1="13" y1="16" x2="15" y2="16" /></svg>
               <h1>{{ $countCategories }}</h1>
               {{__('Total categories')}}
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6 mb-3">
         <div class="card">
            <div class="card-header">
               <h3 class="m-0">{{__('Statistics of users')}}</h3>
            </div>
            <div class="card-body pt-4">
               @if($countUsers > 0)
               <div id="chart-users"></div>
               @else 
               <div class="empty">
                  <div class="empty-img">
                     <img src="{{ asset('images/sections/empty.svg') }}" height="128" alt="">
                  </div>
                  <p class="empty-title">{{__('No data found')}}</p>
                  <p class="empty-subtitle text-muted">
                     {{__('This section is empty and has no content.')}}
                  </p>
               </div>
               @endif
            </div>
         </div>
      </div>
      <div class="col-lg-6 mb-3">
         <div class="card">
            <div class="card-header">
               <h3 class="m-0">{{__('Last Joined Users')}}</h3>
            </div>
            <div class="card-body">
              @if($lastUsers->count() > 0)
               <div class="divide-y-4">
                  @foreach($lastUsers as $user)
                  <div class="new-user">
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar" style="background-image: url({{ asset('path/cdn/avatars/'.$user->avatar) }})"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              <strong><a href="{{ route('view.user', $user->id) }}" class="text-dark">{{ $user->name }}</a></strong> {{__('Just joined.')}}
                           </div>
                           <div class="text-muted">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}} </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               @else
               <div class="empty">
                  <div class="empty-img">
                     <img src="{{ asset('images/sections/empty.svg') }}" height="128" alt="">
                  </div>
                  <p class="empty-title">{{__('No data found')}}</p>
                  <p class="empty-subtitle text-muted">
                     {{__('This section is empty and has no content.')}}
                  </p>
               </div>
               @endif
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <h3 class="m-0">{{__('Statistics of uploads')}}</h3>
         <span class="col-auto ms-auto d-print-none">
         <a href="{{ url('admin/uploads') }}" class="btn btn-sm">{{__('View uploads')}}</a>
         </span>
      </div>
      <div class="card-body">
         @if($countUploads > 0)
         <div id="chart-uploads-overview"></div>
         @else 
         <div class="empty">
            <div class="empty-img">
               <img src="{{ asset('images/sections/empty.svg') }}" height="128" alt="">
            </div>
            <p class="empty-title">{{__('No data found')}}</p>
            <p class="empty-subtitle text-muted">
               {{__('This section is empty and has no content.')}}
            </p>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection