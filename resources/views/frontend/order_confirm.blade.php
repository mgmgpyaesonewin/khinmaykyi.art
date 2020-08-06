@extends('layout.app')

@section('title','Detail')
@section('content')

<section class="order_area">
    <div class="container">
        <div class="order_inner" >
            <br>
            <h3 style="text-align:center;">
                <i class="fa fa-check-circle i-check-circle--size"></i>
                We've recieved your order!
            </h3>
                <div class="card" style="width: 50rem;margin-top: 3rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Your Information:</h5>
                                <p> {{(Auth::user()->name)}} </p>
                                <p> {{(Auth::user()->email)}} </p>
                            </div>
                           
                             <div class="col-6 border-left">
                                <h5 class="card-title">Shipping Address:</h5>
                                <p> {{$shipping_address->address}} </p>
                                <p>Phone no:{{$shipping_address->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </div>
              

        <div class="cart_inner" style="margin-left: 15rem;margin-right: 15rem;">
            <h5>Order Summary</h5>
            <br>
            <div class="table-responsive">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td><img src="{{URL::to('/')}}/images/{{ $cart->image }}"
                                    class="img-thumbnail" width="100px" height="100px" alt="Image" /></td>
                            <td>{{$cart->title}}</td>
                            <td>{{$cart->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Total Payment: {{ session('total') }}-kyats</p>
                <p>Total Quantity: {{ session('quantities') }}</p>
                <h5 class="order-confirm-text">Payment information</h5>
                   <p> Cash on delivery (CDO)</p>
               {{--   <p> Order-date : {{ Carbon\Carbon::parse($order->created_at)->diffForHumans()}} </p> --}}

            </div>{{-- table-responsive --}}

        </div>          
            <div class="checkout_btn_inner d-flex align-items-center" >
                <a class="border_button" href="{{route('storeOrder')}}">Order Confirm</a>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection