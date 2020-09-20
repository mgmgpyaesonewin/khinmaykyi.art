@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Order Information</h1>
@stop

@section('content')

  <div class="card" style="margin-top: 1rem; margin-bottom: 1rem;">
    <div class="card-body">
      <div class="row">
          <div class="col-6">
            <h5 class="card-title"><strong>Customer Information</strong></h5><br><hr>
            <p> Name : {{($order->user->name)}} </p>
            <p> E-mail : {{($order->user->email)}} </p>
          </div>
          <div class="col-6 border-left">
            <h5 class="card-title"><strong>Shipping Address</strong></h5><br><hr>
            <p> Address : {{$order->user->address}} </p>
            <p>Phone no : {{$order->user->phone}}</p>
          </div>
         
      </div>
    </div>
  </div>

      <div class="row">
        <div class="col">
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
                    <tr>
                      <td>
                        <img src="{{URL::to('/')}}/images/{{ $order->image }}" class="img-thumbnail" width="150px"
                        height="100px" alt="Image" />
                      </td>
                      <td>{{ number_format($order->price) }} kyats</td>
                      <td>{{$order->status}}
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" style="outline:none; border:none;background-color: transparent;">
                        <i class="far fa-edit" style="color:black;"></i>
                        </button>
                      </td>
                      <td>{{ Carbon\Carbon::parse($order->created_at)->format('jS, M, Y')}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <h6>Total Quantity : <strong> {{$count}} </strong> </h6>
                <h6>Total Price: <strong> {{ number_format($total) }}-kyats </strong> </h6>
                <h6>Payment Method : <strong> COD </strong> </h6>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('order.update', $order->id)}}" method="POST" class="text-center"> 
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <select name="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="delivered">Delivered</option>
                        <option value="none">None</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
                </div>
              </div>
             </div>
          
            <div class="modal-footer" >
              <a href="{{url('admin/order')}}" class="btn btn-secondary" >Close
              </a>
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