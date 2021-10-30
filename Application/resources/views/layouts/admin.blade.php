<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('admin.includes.head')
   </head>
   <script>
      "use strict";
        const BASE_URL              = "{{ url('/') }}";
        const MAIN_COLOR            = "{{ $settings->color_2 }}";
   </script>
   @include('includes.style')
   <body class="antialiased">
      <div class="page">
         <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-black">
            <div class="container-fluid">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
               <span class="navbar-toggler-icon"></span>
               </button>
               <h1 class="navbar-brand navbar-brand-autodark">
                  <a href="{{ url('/admin') }}">
                  <img src="{{ asset('images/main/'.$settings->logo) }}" width="110" height="32" alt="{{ $settings->site_name }}" class="navbar-brand-image">
                  </a>
               </h1>
               <div class="navbar-nav flex-row d-lg-none">
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{ asset('path/cdn/avatars/'.auth()->user()->avatar) }})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{ auth()->user()->name }}</div>
                           <div class="mt-1 small text-muted">
                              @if(auth()->user()->permission == 2) {{__('User')}} @elseif(auth()->user()->permission == 1) {{__('Admin')}} @endif
                           </div>
                        </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ url('admin/dashboard') }}" class="dropdown-item">{{__('Dashboard')}}</a>
                        <a href="{{ url('admin/profile') }}" class="dropdown-item">{{__('Update profile')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </div>
               </div>
               <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="navbar-nav pt-lg-3">
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/dashboard') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <polyline points="5 12 3 12 12 3 21 12 19 12" />
                              <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                              <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('Dashboard')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/users') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <circle cx="9" cy="7" r="4" />
                              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('All Users')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/uploads') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                              <polyline points="9 15 12 12 15 15" />
                              <line x1="12" y1="12" x2="12" y2="21" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('All Uploads')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/ads') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <polyline points="7 8 3 12 7 16" />
                              <polyline points="17 8 21 12 17 16" />
                              <line x1="14" y1="4" x2="10" y2="20" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('Manage Ads')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/messages') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <rect x="3" y="5" width="18" height="14" rx="2" />
                              <polyline points="3 7 12 13 21 7" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('Messages')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/reports') }}" >
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                           </span>
                           <span class="nav-link-title">
                           {{__('Reports')}}
                           </span>
                        </a>
                        </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/pages') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                              <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                              <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('Pages')}}
                        </span>
                     </a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                 <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                 <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                              </svg>
                           </span>
                           <span class="nav-link-title">{{__('Storage')}}</span>
                        </a>
                        <div class="dropdown-menu">
                           <div class="dropdown-menu-columns">
                              <div class="dropdown-menu-column">
                                 <a class="dropdown-item" href="{{ url('admin/amazon') }}">{{__('Amazon S3')}}</a>
                                 <a class="dropdown-item" href="{{ url('admin/wasabi') }}">{{__('Wasabi')}}</a>
                                 <a class="dropdown-item" href="{{ url('admin/backblaze') }}">{{__('Backblaze')}}</a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <rect x="4" y="4" width="16" height="16" rx="2" />
                                 <line x1="4" y1="12" x2="20" y2="12" />
                                 <line x1="12" y1="4" x2="12" y2="20" />
                              </svg>
                           </span>
                           <span class="nav-link-title">{{__('File extensions')}}</span>
                        </a>
                        <div class="dropdown-menu">
                           <div class="dropdown-menu-columns">
                              <div class="dropdown-menu-column">
                                 <a class="dropdown-item" href="{{ url('admin/extensions/icons') }}">{{__('Icons')}}</a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><line x1="8" y1="8" x2="12" y2="8" /><line x1="8" y1="12" x2="12" y2="12" /><line x1="8" y1="16" x2="12" y2="16" /></svg>
                           </span>
                           <span class="nav-link-title">{{__('Blog')}}</span>
                        </a>
                        <div class="dropdown-menu">
                           <div class="dropdown-menu-columns">
                              <div class="dropdown-menu-column">
                                 <a class="dropdown-item" href="{{ url('admin/blog/posts') }}">{{__('Posts')}}</a>
                                 <a class="dropdown-item" href="{{ url('admin/blog/categories') }}">{{__('Categories')}}</a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                           </span>
                           <span class="nav-link-title">{{__('Home settings')}}</span>
                        </a>
                        <div class="dropdown-menu">
                           <div class="dropdown-menu-columns">
                              <div class="dropdown-menu-column">
                                 <a class="dropdown-item" href="{{ url('admin/features') }}">{{__('features')}}</a>
                                 <a class="dropdown-item" href="{{ url('admin/home/hero') }}">{{__('Hero background')}}</a>
                                 <a class="dropdown-item" href="{{ url('admin/home/text-button') }}">{{__('Text & button')}}</a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" href="{{ url('admin/settings') }}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                              <circle cx="12" cy="12" r="3" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        {{__('Settings')}}
                        </span>
                     </a>
                     </li>
                  </ul>
               </div>
            </div>
         </aside>
         <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="navbar-nav flex-row order-md-last">
                  <div class="nav-item d-none d-md-flex me-3">
                     <a href="{{ url('admin/messages') }}" class="nav-link px-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <rect x="3" y="5" width="18" height="14" rx="2" />
                           <polyline points="3 7 12 13 21 7" />
                        </svg>
                        @if($messages > 0 )
                        <span class="badge bg-red faa-flash animated"></span>
                        @endif
                     </a>
                  </div>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{ asset('path/cdn/avatars/'.auth()->user()->avatar) }})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{ auth()->user()->name }}</div>
                           <div class="mt-1 small text-muted">
                              @if(auth()->user()->permission == 2) {{__('User')}} @elseif(auth()->user()->permission == 1) {{__('Admin')}} @endif
                           </div>
                        </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ url('admin/dashboard') }}" class="dropdown-item">{{__('Dashboard')}}</a>
                        <a href="{{ url('admin/profile') }}" class="dropdown-item">{{__('Update profile')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">{{__('Logout')}}</a>
                        <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </div>
               </div>
               <div class="collapse navbar-collapse" id="navbar-menu">
                  <div class="ms-md-auto py-2 py-md-0 me-md-4 order-first order-md-last flex-grow-1">
                     <form action="{{ route('uploads') }}" method="GET">
                        <div class="input-icon">
                           <span class="input-icon-addon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <circle cx="10" cy="10" r="7"></circle>
                                 <line x1="21" y1="21" x2="15" y2="15"></line>
                              </svg>
                           </span>
                           <input type="text" name="q" class="form-control" placeholder="Search on uploads...">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </header>
         <div class="content">
            <div class="container-xl">
               <h2>@yield('title')</h2>
               <ol class="breadcrumb breadcrumb-alternate mb-3" aria-label="breadcrumbs">
                  <?php $segments = ''; ?>
                  @foreach(request()->segments() as $segment)
                  <?php $segments .= '/'.$segment; ?>
                  <li class="breadcrumb-item" style="text-transform:capitalize;">
                     <a href="{{ url($segments) }}">{{$segment}}</a>
                  </li>
                  @endforeach
               </ol>
               @if($errors->any())
               <div class="note note-danger">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </div>
               @elseif(session('success'))
               <div class="note note-success">
                  {{ session('success') }}
               </div>
               @endif
               @yield('content')
            </div>
         </div>
      </div>
      @include('admin.includes.footer')
   </body>
</html>