<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
      <title>
        @yield('title')
      </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/font/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/font/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/easyzoom.css') }}">
     
        
    <!-- MAIN CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    
  </head>
  
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <a href="#" class="text-white"><span class="mr-2 text-white icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info@yourdomain.com</span></a>
            <span class="mx-md-2 d-inline-block"></span>
            <a href="#" class="text-white">
              <span class="mr-2 text-white icon-phone"></span> <span class="d-none d-md-inline-block">1+ (234) 5678 9101</span>
            </a>
            <div class="float-right">
              <a href="#" class="text-white">
                <span class="mr-2 text-white icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span>
              </a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class="text-white">
                <span class="mr-2 text-white icon-instagram"></span> <span class="d-none d-md-inline-block">Instagram</span>
              </a>
            </div>
          </div> {{-- col-12 --}}   
        </div> {{-- row --}}   
      </div> {{-- container --}}
    </div> {{-- top-bar --}}

  <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
          <div class="site-logo">
            <a href="/" >
              <span><h4 class="logo">KhinMayKyi</h4>
            </a>
          </div>

          <div class="col-12">

            <nav class="site-navigation text-right ml-auto " role="navigation">

              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="/about" class="nav-link">About</a></li>
                <li><a href="/gallery" class="nav-link">Gallery</a></li>

                <li class="nav-item submenu dropdown">
                  @guest
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false"><i class="fas fa-user-circle"></i>
                    </a>
                  @else
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false"><i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                    </a>
                  @endguest
               

              <ul class="dropdown-menu">
                <li class="nav-item">
                  @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                  @endif
                  @else
                    <li class="nav-item">
                    <a class="nav-link"href="{{ route('logout') }}">Logout</a>
                  </li>
                  @endguest
                </li>
              </ul>

                @auth
                  <li>
                    <a class="nav-link" href="{{url("cart")}}" >
                      <i class="Shopping-icon fa fa-shopping-cart"></i>
                      <span class="shopping-text">Cart</span>
                      <span style="color:black; font-weight:bold;">

                      @php
                        $auth_user = Auth::user();
                        $cart_item=DB::table('cart_items')
                                    ->leftJoin('galleries','cart_items.gallery_id',"=",'galleries.id')
                                    ->leftJoin('carts','cart_items.cart_id',"=",'carts.id')
                                    ->where('carts.user_id',Auth::user()->id)->get();
                        $count = $cart_item->count();
                      @endphp
                      @isset($auth_user)
                        ({{$count}})
                      @endisset
                      @empty($auth_user)
                        ( 0 )
                      @endempty
                      </span>
                    </a>
                  @endauth
                </li>
              </ul>

            </nav>

          </div>
        </div>
    </div>

     <div class="toggle-button d-inline-block d-lg-none">
        <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
          <span class="icon-menu h3"></span>
        </a>
      </div>

  </header>

  @yield('content')

  <footer class="site-footer">
    <div>
      <a href="#" id="myBtn" class="type1" onclick="topFunction()" style="display: none;">
        <span id="myBtn" style="opacity: 0;"></span>
      </a>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <h2 class="footer mb-4">Contacts</h2>
            <ul class="list-unstyled contact">
              <li>Harvard Art Museums</li>
              <li>32 Quincy Street</li>
              <li>Testimonials</li>
              <li>Cambridge, MA 02138</li>
              <li>1 (617) 495-9400</li>
            </ul>
        </div>
        <div class="col-md-4 ml-auto">
          <h2 class="mb-4">Features</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="features">About Us</a></li>
              <li><a href="#" class="features">Press Releases</a></li>
              <li><a href="#" class="features">Terms of Service</a></li>
              <li><a href="#" class="features">Privacy</a></li>
              <li><a href="#" class="features">Contact Us</a></li>
            </ul>
        </div>
        <div class="col-md-4 ml-auto">
          <div class="mb-5">
            <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
            <form action="#" method="post" class="footer-suscribe-form">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
              </div>
          </div>
            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="#about-section" class="smoothscroll pl-0 pr-3">
              <span class="icon-facebook"></span>
            </a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
      </div>

    </div>   
    <div class="row pt-5 text-center">
      <div class="col-md-12">
        <div class="border-top pt-3">
          <p class="copyright">
            <small>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with 
             by 
             <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </small>
          </p>
        </div>
      </div>
    </div>
             
  </div>
    
  </footer>



  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>
  <script src="{{asset('frontend/js/easyzoom.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>

 @yield('scripts')

  <script>

  var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  } 
  </script>

  </body>

</html>