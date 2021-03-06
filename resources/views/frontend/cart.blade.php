@extends('layout.app')

@section('title','Cart')

@section('content')

    <section class="cart_area">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="page-header text-center" style="background-image: url('./frontend/images/page-header-bg.jpg')">
            <div class="container">
              <h3 class="page-title">Shopping Cart
              </h3>
            </div>
          </div>

        <div class="container">
            
            @if($carts->isEmpty())
                <div class="alert">
                    <div class="empty_cart_page tc dn" style="display: block;  margin: 0 10px; text-align: center;">
                        <i class="Shopping-icon fa fa-shopping-cart fa-4x" style="color: grey; margin-bottom: 1rem;"></i>
                        <h2 class="cart_page_heading mg__0 mb__20 tu fs__30">Your cart is empty.</h2>
                        <br>
                        <p>Before proceed to checkout you must add some products to your shopping cart.<br> You will find a lot of interesting products on our "Gallery" page.</p>
                        <a class="purple-button button_primary tu js_add_ld" href="/gallery">Return To Gallery</a>
                    </div>
                </div>
            @else

            <div class="cart-inner">
                <div class="table-responsive" style="margin-top: 2rem;">
                    <table class="table">
                        <thead class="theader">
                            <tr>
                                <th scope = "col" class="thead"> Image </th>
                                <th scope = "col" class="thead"> Title </th>
                                <th scope = "col" class="thead"> Price </th>
                                <th scope = "col" class="thead">       </th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach ($cart_items as $cart_item)
                            <tr>
                                <td class="tdata" >
                                    <img src="{{URL::to('/')}}/images/{{$cart_item->gallery->image}}"  class="img-thumbnail" width="100px" height="100px" alt="Image"/>
                                </td>
                                <td class="tdata" > {{$cart_item->gallery->title}} </td>
                                <td class="tdata" > K{{ number_format($cart_item->gallery->price) }} </td>
                                <td class="tdata" >
                                    <form action="{{ route('cart.destroy',$cart_item->cart_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn">
                                            <i class="fas fa-times" style="color:black;"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    
                    <div class="card mb-4" style="width: 18rem;float:right;background-color: #F9F9F9;">
                        <div class="card-body">
                            Total Quantity : <strong style="float: right;"> {{ $quantities}} </strong>
                            <hr>
                            Total Price : <strong style="float: right;"> K{{ number_format($total) }} </strong>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="container" style="margin-bottom: 0.5rem;">
                <div class="row">
                       <div class="col-6 shopping_button text-center" style="padding-left: 0px;">
                            <a class="purple-button" href="{{url('/gallery')}}" style="color: white;">Continue Shopping</a>
                       </div>
                       <div class="col-6 shopping_button text-center" style="padding-left: 0px;">
                            <a class="purple-button" href="{{url('/checkout')}}">Proceed To Checkout</a> 
                       </div>
                   </div>
            </div>
            </div>
            @endif             

    </section>

@endsection

@section('scripts')

@endsection