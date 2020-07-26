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
            <input type="file" name="image" class="custom-file-input" />
            <label class="custom-file-label">Choose Image</label>
          </div>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Title:</label>
          <input type="text" name="title" class="form-control">
        </div>   
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
@stop