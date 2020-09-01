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
            <h4>Shopping Cart</h4>

            @if($carts->isEmpty())
                <div class="alert" style="margin: 5rem;">
                    Sorry, Your cart have no item!
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

                    <div class="checkout_btn_inner d-flex align-items-center" style="float:right; margin: 2em 0;">
                        <a class="border_button" href="{{url('/shipping_info')}}">Proceed To Checkout</a>  
                    </div>
                    <div class="checkout_btn_inner d-flex align-items-center" style="float:right; margin: 2em 0;">
                        <a class="border_button" href="{{url('/gallery')}}">Continue Shopping</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

@endsection

@section('scripts')

@endsection