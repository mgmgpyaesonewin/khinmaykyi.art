@extends('layout.app')

@section('title','Khin May Kyi - Art Gallery')

@section('content')

<header>
  <div class="container mb-5" style="background-color: whitesmoke; width: 100%; height: 100%;">
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
                <div class="frame1" {{-- style="-ms-transform: rotate(5deg); transform: rotate(5deg);" --}}>
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
                <div class="frame1" {{-- style="-ms-transform: rotate(-6deg); transform: rotate(-6deg);" --}}>
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

  <div class="site"{{--  style="margin-top: 2rem;" --}}>
    <div class="container py-4 bg-light">

        <div class="col-12 text-center mb-5">
          <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
            <span>Recent Artworks</span>
            <h2 class="our_art">Our Art</h2>
          </div>
        </div>    
     
      <div class="row equal align-items-center justify-content-center text-center">       

        <div class="card-deck">

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_6623.JPG" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Yangon Downtown View</h5>
                 <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_0586.JPG" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Mountain View</h5>
                <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_2658.jpg" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                 <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_9186.JPG" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                 <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_9387.jpg" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                 <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-6 d-flex pb-3 aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="grid">
                <img class="card-img-top img-fluid" src="./frontend/images/IMG_4157.JPG" alt="Card image cap">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                 <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
              </div>
            </div>
          </div>

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