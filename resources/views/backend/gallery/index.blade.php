@extends('adminlte::page')

@section('title', 'Dashboard Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')


  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
      <p class="message" style="color: #117f36;">{{$message}}</p>
    </div>
  @endif

  @if ($message = Session::get('status'))
    <div class="alert alert-success" role="alert">
      <p class="message" style="color: #f98e97;">{{$message}}</p>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
      <p class="message" style="color: #f98e97;">{{$message}}</p>
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

    </div>{{-- row --}}
  </div>{{-- container --}}

  <div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
      @foreach($galleries as $gallery)
        <div class="card-deck">
          <div class="card m-3" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::to('/')}}/images/{{ $gallery->image }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" style="color: #fc846b; font-size: 1.2rem;"> {{ $gallery->title }} </h5>
                <p class="card-text"> K{{ number_format($gallery->price) }} </p>
                {{-- <p class="card-text"> {!! Str::limit($gallery->detail, 50) !!} </p> --}}
              </div>
              <div class="card-footer">
                 <small class="text-muted">
                    @if($gallery->sold_out == 1)
                      <label style="color: green; margin-bottom: 10px;">Unsold</label>
                    @else
                      <label style="color: red; margin-bottom: 10px;">Sold Out</label>
                    @endif
                 </small>
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
        </div>
      @endforeach
    </div>
  </div>

  <div class="d-flex justify-content-center pagination">
    {{$galleries->links()}}
  </div>
  <div class="d-flex justify-content-center pagination">
    <h6>Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} Total:{{$galleries->total()}}</h6>
  </div>
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop