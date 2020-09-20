@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
  @endif

  <div class="container">
    <div class="row">

      <div class="col-lg-6">
        <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('gallery.create') }}"> 
          Create New Gallery
        </a>
      </div>
     
      <div class="col-lg-4">{{-- search-box --}}         
        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="{{url('admin/gallery_search')}}" autocomplete="off">
          <button type="submit" class="btnsearch">
            <i class="fas fa-search" style="color: #17a2b8;" aria-hidden="true"></i>
          </button>
          <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
          id="search_input" name="searchData"  aria-label="Search">
        </form>
      </div>

    </div>
  </div>

    <div class="container" style="margin-top: 20px;">
      <div class="row justify-content-center">
         @if(count($galleries)>0)
            
         @foreach($galleries as $gallery)
          <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <img class="card-img-top" src="{{URL::to('/')}}/images/{{ $gallery->image }}"alt="Card image">
                @if($gallery->sold_out == 1)
                  <label class="stauts" style="color: green;">Unsold</label>
                @else
                  <label class="status" style="color: red;">Sold Out</label>
                @endif
            <div class="card-body">
              <center><h4>{{$gallery->title}}</h4></center>
              <center><h6>{{ number_format($gallery->price) }} kyats</h6></center>
            </div>
            <div class="card-footer" style="background: none;">
              <div class="stauts">
               
               {{--   @if($gallery->sold_out == 1)
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
         @endif
      </div>
      <ul class="pagination" style="float:right;">
        <li>{{$galleries->links()}}</li>
      </ul>
      
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop