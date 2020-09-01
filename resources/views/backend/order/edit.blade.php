@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Order Update</h1>
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

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="modal-body">
          <form action="{{route('order.update', $orders->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Customer Name:</label>
              <input type="text" name="name" class="form-control" value="{{$orders->user->name}}" readonly>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Total Amount:</label>
              <input type="text" name="total" class="form-control" value="{{$orders->total}}" readonly>
            </div>
            <div class="form-group">
              <label class="col-sm-12">Status</label>
                <select name="status" class="form-control">
                  <option value="pending">Pending</option>
                  <option value="delivered">Delivered</option>
                  <option value="none">None</option>
                </select>    
            </div>
            <div class="modal-footer">
              <a href="{{url('admin/order')}}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          </div>
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