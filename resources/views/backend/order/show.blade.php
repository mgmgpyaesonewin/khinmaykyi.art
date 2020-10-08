@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Order Information</h1>
@stop

@section('content')


  <div class="contaier">
    <div class="row">

      <div class="card" style="width: 100%;">
        <div class="row">
          <div class="col-6">
            <h5 class="title text-center"><strong>Customer Information</strong></h5><hr>
            <p> Name : {{($order->user->name)}} </p>
            <p> E-mail : {{($order->user->email)}} </p>
          </div>
          <div class="col-6 border-left">
            <h5 class="title text-center"><strong>Shipping Address</strong></h5><hr>
            <p> Address : {{$order->user->address}} </p>
            <p>Phone no : {{$order->user->phone}}</p>
          </div>
        </div>
      </div>

    </div>
  </div>


 <div class="row">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table">
                  <thead class="theader">
                    <tr>
                      <th class="thead">Gallery Item</th>
                      <th class="thead">Price</td>
                      <th class="thead">Status</th>
                      <th class="thead">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_details as $order)
                    <tr>
                      <td class="tdata">
                        <img src="{{URL::to('/')}}/images/{{ $order->gallery->image }}" class="img-thumbnail" width="150px"
                         alt="Image" style="text-align: center;vertical-align: middle;"/>
                      </td>
                      <td class="tdata">{{ number_format($order->gallery->price) }} kyats</td>
                      <td class="tdata">{{$order->order->status}}
                      </td>
                      <td class="tdata">{{ Carbon\Carbon::parse($order->created_at)->format('jS, M, Y')}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                 
                  <div class="card" style="width: 18rem;float:right;background-color: #F9F9F9;">
                    <div class="card-body">
                        <h6>Total Quantity : <strong> {{ count($order_details) }}  </strong> </h6>
                      <h6>Total Price: <strong> {{ number_format($total) }}-kyats </strong> </h6>
                      <h6>Payment Method: <strong> Cash on Delievery</strong></h6>
                        </div>
                    </div>
              
              </div>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                        <i class="far fa-edit" style="color:white;">Edit</i>
                        </button>
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