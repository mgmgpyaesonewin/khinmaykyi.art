@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Order Information</h1>
@stop

@section('content')
<div class="card" style="margin-top: 3rem;">
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
<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTable" class="table">
            <thead class=" text">
              <tr>
                <th>Gallery Item</th>
                <th>Price</td>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order_details as $order)
              <td><img src="{{URL::to('/')}}/images/{{ $order->image }}" class="img-thumbnail" width="150px"
                        height="100px" alt="Image" />
                </td>
              <td>{{$order->price}}-kyats</td>
              <td>{{$order->status}}</td>
              <td>{{ Carbon\Carbon::parse($order->created_at)->format('jS, M, Y')}}</td>
            
              </tr>
              @endforeach
            </tbody>
          </table>
            <h6>Total Quantity : <strong> {{$count}} </strong> </h6>
            <h6>Total Price: <strong> {{$total}}- kyats </strong> </h6>
            <h6>Payment Method : <strong> COD </strong> </h6>
        </div>
      </div>
      <div class="footer">
        <h5><strong>Status Update</strong></h5>
        <form action="{{route('order.update', $order->id)}}" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group col-sm-6">
                <select name="status" class="form-control">
                  <option value="pending">Pending</option>
                  <option value="delivered">Delivered</option>
                  <option value="none">None</option>
                </select>
            </div>
              <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Update</button>
        </form>
      </div>
      <div class="modal-footer">
            <a href="{{url('admin/order')}}" class="btn btn-secondary">Close</a>
          </div>
    </div>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop