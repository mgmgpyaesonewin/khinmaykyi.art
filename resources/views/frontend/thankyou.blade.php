@extends('layout.app')

@section('title','Thank You')

@section('content')

<section id="card_items">
    <div class="container" style="margin-top:5rem;margin-bottom:5rem;">
        <div class="text-center">
            
            <i class="fa fa-check-circle i-check-circle--size"></i>
                <h3 style='color: #7a5e86'>Thank {{(Auth::user()->name)}}</h3>
                <br>
            <h4>Your order was completed successfully.</h4>
            <h5 class="enjoy">We hope you enjoy your purchase.</h5>
            <br>
            <br>
            <p style="text-align: left;">Pay with cash upon delivery.</p>
           
        </div>
    </div>
    
<div class="container">

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
            <h3>Order detail</h3>
            <table class="table order_confirm_tb">
                <thead>
                    <tr>
                        <th scope="col">Order Items</th>
                        <th scope="col">          </th>
                        <th scope="col">          </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td><img src="{{URL::to('/')}}/images/{{ $order_detail->gallery->image}}" class="img-thumbnail" width="150px" height="150px" alt="Image" />
                        </td>
                        <td>{{ $order_detail->gallery->title}}</td>
                        <td>{{ number_format($order_detail->gallery->price)}}-kyats</td>
                    </tr>

                   
                </tbody>
            </table>

            <p>Total Payment:{{ number_format ($order_detail->order->total) }}-kyats</p>
            <p>Total Quantity: {{ count($order_details) }} </p>
             @endforeach
            <h5 class="order-confirm-text">Payment information</h5>
            <p> Cash on delivery (CDO)</p>
        </div>
        <hr>
         <p class="thanku-text">Your order will be sent very soon.</p>
         <p class="thanku-text">For any questions or for further information, please contact our customer support.</p>
           
<a href="{{ url('download-pdf') }}">Download</a>

    </div>


</section>

@endsection

@section('scripts')

@endsection
