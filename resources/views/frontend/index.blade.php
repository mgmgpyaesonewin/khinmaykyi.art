@extends('layout.app')

@section('title','Khin May Kyi - Art Gallery')

@section('content')

<style>
  .responsive_image{
    width: 100%;
    height: auto;
  }
  .slider_content1{
    .background-image: url('./frontend/images/color.png');
  }
  </style>

<header>
  <div class="container" style="background-color: whitesmoke; width: 100%; height: 100%;">
    <div class="row">
      <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#slides" data-slide-to="0" class="active"></li>
          <li data-target="#slides" data-slide-to="1"></li>
          <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row"{{--   style="background-image: url('./frontend/images/color.png');" --}}>
              <div class="col-4" style="text-align: center; margin: auto; line-height: 2">
                <div class="slider_content">
                  <h2>Welcome to our gallery.</h2>
                  <button class="small_button">
                    <a href="{{url('/gallery')}}" style="color: #fff;">
                      Shop now
                    </a>
                  </button>
                </div>
                </div>
              <div class="col-8" style="padding-top: 2em; padding-bottom: 2em; padding-right: 2.3em;">
                <div class="frame1" style="-ms-transform: rotate(5deg); transform: rotate(5deg);">
                <img class="responsive_image" src="./frontend/images/IMG_7753.jpg">
              </div>
              </div>
            </div>
          </div>

            <div class="carousel-item">
            <div class="row">
              <div class="col-7" style="padding-top: 2em; padding-bottom: 2em; padding-left: 2em;">
                <div class="frame1">
                  <img class="responsive_image" src="./frontend/images/IMG_8145.jpg">
                </div>
              </div>
              <div class="col-5" style="padding-top: 0.7em; padding-bottom: 0.7em; text-align: center; margin: auto;">
                <div class="slider_content1"  style="text-align: center; background: -webkit-linear-gradient(transparent, transparent),">
                  <h3>We create beautiful art.</h3>
                  <button class="small_button1">
                    <a href="{{url('/gallery')}}" style="color: #fff;">
                      View more
                    </a>
                  </button>
                </div>
              </div>
            </div>
          </div>

            <div class="carousel-item">
            <div class="row">
              <div class="col-7" style="padding-top: 2em; padding-bottom: 2em; padding-left: 2.5em;">
                <div class="frame1" style="-ms-transform: rotate(-6deg); transform: rotate(-6deg);">
                  <img class="responsive_image" src="./frontend/images/IMG_3532.JPG">
                </div>
              </div>
              <div class="col-5" style="text-align: center; margin: auto;">
                <div class="slider_content">
                  <h3>Welcome to our gallery.</h3>
                  <button class="small_button">
                    <a href="{{url('/gallery')}}" style="color: #fff;">
                      Shop now
                    </a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        
        
        </div>
      </div>
    </div>
  </div>
</header>

<section class="ct-hometabcontent">
  <div class="site" style="margin-top: 2rem;">
    <div class="container">

      <div class="row">
        <div class="col-12 text-center mb-5">
          <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
            <span>Recent Artworks</span>
            <h2>Our Art</h2>
          </div>
        </div>
      </div>

      <div class="row recent">
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_7751.jpg" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="" style="display: table-cell;">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_5516.JPG" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">Monastery</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="" style="display: table-cell;">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_7753.jpg" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">Yangon Medical University</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_7753.jpg" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">Yangon Medical University</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_9726.jpg" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">State Counsellor</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_3471.jpg" alt="Image" class="recent-image rounded"></a>
            <h2><a href="single.html" class="recent-image-title">Bagan</a></h2>
            <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
        </div>


      </div>

    </div>
  </div>
</section>

  <div class="site" style="margin-top: 2rem;">
    <div class="container">

      <div class="row">
        <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
          <div class="block-heading-1">
            <span>Get In Touch</span>
            <h2 class="contact-us">Contact Us</h2>
          </div>
        </div>
      </div>{{-- row --}}

      <div class="row">
        <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
          <form action="#" method="post">

            <div class="form-group row">
              <div class="col-md-12 mb-4 mb-lg-0">
                <input type="text" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Email address">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 ml-auto">
                <button class="button">Send Message</button>
              </div>
            </div>

          </form>
        </div>

        <div class="col-lg-6 ml-auto" data-aos="fade-up" data-aos-delay="200">
          <h2 class="text">Need to know more on details. Get In Touch</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, distinctio! Harum quibusdam nisi, illum nulla aspernatur aut quidem aperiam, quae non tempora recusandae voluptatibus fugit impedit.</p>
          <button class="button" style="float: right;">Get Started</button>
        </div>

      </div>{{-- row --}}

    </div>
  </div>


   

@endsection

@section('scripts')

@endsection