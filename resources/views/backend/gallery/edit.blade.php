@extends('adminlte::page')

@section('title', 'Edit Gallery')

@section('content_header')
    <h1>Edit Gallery</h1>
@stop

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{route('gallery.update', $galleries->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="modal-body">
        <img src="{{ URL::to('/')}}/images/{{$galleries->image}}" class="img-thumbnail" width="100" />
        <div class="input-group">
          <div class="custom-file">
            <label class="custom-file-label">Select Images</label>
            <input type="file" name="image" class="custom-file-input" value="{{$galleries->image}}">            
          </div>
        </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" name="title" class="form-control" value="{{$galleries->title}}">
          </div> 
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" name="price" class="form-control" value="{{$galleries->price}}">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Detail:</label>
             <textarea id="editor" name="detail">{{$galleries->detail}}</textarea>
          </div> 
            <input type="checkbox" name="sold_out" value=1 checked>
      </div>

      </div>
      <div class="modal-footer">
        <a href="{{url('admin/gallery')}}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
          

    </form>
  </div>{{-- end col --}}
</div>{{-- end row --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script> console.log('Hi!'); </script>
     <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then(editor => {
      console.log( editor );
    })
    .catch(error => {
      console.error( error );
    });
</script>

@stop
