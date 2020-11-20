@extends('layout.app')

@section('title','About')

@section('content')


  <div class="container" style="margin-top: 2rem; margin-bottom: 2em;">

    <div class="block-heading" data-aos="fade-up" data-aos-delay="">
        <h2>About</h2> 
    </div>

    <div class="row" style="margin-bottom: 2rem; margin-top: 1rem;">
      <div class="col-lg-6 col-md-7  col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-delay="">
        <figure>
         <a href="single.html"><img src="./frontend/images/IMG_4515.jpg" class="frame" style="width: 100%; height: 100%;" alt="Image" ></a>
       </figure>
      </div>
           
      <div class="col-lg-6 col-md-5 col-sm-12 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="">
        <h2 class="mb-3 text">Khin May Kyi</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id dignissimos nemo minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>

        <p>Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center mt-10 mb-5">
            <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
              <h2>Exhibition</h2>
            </div>
      </div>
    </div>

    <div class="row" style="margin-bottom: 2rem;">
      <div class="col-lg-6 col-md-6 col-sm-12 " data-aos="fade-right" data-aos-delay="">
        <a href="single.html"><img src="./frontend/images/IMG_5060.JPG" class="frame-2" style="width: 100%; height: 100%;" alt="Image" ></a>
      </div>
      <div class="col-lg-6 col-md-6  col-sm-12 " data-aos="fade-up" data-aos-delay="">
        <h6 class="exhibition-date" style="margin-left: 60px; margin-top: 30px; color: #fc846b;">AUGUST 18</h6>
        <h3 class="recent-image-title" style="margin-left: 60px; margin-top: 30px; margin-right: 100px;" >Peasant Scenes And Landscapes</h3>
        <p class="recent-image-paragraph" style="margin-left: 60px; margin-top: 30px; margin-right: 100px;" >The exhibition is made possible by the Laura & C. Arnold Douglas Foundation.</p>
      </div>
    </div>
    <hr class="mx-auto" style="border-top: dotted 1.5px #343352; border-width: 5px; width: 30px; ">

    <div class="row" style="margin-bottom: 2rem;">
      <div class="col-lg-6 col-md-6  col-sm-12 " data-aos="fade-right" data-aos-delay="">
        <h6 class="exhibition-date" style="margin-left: 60px; margin-top: 30px; color: #fc846b;">AUGUST 20</h6>
        <h3 class="recent-image-title" style="margin-left: 60px; margin-top: 30px; margin-right: 100px;" >Rojo Y Negro - Latin American Art</h3>
        <p class="recent-image-paragraph" style="margin-left: 60px; margin-top: 30px; margin-right: 100px;" >The exhibition is made possible by the Laura & C. Arnold Douglas Foundation.</p>      
      </div>
      <div class="col-lg-6 col-md-6  col-sm-12 " data-aos="fade-up" data-aos-delay="">
        <a href="single.html"><img src="./frontend/images/IMG_9683.JPG" class="frame-2" style="width: 100%;height: 100%;" alt="Image" ></a>
      </div>
    </div>

  </div>


@endsection

@section('scripts')

@endsection