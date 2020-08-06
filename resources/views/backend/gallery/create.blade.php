@extends('adminlte::page')

@section('title', 'Create Gallery')

@section('content_header')
    <h1>Add Gallery</h1>
@stop

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="Input-group">
          <div class="custom-file">
            <label class="custom-file-label">Choose Image</label>
            <input type="file" name="image" class="custom-file-input" />      
          </div>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Title:</label>
          <input type="text" name="title" class="form-control">
        </div>
         <div class="form-group">
          <label for="recipient-name" class="col-form-label">Price:</label>
          <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Detail:</label>
          <textarea id="editor" name="detail"></textarea>
        </div>
        <input type="checkbox" name="sold_out" value=1 checked>
        <br>
        <a href="{{url('admin/gallery')}}" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>{{-- col --}}
  </div>{{-- row --}}
</div>{{-- container --}}

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