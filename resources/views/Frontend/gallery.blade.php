@extends('Layout.app')

@section('title','Gallery')
@section('content')
<style>
  .gallery{
  background-image: url(images/portfolio-bg.jpg);
    background-repeat: repeat;
    background-position: center center;
    background-size: cover;
  

}
</style>
<div class="site-section">
 <div class="container">

    <div class="col-lg-12">
        <div class="pull-right">
            <div class="filter-buttons">
                <div class="list-view-button d-none d-sm-block" id="list"><i class="fa fa-bars" aria-hidden="true"></i> List view</div>
                <div class="grid-view-button d-none d-sm-block d-md-block" id="grid"><i class="fa fa-th-large" aria-hidden="true"></i> Grid view</div>
            </div>
        </div>
    </div>

    {{-- 
        <div class="item col-lg-4">
            <div class="img-event">
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="grid">
                        <figure class="effect-ruby">
                          <a href="./frontend/images/IMG_8128-3.jpg">
                            <img class="group list-group-image img-fluid" src="./frontend/images/IMG_6623.JPG"  style="width:330px;height:400px;" alt=""/>
                          </a>
                        </figure>
                    </div>
                </div>
          </div>
        </div>  --}}

    <div id="products" class="row view-group">

        <div class="item col-lg-4 col-md-6">
            <div class="img-event">
                <div class="frame">
                    <div class="grid">
                       
                          <a href="./frontend/images/IMG_8128-3.jpg">
                            <img class="group list-group-image img-fluid" src="./frontend/images/IMG_8128-3.jpg" alt=""/>
                          </a>
                        
                    </div>
                </div>
            </div>
            <h2 class="recent"><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>

        <div class="item col-lg-4 col-md-6">
          <div class="img-event">
                <div class="frame">
                    <div class="grid">
                        
                          <a href="./frontend/images/IMG_8128-3.jpg">
                              <img class="group list-group-image img-fluid" src="./frontend/images/IMG_1392.JPG" alt=""/>
                          </a>
                       
                    </div>
                </div>
          </div>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>

        <div class="item col-lg-4 col-md-6">
          <div class="img-event">
                <div class="frame">
                    <div class="grid">
                      
                          <a href="./frontend/images/IMG_8128-3.jpg">
                              <img class="group list-group-image img-fluid" src="./frontend/images/IMG_2605.JPG" alt=""/>
                          </a>
                        
                    </div>
                </div>
          </div>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>   

        <div class="item col-lg-4 col-md-6">
          <div class="img-event">
                <div class="frame">
                    <div class="grid">
                        
                          <a href="./frontend/images/IMG_8128-3.jpg">
                              <img class="group list-group-image img-fluid" src="./frontend/images/IMG_3532.JPG" alt=""/>
                          </a>
                        
                    </div>
                </div>
          </div>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>   

        <div class="item col-lg-4 col-md-6">
          <div class="img-event">
                <div class="frame">
                    <div class="grid">
                        
                          <a href="./frontend/images/IMG_8128-3.jpg">
                              <img class="group list-group-image img-fluid" src="./frontend/images/IMG_9186.JPG" alt=""/>
                          </a>
                       
                    </div>
                </div>
          </div>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>   

        <div class="item col-lg-4 col-md-6">
          <div class="img-event">
                <div class="frame">
                    <div class="grid">
                        
                          <a href="./frontend/images/IMG_8128-3.jpg">
                              <img class="group list-group-image img-fluid" src="./frontend/images/IMG_6623.JPG" alt=""/>
                          </a>
                       
                    </div>
                </div>
          </div>
            <h2><a href="single.html" class="recent-image-title">Yangon Downtown View</a></h2>
        </div>   

    </div>{{-- row view-group --}}

                         
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