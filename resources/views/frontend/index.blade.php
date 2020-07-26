@extends('layout.app')

@section('title','Khin May Kyi - Art Gallery')
@section('content')
<style>
.carousel-inner img{
 width:100%;
 height:100%;
 padding-left: 7%;
 padding-right: 7%;
}

  </style>

{{-- <section id="testimonials">
  <div id="testimonial-carousel" class="carousel slide" data-interval="5000" data-ride="carousel" >  
    
    <ol class="carousel-indicators">
      <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#testimonial-carousel" data-slide-to="1"></li>
      <li data-target="#testimonial-carousel" data-slide-to="2"></li>
    </ol> 
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <img class="responsive" style="width:100%;" src="./frontend/images/IMG_7753.jpg">
            </div> 
          </div>
        </div>
      </div>
       <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <img class="responsive" style="width:100%;" src="./frontend/images/IMG_0586.JPG">
                 
            </div> 
          </div>
        </div>
      </div>
   <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <img class="responsive" style="width:100%;" src="./frontend/images/IMG_9387.jpg">
                 
            </div> 
          </div>
        </div>
      </div>
  </div>
</section> --}}

<div id="slides" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
    <li data-target="#slides" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./frontend/images/IMG_7753.jpg">
    </div>
    <div class="carousel-item">
      <img src="./frontend/images/IMG_5516.JPG">
    </div>
    <div class="carousel-item">
      <img src="./frontend/images/IMG_0586.JPG">
    </div>
  </div>
</div>


 

    
    <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
              <span>Recent Artworks</span>
              <h2>Our Art</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_7751.jpg" alt="Image" class="image rounded" 
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_5516.JPG" alt="Image" class="image rounded"
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html"  class="recent-image-title">Monastery</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_8145.jpg" alt="Image" class="image rounded"
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html"  class="recent-image-title">American Indian</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_7753.jpg" alt="Image" class="image rounded"
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html"  class="recent-image-title">Yangon Medical University</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
           <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_9726.jpg" alt="Image" class="image rounded"
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html" class="recent-image-title">State Counsellor</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card" style="width:330px;height:400px;">
              <a href="single.html" class="recent mb-4 d-block"><img src="./frontend/images/IMG_3471.jpg" alt="Image" class="image rounded"
                style="width:330px;height:400px;"></a>
              <h2><a href="single.html"  class="recent-image-title">Bagan</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">Khin May Kyi</a></p>
            </div>
          </div>
            <button class="border_button">Load More</button>

        </div>
      </div>
    </div>


    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
              <span>Get In Touch</span>
              <h2 class="contact-us">Contact Us</h2>
            </div>
          </div>
        </div>
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
                 {{--  <input type="submit" class="border_button py-3 px-3" value="Send Message"> --}}
                  <button class="border_button">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text">Need to know more on details. Get In Touch</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, distinctio! Harum quibusdam nisi, illum nulla aspernatur aut quidem aperiam, quae non tempora recusandae voluptatibus fugit impedit.</p>
           {{--  <p><a href="#" class="btn btn-primary text-white">Get Started</a></p> --}}
         <button class="border_button">Get Started</button>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('scripts')

@endsection