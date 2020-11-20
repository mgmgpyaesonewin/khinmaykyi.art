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


  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
      <p class="message" style="color: #117f36;">{{$message}}</p>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
      <p class="message" style="color: #f98e97;">{{$message}}</p>
    </div>
  @endif


<div class="container">
  <div class="row">
    <div class="col">
      <div class="card" style="width: 100%;">
        <div class="card-body">
            @if($orders->isEmpty())
                <h3 style="text-align: center; color: #fc846b;">Our site didn't receive now.</h3>
                @else
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
                <tr>
                  <td> {{$order->user->name}} </td>
                  <td> K{{ number_format($order->total) }} </td>
                  <td> {{$order->status}} </td>
                  <td> COD </td>
                  <td> {{ $order->order_date}} </td>
                  <td>
                    <div class="inner">
                      <a href="{{ route('order.show',$order->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
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
                @endif
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
  <div class="d-flex justify-content-center pagination">
    {{$orders->links()}}
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop