@extends('layout.app')

@section('title','Gallery')
@section('content')

<style>
  .gallery {
    background-image: url(images/portfolio-bg.jpg);
    background-repeat: repeat;
    background-position: center center;
    background-size: cover;
  }

  .grid img {
    width: 100%;
    height: 100%;
  }

  .card-override {
    background-color: #f7f7f7;
    border: none;
  }

  .list-group-item {
    background-color: #f7f7f7;
  }
  .site-section{
    padding:40px;
  }
</style>

<div class="site-section">
  <div class="container">
    <div class="row">

      <div class="pull-left">
        <div class="filter-buttons">
          <div class="list-view-button d-none d-lg-block d-lg-none" id="list"><i class="fa fa-bars"
              aria-hidden="true"></i> List view</div>
          <div class="grid-view-button d-none d-lg-block d-lg-none" id="grid"><i class="fa fa-th-large"
              aria-hidden="true"></i> Grid view</div>
        </div>
      </div>
    
    <div id="products" class="card-columns view-group">
      @foreach($galleries as $gallery)
      <div class="item card card-override">
        <div class="img-event">
          <div class="frame">
            <div class="grid">
              <a href="{{url('gallery_detail',$gallery->id)}}">
                <img class="class=" card img-responsive" src="{{URL::to('/')}}/images/{{ $gallery->image }}" alt="" />
              </a>
            </div>{{-- end grid --}}
          </div>{{-- end frame --}}
        </div>{{-- end img-event --}}
        <h2 class="recent"><a href="single.html" class="recent-image-title">{{$gallery->title}}</a></h2>
      </div>{{-- end item --}}
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