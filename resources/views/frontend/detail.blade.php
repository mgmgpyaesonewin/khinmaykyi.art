@extends('layout.app')

@section('title','Detail')
@section('content')
<style>
img.detail-image{
    width:100%;
    padding:10px;
  }

  .add-to-cart{
    border-radius: 3px;
    padding: 10px 15px;
    font-family: "Roboto",sans-serif;
    background: #222;
    border-color: #222;
    border: none;
  }
  .add-to-cart:hover{
   background-color:orange;
    outline:0 !important;
    box-shadow: none !important;
  }
  hr {
    border: 1px dotted #000000;
    border-style: none none dotted; 
    color: #fff; 
    background-color: #fff;
}
.box{
    padding:20px;
    border-top: 10px #2e2e2e;
    border-left: 10px #2e2e2e;
    border-bottom: 10px #000000;
    border-right: 10px #000000;
    border-style: solid;
    box-sizing: border-box;
    position: relative;
   
}
/*.box{
  border-image: url('//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/frame.png') 93 92 87 92 stretch stretch; 
  border-color: #f4be52;
  border-style: inset;
  border-width: 50px;
  display: block;
  background-color: #ffe;
  padding:10px;
  border-style: solid;
  box-sizing: border-box;
  position: relative;
}*/

  </style>


<div class="container" style="margin-bottom: 3em;">
    <div class="row" style="margin-top: 3em;">
       <div class="col-6">    
       <h1 style="padding-left: 1em;">{{ $galleries->title }}</h1>
       <div class="box">
       <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
              <a href="{{URL::to('/')}}/images/{{$galleries->image}}">
              <img src="{{URL::to('/')}}/images/{{ $galleries->image }}" alt="" class="detail-image"
              style="cursor:pointer"/>
              </a>
        </div>
       </div>
     </div>
        <div class="col-6" style="margin-top: 4em; padding-left: 2em;" >
              
              <h2 style="font-size: 2rem;color: #333;font-weight: 600;line-height: 1;">{{ number_format($galleries->price) }} kyats</h2>
                <p>
                 {!! $galleries->detail!!}
                </p>
                <hr>
                @auth
              
            
                <form action="{{route('storeCart')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                    <input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    <button class="btn btn-dark add-to-cart" data-button-action="add-to-cart" type="submit">
                      <i class="fa fa-shopping-basket shopping-icon" style="color:white;"></i>
                      <span style="color:white;">Add to cart</span>
                    </button>
                </form>
                @else
                   
                @endauth
                @guest
                <form action="{{route('storeCart')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    <button type="submit" class="border_button">Add to cart</button>
                </form>
                @endguest
             
       </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection