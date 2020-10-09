@extends('layout.app')

@section('title','Gallery')

@section('content')

  <div class="page-header text-center" style="background-image: url('./frontend/images/page-header-bg.jpg');">
    <div class="container">
      <h3 class="page-title">List</h3>
      <span>Gallery</span>
    </div><!-- End .container -->
  </div>

  <div class="container" style="padding: 40px;">

    <div class="row">

      <div class="pull" style="margin: 0 auto;">
        <div class="filter-buttons">
          <div class="list-view-button d-none d-lg-block d-lg-none" id="list">
            <i class="fas fa-square"></i> <i class="fas fa-square"></i> view
          </div>   
          <div class="grid-view-button d-none d-lg-block d-lg-none" id="grid">
           <i class="fas fa-square"></i> <i class="fas fa-square"></i> <i class="fas fa-square"></i> view
          </div>
        </div>
      </div>

        <div id="products" class="card-columns view-group">
          @foreach($galleries as $gallery)
          <div class="item card card-override" style="background:none;">
            <div class="img-event">
              <div class="frame">
                <div class="grid">
                  <a href="{{url('gallery_detail',$gallery->id)}}">
                  <img class="img-responsive" src="{{URL::to('/')}}/images/{{ $gallery->image }}" style="width: 100%; height: 100%;" alt="" />
                  </a>
                </div>{{-- grid --}}
              </div>{{-- frame --}}
            </div>{{-- img-event --}}
              <p style="font-size: 16px; margin-bottom: 1rem; text-align: center; margin-top: 1rem;"><a href="single.html" class="gallery_title">{{$gallery->title}}</a></p>
          </div>{{-- item --}}
          @endforeach
        </div>{{-- row view-group --}}

        <div class="transbox" style="margin: 0 auto;">
          <ul class="pagination">
            <li>{{$galleries->links()}}</li>
          </ul>
          <p>
            Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} &nbsp; Total:{{$galleries->total()}}
          </p>
        </div>
    
    </div>

  </div>


@endsection

@section('scripts')

<script>
  $(document).ready(function() {
            $('#list').click(function (event) {
              event.preventDefault();
              $('#products').removeClass('card-columns').addClass('row');
              $('#products .item').removeClass('card card-override').addClass('col-lg-4 col-md-6 col-sm-6 col-6 list-group-item');
            });

            $('#grid').click(function (event) {
              event.preventDefault();
              $('#products').removeClass('row').addClass('card-columns');
              $('#products .item').removeClass('col-lg-4 col-md-6 col-sm-6 col-6 list-group-item').addClass('card card-override');
            });
        });

</script>

@endsection