@extends('Layout.app')

@section('title','About')
@section('content')

<div class="site-section" style="background-color: #F5F5F5" id="/about">
      <div class="block__73694" id="services-section" >
        <div class="container">
             <div class="block-heading-1 mb-5 ml-2" data-aos="fade-left" data-aos-delay="">
              <h2>About Us</h2>
             
            </div>
          <div class="row d-flex no-gutters align-items-stretch">
            <div class="col-12 col-lg-6 block__73422 aos-init aos-animate" style="background-image: url('./frontend/images/IMG_2658.jpg');height="621px;"" data-aos="fade-right" data-aos-delay="">
            </div>
           

            <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="">
              <h2 class="mb-3 text">Land &amp; Property</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id dignissimos nemo minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>

              <p>Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>

              <ul class="ul-check primary list-unstyled mt-5">
                <li>Lorem ipsum dolor.</li>
                <li>Quod, amet. Provident.</li>
                <li>Quo, adipisci, quis.</li>
                <li>Cumque perspiciatis, blanditiis?</li>
              </ul>

              
            </div>

          </div>
        </div>      
      </div>
    </div>

      <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
              <h2>Exhibition</h2>
            </div>
          </div>
        </div>
        
          {{-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div>
              <a href="single.html"><img src="./frontend/images/IMG_5060.JPG" class="exhibition_image" style="width:300px;height:300px;"alt="Image" ></a>
              <h2><a href="single.html" class="recent-image-title">American Indian</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> </p>
            </div>
          </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div>
              <a href="single.html"><img src="./frontend/images/IMG_5516.JPG" class="exhibition_image" style="width:300px;height:300px;"alt="Image" ></a>
              <h2><a href="single.html" class="recent-image-title">American Indian</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> </p>
            </div>
          </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div>
              <a href="single.html"><img src="./frontend/images/IMG_9186.JPG" class="exhibition_image" style="width:300px;height:300px;"alt="Image" ></a>
              <h2><a href="single.html" class="recent-image-title">American Indian</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> </p>
            </div>
          </div> --}}
          <div class="row" style="margin-bottom:100px;">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="">
            <div>
              <a href="single.html"><img src="./frontend/images/IMG_5060.JPG" class="exhibition_image" style="width:440px;height:320px;"alt="Image" ></a>
             
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="">
           
             
              <h6 class="exhibition-date" style="margin-left:60px;margin-top:30px;color:orange;">AUGUST 18</h6>
              <h1 class="recent-image-title" style="margin-left:60px;margin-top:30px;margin-right:100px;" >Peasant Scenes And Landscapes</h1>
               <p class="recent-image-paragraph" style="margin-left:60px;margin-top:30px;margin-right:100px;" >The exhibition is made possible by the Laura & C. Arnold Douglas Foundation.</p>
            
          </div>


        </div>
         <div class="row" style="margin-top:50px;margin-bottom:100px;">
          

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="">
           
             
              <h6 class="exhibition-date" style="margin-left:60px;margin-top:30px;color:orange;">AUGUST 20</h6>
              <h1 class="recent-image-title" style="margin-left:60px;margin-top:30px;margin-right:100px;" >Rojo Y Negro - Latin American Art</h1>
               <p class="recent-image-paragraph" style="margin-left:60px;margin-top:30px;margin-right:100px;" >The exhibition is made possible by the Laura & C. Arnold Douglas Foundation.</p>
            
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="">
            <div>
              <a href="single.html"><img src="./frontend/images/IMG_9683.JPG" class="exhibition_image" style="width:440px;height:320px;"alt="Image" ></a>
             
            </div>
          </div>


        </div>
      </div>
    </div>
    

@endsection

@section('scripts')

@endsection