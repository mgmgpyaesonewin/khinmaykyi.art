@extends('layout.app')

@section('title','Detail')
@section('content')
<style>
img.detail-image{
  height:500px;
  }
  .image-name{
    font-size: 28px;
    text-transform: capitalize;
    margin: 3px 0 16px 0;
    border: 0;
    padding: 0;
    background: none;
  }
  </style>


<div class="container" style="margin-bottom: 3em;">
    <div class="row">
       <div class="col-sm-5 col-md-7">    
        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
              <a href="./frontend/images/IMG_4515.jpg">
              <img src="./frontend/images/IMG_4515.jpg" alt="" class="detail-image"
              style="cursor:pointer"/>
              </a>
        </div> 
       </div>
        <div class="col-sm-7 col-md-5">
              <h1 class="image-name">State Counsellor</h1>
              <h3> Title : </h3> 
              <h4> Price : ------- kyats</h4>
              <h5> Size : </h5>
              <button class="border_button">Add to card</button> 
              
               <p>
                Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?

               Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?
             Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
       </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection