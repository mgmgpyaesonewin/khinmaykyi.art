@extends('layout.app')

@section('title','Cart')

@section('content')

    <section class="cart_area">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="container">
             <h3 style="text-align: center; color: #343352; margin-top: 1rem;">Shopping Cart</h3>

            @if($carts->isEmpty())
                <div class="alert" style="margin: 3rem;">
                    <div class="empty_cart_page tc dn" style="display: block;  margin: 0 auto; text-align: center;">
                        <i class="Shopping-icon fa fa-shopping-cart fa-4x" style="color: grey; margin-bottom: 1rem;"></i>
                        <h2 class="cart_page_heading mg__0 mb__20 tu fs__30">Your cart is empty.</h2>
                        <br>
                        <p>Before proceed to checkout you must add some products to your shopping cart.<br> You will find a lot of interesting products on our "Shop" page.</p>
                        <a class="button button_primary tu js_add_ld" href="/gallery">Return To Shop</a>
                    </div>
                </div>
            @else

            <div class="cart-inner">
                <div class="table-responsive" style="margin-top: 2rem;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope = "col"> Image </th>
                                <th scope = "col"> Title </th>
                                <th scope = "col"> Price </th>
                                <th scope = "col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <img src="{{URL::to('/')}}/images/{{$cart->image}}"  class="img-thumbnail" width="100px" height="100px" alt="Image"/>
                                </td>
                                <td> {{$cart->title}} </td>
                                <td> {{ number_format($cart->price) }}-kyats </td>
                                <td>
                                    <form action="{{ route('cart.destroy',$cart->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    Total Quantity : <strong> {{ $quantities}} </strong>
                    <br>
                    Total Price : <strong> {{ number_format($total) }}-kyats </strong>

                    <div class="checkout_btn_inner align-items-center" style="float:right; margin-top: 1em;">
                        <a class="button" href="{{url('/shipping_info')}}">Proceed To Checkout</a>  
                    </div>
                    <div class="checkout_btn_inner align-items-center" style="float:right; margin-top: 1em;">
                        <a class="button" href="{{url('/gallery')}}" style="color: white;">Continue Shopping</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

@endsection

@section('scripts')

@endsection