@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Add Gallery</h1>
@stop

@section('content')

<style>

.card-footer {
  background: none;
}

a{
  color:black;
}

a:hover {
    color: #ffffff !important;
    text-decoration: none;
}
</style>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
  @endif

  <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('gallery.create') }}"> 
    Create New Gallery
  </a>
       <br>

    <div class="container" style="margin-top: 20px;">
      <div class="row justify-content-center">
         @foreach($galleries as $gallery)
          <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <img class="card-img-top" src="{{URL::to('/')}}/images/{{ $gallery->image }}"alt="Card image">
            <div class="card-body">
              <center><h4>{{$gallery->title}}</h4></center>
              <center><h6>{{ number_format($gallery->price) }} kyats</h6></center>
            </div>
            <div class="card-footer">
              <div class="stauts">
                @if($gallery->sold_out == 1)
                    <button class="btn btn-success" style="margin-bottom: 10px;">Unsold</button>
                @else
                  <button class="btn btn-danger" style="margin-bottom: 10px;">Sold Out</button>
                @endif
                {{--  @if($gallery->sold_out == 1)
                    <button class="btn btn-outline-danger" style="float: right;;">
                      <a href="{{URL::to('admin/sold_out/gallery/'.$gallery->id)}}">Sold Out</a>
                    </button>
                  @endif --}}
              </div>
              <div class="button" style="float:right;">
                <a href="{{ route('gallery.edit',$gallery->id) }}" class="btn btn-success edit" style="display: inline-block;">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('gallery.destroy',$gallery->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger" >
                    <i class="far fa-trash-alt"></i>
                    </button>
                </form>
              </div>
            </div>

          </div>
         @endforeach
      </div>
      <ul class="pagination" style="float:right;">
        <li>{{$galleries->links()}}</li>
      </ul>
      <h6>Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} Total:{{$galleries->total()}}</h6>
      
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop