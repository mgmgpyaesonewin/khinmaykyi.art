@extends('layout.app')

@section('title','Gallery')

@section('content')
  
  <div class="container" style="padding: 40px;">

    <div class="row">

      <div class="pull-left">
        <div class="filter-buttons">
          <div class="list-view-button d-none d-lg-block d-lg-none" id="list">
            <i class="fa fa-bars" aria-hidden="true"></i> 
            List view
          </div>   
          <div class="grid-view-button d-none d-lg-block d-lg-none" id="grid">
            <i class="fa fa-th-large" aria-hidden="true"></i> Grid view
          </div>
        </div>
      </div>

        <div id="products" class="card-columns view-group">
          @foreach($galleries as $gallery)
          <div class="item card card-override">
            <div class="img-event">
              <div class="frame">
                <div class="grid">
                  <a href="{{url('gallery_detail',$gallery->id)}}">
                  <img class="class=" card img-responsive" src="{{URL::to('/')}}/images/{{ $gallery->image }}" style="width: 100%; height: 100%;"alt="" />
                  </a>
                </div>{{-- grid --}}
              </div>{{-- frame --}}
            </div>{{-- img-event --}}
              <h2 class="recent"><a href="single.html" class="recent-image-title">{{$gallery->title}}</a></h2>
          </div>{{-- item --}}
          @endforeach
        </div>{{-- row view-group --}}

      <div class="background" style="float:right;">
        <div class="transbox" style="margin-bottom: 40px;">
          <ul class="pagination">
            <li>{{$galleries->links()}}</li>
          </ul>
          Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} Total:{{$galleries->total()}}
        </div>
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
              $('#products .item').removeClass('card card-override').addClass('col-lg-4 col-md-6 list-group-item');
            });

            $('#grid').click(function (event) {
              event.preventDefault();
              $('#products').removeClass('row').addClass('card-columns');
              $('#products .item').removeClass('col-lg-4 col-md-6 list-group-item').addClass('card card-override');
            });
        });

</script>

@endsection