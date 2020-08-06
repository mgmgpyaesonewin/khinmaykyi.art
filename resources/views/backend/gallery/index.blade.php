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
  text-decoration:none;
  color:black;
}
a:hover{
  color:white;
}
  </style>

  	   <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('gallery.create') }}"> Create New Gallery</a>

  	   <br>
  
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 	<p>{{$message}}</p>
 </div>
 @endif


<div class="container" style="margin-top: 20px;">
   <div class="row justify-content-center">
        @foreach($galleries as $gallery)
        <div class="col-lg-4 col-md-6">
          <div class="divide">
        	<div class="card" style="width: 18rem;">
        		<img class="card-img-top" src="{{URL::to('/')}}/images/{{ $gallery->image }}"alt="Card image">
  				<div class="card-body">
            <h5>{{$gallery->title}}</h5>
    				<div class="card-footer2" style="display: inline-block">
                @if($gallery->sold_out == 1)
                <td>
                  <label class="badge-success">Unsold</label>
                </td>
                @else
                <td>
                  <label class="badge-danger">Sold Out</label>
                </td>
                @endif
            </div>
             <div class="card-footer" style="display: inline-block">
                @if($gallery->sold_out == 1)
              
                  <button class="btn btn-outline-danger">
                    <a href="{{URL::to('admin/sold_out/gallery/'.$gallery->id)}}">
                  Sold Out
                </a>
                </button>

               
                @else
              {{--   <td>
                  <button class="btn btn-outline-success">Unsold</button>
                </td> --}}
                @endif
            </div>
     			<div class="card-footer" style="display: inline-block">
            		<a href="{{ route('gallery.edit',$gallery->id) }}" class="btn btn-success">
            		<i class="fas fa-edit"></i>
            		</a>
        		</div>{{-- card-footer1 --}}
        		<div class="card-footer" style="display: inline-block">
            		<form action="{{ route('gallery.destroy',$gallery->id) }}" method="POST">
                		@csrf
                		@method('DELETE')
                	<button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                  	<i class="far fa-trash-alt"></i>
                	</button>
            		</form>
        		</div>{{-- card-footer --}}
				</div>{{-- card-body --}}
      		</div>{{-- end card --}}
        </div>
  		</div>{{-- end col --}}
      @endforeach
      		
	</div>{{-- end row --}}
  <div class="background" style="float:right;">
        <div class="transbox">
             <ul class="pagination">
            <li>{{$galleries->links()}}</li>
          </ul>
          Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} Total:{{$galleries->total()}}
        </div>
      </div>
</div>{{-- end container --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop