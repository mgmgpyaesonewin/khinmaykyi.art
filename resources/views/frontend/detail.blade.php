@extends('layout.app')

@section('title','Detail')

@section('content')

 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/gallery">Gallery</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$galleries->title}}</li>
      </ol>
    </nav>
  </div>

	<div class="container" style="margin-top: 3em; margin-bottom: 3em;">
		<div class="row">

			<div class="col-lg-6 col-md-7 col-sm-12">
				<div class="frame">
					 <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
					 	 <a href="{{URL::to('/')}}/images/{{$galleries->image}}">
					 	 	<img src="{{URL::to('/')}}/images/{{ $galleries->image }}" alt="" class="detail-image"
              				style="width: 100%; padding: 10px; cursor:pointer"/>
					 	 </a>
					 </div>
				</div>
			</div>

			<div class="col-lg-6 col-md-5 col-sm-12" >
				<h2 style="color: #343352; font-weight:600; margin-bottom: 1rem;">{{ $galleries->title }}</h2>
				<p style="font-size: 1.5rem; color: #fc846b; font-weight: 600; line-height: 1;">{{ number_format($galleries->price) }} kyats</p>
				 <p> {!! $galleries->detail!!} </p>
				{{--  <hr style="border: 1px dotted #000000; border-style: none none dotted; color: #fff; background-color: #fff;"> --}}

				 @auth 
          @if ($cart_count == 0)
                    <form action="{{ route('cart.store') }}" method="POST" role="form" style="display: inline-block">
                      @csrf    
                    	<input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                    	<input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    	<button class="button" type="submit">
                      		<i class="fa fa-shopping-basket shopping-icon"></i>
                      		&nbsp;<span>Add to cart</span>
                    	</button>
                	</form>
          @else
             <p style="display: inline-block; padding-left: 20px;">
                  <i class="fas fa-check"></i>
                    <a href="{{url('/cart')}}">
                       Browse Cart
                    </a>
                </p>
                @endif

				 @endauth

				 @guest
                	<form action="{{ route('cart.store') }}" method="POST" role="form" style="display: inline-block">
                      @csrf    
                    	<input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    	<button class="button" type="submit">
                      		<i class="fa fa-shopping-basket shopping-icon"></i>
                      		 &nbsp;<span>Add to cart</span>
                    	</button>
                	</form>
                	
				@endguest

        @auth
         @if ($wishlist_count == 0)
                <form action="{{ route('wishlist.store') }}" method="POST" role="form" style="display: inline-block">
                      @csrf    
                      <input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                      <button class="button" type="submit">
                          <i class="fas fa-heart" style="color:white;"></i>
                          &nbsp;<span style="color:white;">Add to wishlist</span>
                      </button>
                  </form>
                @else
                <p style="display: inline-block; padding-left: 20px;">
                  <i class="fas fa-check"></i>
                    <a href="{{url('/wishlist')}}">
                       Browse Wishlist
                    </a>
                </p>
                @endif
                @endauth
                @guest
                <form action="{{ route('wishlist.store') }}" method="POST" role="form" style="display: inline-block">
                      @csrf    
                      <input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                      <button class="button" type="submit">
                          <i class="fas fa-heart" style="color:white;"></i>
                          &nbsp;<span style="color:white;">Add to wishlist</span>
                      </button>
                  </form>
                @endguest
			</div>

		</div>
	</div>


@endsection

@section('scripts')

@endsection