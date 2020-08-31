@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Order</h1>
@stop

@section('content')
<style>
.inner{
  display: inline-block;
}
  .outter{
    width:100%;
    text-align: center;
  }
</style>

<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTable" class="table">
            <thead class=" text">
              <tr>
                <th>User Name</th>
                <th>Total Amount</td>
                <th>Status</th>
                <th>Order Date</th>
                <th>Payment</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <td>{{$order->user->name}}</td>
              <td>{{$order->total}}-kyats</td>
              <td>{{$order->status}}</td>
              <td>COD</td>
              <td>{{ Carbon\Carbon::parse($order->created_at)->format('jS, M, Y')}}</td>
              <td>
                  <div class="inner">
                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-primary">
                      <i class="fas fa-eye"></i>
                    </a>
                  </div>
                  <div class="inner">
                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-success">
                      <i class="fas fa-edit"></i>
                    </a>
                  </div>
                  <div class="inner">
                    <form action="{{ route('order.destroy',$order->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>  
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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