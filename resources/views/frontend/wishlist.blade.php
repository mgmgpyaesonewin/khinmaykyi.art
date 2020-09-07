@extends('layout.app')

@section('title','Wishlist')

@section('content')
<style>

    </style>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <h3 style="text-align: center; color: #343352; margin-top: 1rem;">View your wishlist products</h3>

            @if($wishlists->isEmpty())
                <div class="alert" style="margin: 3rem;">
                    <div class="empty_cart_page tc dn" style="display: block;  margin: 0 auto; text-align: center;">
                        <i class="far fa-heart fa-4x" style="color: grey; margin-bottom: 1rem;"></i>
                        <h2 class="cart_page_heading mg__0 mb__20 tu fs__30">WISHLIST IS EMPTY.</h2>
                        <br>
                        <p>You don't have any products in the wishlist yet.<br> You will find a lot of interesting products on our "Shop" page.</p>
                        <a class="button button_primary tu js_add_ld" href="/gallery">Return To Shop</a>
                    </div>
                </div>
            @else

            <div class="container" style="margin-top: 1rem;">
                <div class="con row">
                     @foreach($wishlists as $wishlist)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                       <div class="card" style="border: none; margin-top: 1rem;">
                            <div class="frame">
                                <div class="grid">
                                    <a href="{{url('gallery_detail',$wishlist->gallery->id)}}">
                                        <img class="grid1 card-img-top" src="{{URL::to('/')}}/images/{{ $wishlist->gallery->image }}" style="width: 100%; height: auto;" alt="" />
                                    </a>
                                </div>
                            </div>
                                <div class="card-body" style="text-align: center;">
                                    <h5 class="card-title" style="color: #343352;">{{ $wishlist->gallery->title }}</h5>
                                    <p class="card-text" style="color: #fc646b;">{{ number_format ($wishlist->gallery->price) }}-kyat </p>
                                </div>

                                <div class="wishlist_button_row" style="display: inline-block; margin: auto;">
                                    <form action="{{route('storeCart')}}" mehtod="POST" role="form" style="display: inline-block">
                                        <input type="hidden" name="token" value="{{csrf_token()}}">
                                        <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                                        <input type="hidden" value="{{$wishlist->gallery->id}}" name="gallery_id">
                                        <button class="small_button1" type="submit">
                                        <i class="fa fa-shopping-basket shopping-icon"></i>
                                        &nbsp;<span>Add to cart</span>
                                        </button>
                                    </form>
                                    <button class="small_button1" type="submit">
                                        <a href="{{url('gallery_detail',$wishlist->gallery->id)}}" style="color: #fff;">Detail</a>
                                    </button>
                                    <button class="small_button1" type="submit" style=" background-color: transparent;border-color: transparent; border: none; outline: none;">
                                        <a href="{{url('/')}}/removeWishlist/{{$wishlist->id}}" onclick="return confirm('Are you sure?');" type="button" style="color: #343352;" class="btn-floating"><i class="fas fa-trash fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </div>
                        

                        </div>   
                    </div>
                     @endforeach
                </div>
            </div>
            @endif
        

@endsection

@section('scripts')

@endsection