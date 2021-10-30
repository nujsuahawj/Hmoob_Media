<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('includes.head')
   </head>
   @if($ads->mobile != null)
   {!! $ads->mobile !!}
   @endif
   <body @if(request()->path()== "/") class="filebob_home_body" @endif @if(request()->segment(2) == 'post' || Route::is('download.file')) class="bg-white" @endif>
   @if(request()->path()== "/")
   <script>
      "use strict";
        const SITE_URL              = "{{ url('/') }}";
        const MAX_FILES             = {{ $settings->onetime_uploads }};
        const BIG_FILES_DETECTED    = "This File Type not Allowed."; 
   </script>
   @endif
   @if(Route::is('download.file') && isset($file))
   <script>
      "use strict";
      const BASE_URL       = "{{ url('/') }}";
      const AUTHORIZED     = "{{ $file->id }}";
      const FILE_ID        = "{{ $file->file_id }}";
      const FILE_SIZE      = "{{ formatBytes($file->file_size) }}";
      const WAITING_TIME   = {{ $settings->waiting_time }};
      const MAIN_COLOR     = "{{ $settings->color_2 }}";
   </script>
   @endif
   @include('includes.style')
   @if(session('success'))
      <div class="top_header_message">
         {{ session('success') }}
      </div>
   @endif
   @if($__env->yieldContent('title') != "Page not found")
   <header class="navbar flb_pages_navbar navbar-expand-md navbar-light d-print-none bg-primary">
      <div class="container-xl">
         <div class="navbar-brand">
            <a href="{{ url('/') }}">
            <img src="{{ asset('images/main/'.$settings->logo) }}" alt="{{ $settings->site_name }}" class="navbar-brand-image">
            </a>
         </div>
         <div class="navbar-nav flex-row order-md-last">
            @guest
            <li class="nav-item">
               <div class="btn-group d-none d-lg-flex">
                  <a href="{{ route('register') }}" class="btn">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 11h6m-3 -3v6" />
                     </svg>
                     {{__('Sign Up')}}
                  </a>
                  <a href="{{ route('login') }}"  class="btn">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                     </svg>
                     {{__('Log in')}}
                  </a>
               </div>
               <a href="{{ route('login') }}"  class="btn d-block d-lg-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                     <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                  </svg>
                  {{__('Log in')}}
               </a>
            </li>
            @else
            <div class="nav-item dropdown">
               <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                  <span class="avatar avatar-sm rounded-circle" style="background-image: url({{ asset('path/cdn/avatars/'.Auth::user()->avatar) }})"></span>
                  <div class="d-none d-xl-block ps-2 ">
                     <div class="text-white">{{ Auth::user()->name }}</div>
                     <div class="mt-1 small text-white">
                        @if(Auth::user()->permission == 2) {{__('User')}} @elseif(Auth::user()->permission == 1) {{__('Admin')}} @endif
                     </div>
                  </div>
               </a>
               <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  @if(\Request::segment(1) != 'addition') 
                  <a href="{{ url('user/dashboard') }}" class="dropdown-item">{{__('Dashboard')}}</a>
                  <a href="{{ url('user/files') }}" class="dropdown-item">{{__('File Manager')}}</a>
                  <a href="{{ url('user/settings') }}" class="dropdown-item">{{__('Settings')}}</a>
                  <div class="dropdown-divider"></div>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
               </div>
            </div>
            @endguest
         </div>
      </div>
   </header>
   @endif
   @yield('content')
   @include('includes.footer')
   </body>
</html>