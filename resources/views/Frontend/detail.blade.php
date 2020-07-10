@extends('Layout.app')

@section('title','Detail')
@section('content')
<style>
  img.detail-image{
    width: 30rem;
    height:600px;
    background: #F8F8F8; 
    border: solid #BDBDBD 0.5px; 
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5)  ; 
    -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5)  ; 
   -moz-box-shadow: 5px 5px 50px rgba(0, 0, 0, 0.5)  ; 
  }
  </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7" style="margin-top:5em;margin-bottom: 5em;">
            <div class="card" style="width: 30rem;">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                          <div class="img-event">
                          <div data-aos="fade-up" data-aos-delay="200">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="./frontend/images/IMG_4515.jpg">
                            <img class="detail-image" src="./frontend/images/IMG_4515.jpg" alt="" style="cursor:pointer"/>
                        </a>
                        </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>  
        <div class="col-lg-5">
          <h1 style="margin-top:3em">Land &amp; Property</h1>
        
               <p class="recent-image-paragraph" style="margin-top:30px;margin-right:100px;" >Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?

               Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?
             Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection