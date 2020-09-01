@extends('layout.app')

@section('title','Detail')

@section('content')

	<div class="container" style="margin-top: 3em; margin-bottom: 3em;">
		<div class="row">

			<div class="col-lg-6 col-md-7 col-sm-12">
				<h1 style="padding-left: 1em;">{{ $galleries->title }}</h1>
				<div class="frame">
					 <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
					 	 <a href="{{URL::to('/')}}/images/{{$galleries->image}}">
					 	 	<img src="{{URL::to('/')}}/images/{{ $galleries->image }}" alt="" class="detail-image"
              				style="width: 100%; padding: 10px; cursor:pointer"/>
					 	 </a>
					 </div>
				</div>
			</div>

			<div class="col-lg-6 col-md-5 col-sm-12" style="margin-top: 4em; padding-left: 2em;" >
				<h2 style="font-size: 2rem;color: #333; font-weight: 600; line-height: 1;">{{ number_format($galleries->price) }} kyats</h2>
				 <p> {!! $galleries->detail!!} </p>
				 <hr style="border: 1px dotted #000000; border-style: none none dotted; color: #fff; background-color: #fff;">

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
				 @endauth

				 @guest
				 	<form action="{{route('storeCart')}}" mehtod="POST" role="form">
                    	<input type="hidden" name="token" value="{{csrf_token()}}">
                    	<input type="hidden" value="{{$galleries->id}}" name="gallery_id">
                    	<button type="submit" class="border_button">
                    		<i class="fa fa-shopping-basket shopping-icon" style="color:white;"></i>
                      		<span style="color:white;">Add to cart</span>
                    	</button>
                	</form>
				@endguest
			</div>

		</div>
	</div>


@endsection

@section('scripts')

@endsection