@extends('layout.app')

@section('title','Thank You')

@section('content')

     <div class="container">
        <div class="text-center">
            
            <i class="fa fa-check-circle i-check-circle--size"></i>
                <h3 style='color: #7a5e86'>Thank {{(Auth::user()->name)}}</h3>
                <br>
            <h4>Your order was completed successfully.</h4>
            <h5 class="enjoy">We hope you enjoy your purchase.</h5>
            <br>
            <p style="text-align: left;">Pay with cash upon delivery.</p>
           
        </div>
    </div>

    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title"> Your Information : </h5>
                        <p> {{($user->name)}} </p>
                        <p> {{($user->email)}} </p>
                    </div>
                    <div class="col-6 border-left">
                        <h5 class="card-title"> Shipping Address : </h5>
                        <p> {{$user->address}} {{$user->township}} Township</p>
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
                        <td class="tdata">{{ $order_detail->gallery->title}}</td>
                        <td class="tdata">K{{ number_format($order_detail->gallery->price)}}</td>
                        <td class="tdata"> {{ Carbon\Carbon::parse($order_detail->created_at)->format('jS, M, Y') }}  </td>
                    </tr>
                     @endforeach 
                </tbody>
            </table>
            <p>Payment method:  Cash on delivery</p>
            <h6>
                <strong>Total Payment:  K{{ $order->total}}</strong>
            </h6>
            <p>Total Quantity: {{ count($order_details) }} </p>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
