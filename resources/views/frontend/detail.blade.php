@extends('layout.app')

@section('title','Detail')
@section('content')
<style>
img.detail-image{
  position: relative;
  width: 70%;
  height: 50%;
        text-align: center;
        display: block;
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
    <div class="row" style="margin-top: 3em;">
       <div class="col">    
        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
              <a href="{{URL::to('/')}}/images/{{$galleries->image}}">
              <img src="{{URL::to('/')}}/images/{{ $galleries->image }}" alt="" class="detail-image"
              style="cursor:pointer"/>
              </a>
        </div> 
       </div>
        <div class="col-sm-7 col-md-5">
              <h1 style="color:purple;">{{ $galleries->title }}</h1>
              <h4> Price : {{ $galleries->price}} kyats</h4>
                @auth
                @php
                $cardData=DB::table('carts')
                ->rightJoin('galleries','carts.gallery_id',"=",'galleries.id')
                ->where('carts.gallery_id',"=",$galleries->id)->get();
                $count=App\Cart::where(['gallery_id'=>$galleries->id])->count();
                @endphp
              @if( $count == 0)
                <form action="{{route('addtocart')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                      <input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    <button type="submit" class="border_button">Add to cart</button>
                </form>
                @else
                    <p>
                        The product was successfully added to your cart.
                        <br>
                        Check
                        <a href="{{url('/cart')}}">
                            Here
                        </a>
                    </p>
                    @endif
                @endauth
                @guest
                <form action="{{route('addtocart')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}"> 
                    <button class="border_button" type="submit" >Add to cart</button>
                </form>
                @endguest
              
               <p>
                 {!! $galleries->detail!!}
           </p>
       </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection