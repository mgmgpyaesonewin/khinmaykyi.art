@extends('Layout.app')

@section('title','Detail')
@section('content')
<style>
  img.detail-image{
    height:500px;
   /* background: #F8F8F8; */
    /*border: solid #BDBDBD 0.5px; 
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5)  ; 
    -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5)  ; 
   -moz-box-shadow: 5px 5px 50px rgba(0, 0, 0, 0.5)  ; */
  
  }

  .dat{
    padding-left:70px;
    margin:0 auto;
  }
  </style>

<div class="container-fluid" style="margin-bottom: 3em;">
    <div class="row" style="margin-top: 2em;">
       <div class="col-lg-6 dat">
        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
              <a href="./frontend/images/IMG_4515.jpg">
              <img class="detail-image" src="./frontend/images/IMG_4515.jpg" alt="" style="cursor:pointer"/>
              </a>
            </div> 
       </div>
        <div class="col-lg-6">
          <h1>State Counselllor</h1>
              <h3> Title : </h3> 
              <h4> Price : 100,000 kyats</h4>
              <h5> Size : </h5>
              <button class="border_button">Add to card</button> 
              
               <p class="recent-image-paragraph" style="margin-top:30px;margin-right:100px;" >
                Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?

               Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?
             Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
       </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection