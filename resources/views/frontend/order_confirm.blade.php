@extends('layout.app')

@section('title','Order Confirm')

@section('content')

    <div class="container">
        <h3 style="text-align:center; margin-top: 1em;">
            <i class="fa fa-check-circle i-check-circle--size"></i>
            We've recieved your order!
        </h3>

        <div class="card" style="margin-top: 3rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title"> Your Information : </h5>
                        <p> {{($user->name)}} </p>
                        <p> {{($user->email)}} </p>
                    </div>
                    <div class="col-6 border-left">
                        <h5 class="card-title"> Shipping Address : </h5>
                        <p> {{$user->address}} </p>
                        <p>Phone no:{{$user->phone}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive" style="margin-top: -2.5rem !important;">
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
                        <td><img src="{{URL::to('/')}}/images/{{ $cart->image}}" class="img-thumbnail" width="150px" height="150px" alt="Image" />
                        </td>
                        <td>{{ $cart->title}}</td>
                        <td>{{ $cart->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total Payment: {{ session('total') }}-kyats</p>
            <p>Total Quantity: {{ session('quantities') }}</p>
            <h5 class="order-confirm-text">Payment information</h5>
            <p> Cash on delivery (CDO)</p>

            <div class="checkout_btn_inner d-flex align-items-center" style="float:right">
                <a class="button" href="{{route('storeOrder')}}">Order Confirm</a>  
            </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection