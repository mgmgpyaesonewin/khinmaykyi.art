@extends('layout.app')

@section('title','Wishlist')

@section('content')

{{--  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
      </ol>
    </nav>
  </div>
 --}}

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

         <div class="page-header text-center" style="background-image: url('./frontend/images/page-header-bg.jpg')">
            <div class="container">
              <h3 class="page-title">View your wishlist products
              </h3>
              {{-- <span></span> --}}
            </div><!-- End .container -->
        </div>
        {{-- <h5 style="text-align: center; color: #343352; margin-top: 1rem;">View your wishlist products</h5> --}}


         <div class="container">
           

            @if($wishlists->isEmpty())
                <div class="alert" style="margin: 3rem;">
                    <div class="empty_cart_page tc dn" style="display: block;  margin: 0 auto; text-align: center;">
                        <i class="fa fa-heart fa-4x" style="color: grey; margin-bottom: 1rem;"></i>
                        <h2 class="cart_page_heading mg__0 mb__20 tu fs__30">WISHLIST IS EMPTY.</h2>
                        <br>
                        <p>You don't have any products in the wishlist yet.<br> You will find a lot of interesting products on our "Shop" page.</p>
                        <a class="button button_primary tu js_add_ld" href="/gallery">Return To Shop</a>
                    </div>
                </div>
            @else

                <div class="table-responsive" style="margin-top: 2rem;">
                    <table class="table">
                        <thead class="theader">
                            <tr>
                                <th scope = "col" class="thead">       </th>
                                <th scope = "col" class="thead"> Item </th>
                                <th scope = "col" class="thead"> Title </th>
                                <th scope = "col" class="thead"> Price </th>
                                <th scope = "col">       </th>
                                 <th scope = "col">       </th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach ($wishlists as $wishlist)
                            <tr>
                                <td class="tdata" style="vertical-align: center;">
                                    <form action="{{ route('wishlist.destroy',$wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn"
                                        >
                                           <i class="fas fa-times" style="color:black;"></i>
                                        </button>
                                    </form> 
                                </td>
                                <td class="tdata">
                                     <a href="{{url('gallery_detail',$wishlist->id)}}" style="color: #fff;">
                                        <img src="{{URL::to('/')}}/images/{{$wishlist->image}}"  class="img-thumbnail" width="150px" height="150px" alt="Image"/>
                                    </a>
                                </td>
                                <td class="tdata"> {{$wishlist->title}} </td>
                                <td class="tdata"> {{ number_format($wishlist->price) }}-kyats </td>
                                <td class="tdata">
                                    <form action="{{ route('cart.store') }}" method="POST" role="form" style="display: inline-block">
                                        @csrf   
                                        <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                                        <input type="hidden" value="{{$wishlist->gallery_id}}" name="gallery_id">
                                        <button class="buttom" type="submit">
                                        <i class="fa fa-shopping-basket shopping-icon"></i>
                                        &nbsp;<span></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
            

            @endif

@endsection

@section('scripts')

@endsection