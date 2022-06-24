
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <title>Mini Blog</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    {{-- css file --}}
    @include('frontend.includes.css');
   </head>
   <body>
   
   <div class="site-wrap">
   {{-- header section --}}
   @include('frontend.includes.headermenue');
     
     
     <div class="site-section bg-light">
       @yield('content')
     
     
     {{-- footerarea --}}
     @include('frontend.includes.footer');
   </div>
 
  {{-- scriptarea --}}
  @include('frontend.includes.script');

 <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
 
   gtag('config', 'UA-23581568-13');
 </script>
     
   </body>
 </html>