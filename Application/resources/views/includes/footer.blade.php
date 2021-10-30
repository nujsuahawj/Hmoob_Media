@if($__env->yieldContent('title') != "Page not found")
<footer class="footer">
   <div class="container-xl">
      <div class="footer-logo text-center">
         <img src="{{ asset('images/main/'.$settings->logo) }}" alt="{{ $settings->site_name }}" width="200">
      </div>
      <div class="footer-menu text-center">
         @foreach($composerPages as $page)
         <a href="{{ route('page.slug', $page->slug) }}" class="btn btn-link">{{ $page->title }}</a>
         @endforeach
      </div>
      <hr class="mb-3">
      <div class="footer-copyright">
         <h3>
            ©<script>document.write(new Date().getFullYear())</script> {{ $settings->site_name }}
         </h3>
         <p>{{__('This site uses cookies and some Google services to give you better performance')}}</p>
      </div>
   </div>
</footer>
@endif
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert/sweetalert.min.js') }}"></script>
@if(request()->path()== "user/dashboard")
@if($uploads->count() > 0)
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/libs/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/js/user/charts.js')}}"></script>
@endif
@endif
<script src="{{ asset('assets/js/app.js') }}"></script>
@if(request()->path()== "/")
<script src="{{ asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/home/ibob.js') }}"></script>
@endif
@if(request()->segment(1) == "user" or request()->segment(1) == "admin")
<script src="{{ asset('assets/js/progressbar/progressbar.js') }}"></script>
@endif
@if(request()->segment(1) == "user")
<script src="{{ asset('assets/js/user/main.js') }}"></script>
@endif
@if(Route::is('download.file'))
<script src="{{ asset('assets/js/download.js') }}"></script>
@endif
@if(request()->segment(2) == 'post')
@if($settings->addthis_code != null)
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid={{ $settings->addthis_code }}"></script>
@endif
@if($settings->disqus_url != null)
<script>
   (function() { 
   var d = document, s = d.createElement('script');
   s.src = '{{ $settings->disqus_url }}';
   s.setAttribute('data-timestamp', +new Date());
   (d.head || d.body).appendChild(s);
   })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endif
@endif
{!! NoCaptcha::renderJs() !!}
@if($settings->site_analytics != null)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->site_analytics }}"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
   
   gtag('config', '{{ $settings->site_analytics }}');
</script>
@endif