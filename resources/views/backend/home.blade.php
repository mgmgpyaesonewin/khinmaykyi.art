@extends('adminlte::page')
{{-- vendor/adminlte --}}

@section('title', 'Dashboard')

@section('content_header')

@stop

<style>

</style>

@section('content')
    <h3 style="color:#74ACD0;">Welcome to this beautiful admin panel.</h3>
    <div class="center">
        <div class="container">
            <div class="box_container full">
			<h4>Total Summary</h4>
                <div class="row">

                    <div class="col-sm-12-12 col-md-6 col-lg-3">
                        <div class="card dashboard_card" style="background:linear-gradient(135deg, #ff875e 1%, #fc629d 100% ">
                            <div class="card_one">
                                <i class="icon fa fa-users fa-4x" style=" color: #F697BB;"></i>
                                <div class="card-content">
                                    <p class="title" style="font-size: 20px;">Total Customers</p>
                                    <p class="count" style="font-size: 25px;">{{$total_customer}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- col -->

                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card dashboard_card" style="background:linear-gradient(135deg, #3bd1bf 0%, #119bd2 100% "> 
                            <div class="card_two">              
                                <i class="icon fa fa-shopping-cart fa-4x" style=" color: #7BC5E2;" ></i>
                                <div class="card-content">
                                    <p class="title" style="font-size: 20px;">Total Orders</p>
                                    <p class="count"style="font-size: 25px;">{{$total_order}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- col -->
                
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card dashboard_card" style="background:linear-gradient(135deg, #ee70e9 0%, #8363f9 100% ">
                            <div class="card_three">
                                <i class="icon fas fa-image fa-4x" style=" color: #C199F9;" ></i>
                                <div class="card-content">
                                    <p class="title" style="font-size: 20px;">Total Galleries</p>
                                    <p class="count" style="font-size: 25px;">{{$total_gallery}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- col -->
                

                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card dashboard_card" style="background:linear-gradient(135deg, #f7cd13 1%, #39ce86 100%">
                            <div class="card_three">
                                <i class="icon far fa-money-bill-alt fa-4x" style=" color: #85DCA1;" ></i>
                                <div class="card-content">
                                    <p class="title" style="font-size: 20px;">Total Sales</p>
                                    <p class="count" style="font-size: 25px;">{{number_format($total_sale)}} kyats</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- col -->

                </div><!-- row -->
            </div><!-- box -->
        </div><!-- container -->
    </div> <!-- center -->
            
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop