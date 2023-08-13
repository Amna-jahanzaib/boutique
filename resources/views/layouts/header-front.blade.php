<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('panel.site_title') }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

 @yield('styles')
 
</head>

<body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{route('home')}}"><span class="fw-bold text-uppercase text-dark">Fashion Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link {{ request()->is('/')  ? 'active' : '' }}" href="{{route('home')}}">OUR COLLECTION</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link {{ request()->is('shop')  ? 'active' : '' }}" href="{{route('shop')}}">SHOP</a>
                </li>
                
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item"><a class="nav-link {{ request()->is('cart')  ? 'active' : '' }}" href="{{route('cart')}}"> <i class="fas fa-dolly-flatbed me-1 text-gray {{ request()->is('cart')  ? 'active' : '' }}"></i>Cart<small class="text-gray fw-normal">
                (
                @if(Auth::check() ) 
                @php
                echo count(Auth::user()->cart);
                @endphp
                @else
                0
                @endif
                )
                </small></a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('wishlist')  ? 'active' : '' }}" href="{{route('wishlist')}}"> <i class="far fa-heart me-1 "></i><small class="text-gray fw-normal"> 
                (
                @if(Auth::check() ) 
                @php
                echo count(Auth::user()->wishlist);
                @endphp
                @else
                0
                @endif
                )
                </small></a></li>
                @if(!Auth::check())
                <li class="nav-item"><a class="nav-link {{ request()->is('login')  ? 'active' : '' }}" href="{{route('login')}}"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
                @else
                <li class="nav-item"><a class="nav-link  {{ request()->is('details')  ? 'active' : '' }}" href="{{route('customer.details')}}"> <i class="fas fa-user me-1 text-gray fw-normal"></i>{{Auth::User()->name}}</a></li>               
                <li class="nav-item"><a class="nav-link {{ request()->is('logout')  ? 'active' : '' }}" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fas fa-door-open  me-1 text-gray "></i>logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                @endif

              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!-- Content Wrapper. Contains page content -->
      @yield('main-content')
      @include('partials.footer')

      <!-- JavaScript files-->
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
      <script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
      <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
      <script src="{{ asset('js/front.js')}}"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>