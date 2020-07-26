@extends('layout.app')

@section('title','Gallery')
@section('content')

<style>
.gallery{
  background-image: url(images/portfolio-bg.jpg);
  background-repeat: repeat;
  background-position: center center;
  background-size: cover;
}
.grid img{
  width:100%;
 height:100%;
}


</style>

<div class="site-section">
 <div class="container">
      <div class="row">
        <div class="pull-right">
            <div class="filter-buttons">
                <div class="list-view-button d-none d-lg-block d-lg-none" id="list"><i class="fa fa-bars" aria-hidden="true"></i> List view</div>
                <div class="grid-view-button d-none d-lg-block d-lg-none" id="grid"><i class="fa fa-th-large" aria-hidden="true"></i> Grid view</div>
            </div>
        </div>
      </div>

      <div id="products" class="row view-group">
        @foreach($galleries as $gallery)
          <div class="item col-lg-4 col-md-6">
            <div class="img-event">
              <div class="frame">
               <div class="grid">
                    <a href="./frontend/images/IMG_8128-3.jpg">
                   {{--  <img class="group list-group-image img-fluid" src="{{URL::to('/')}}/images/{{ $gallery->image }}"alt=""/> --}}
                     <img class="class="card img-responsive" src="{{URL::to('/')}}/images/{{ $gallery->image }}"alt=""/>
                  </a>   
                </div>{{-- end grid --}}
              </div>{{-- end frame --}}
            </div>{{-- end img-event --}}
            <h2 class="recent"><a href="single.html" class="recent-image-title">{{$gallery->title}}</a></h2>
          </div>{{-- end item --}}
        @endforeach
      </div>{{-- row view-group --}}

      <div class="background" style="float:right;">
        <div class="transbox">
          <ul class="pagination">
            <li>{{$galleries->links()}}</li>
          </ul>
         {{--  Page:{{$galleries->currentpage()}}-{{$galleries->lastpage()}} Total:{{$galleries->total()}} --}}
        </div>
      </div>{{-- end background --}}
                         
  </div> {{-- container --}}   
</div>{{-- site-section --}}

@endsection

@section('scripts')


<script>
  $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
</script>

@endsection