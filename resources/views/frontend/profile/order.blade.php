@extends('layout.app')

@section('title','My Order')

@section('content')

    <div class="page-header text-center" style="background-image: url('./frontend/images/page-header-bg.jpg');">
        <div class="container">
          <h3 class="page-title">Account</h3>
        </div><!-- End .container -->
    </div>

    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 mt-5 d-none d-md-block">
                    @include('frontend.profile.menu')
                   
                </div>
                <div class="col-lg-8 col-md-8 mt-5">
                    <h6>Hello <span style="color: #343352; font-weight: bold;"> {{Auth::user()->name}}</span> 
                        (not {{Auth::user()->name}} ? 
                        <a  style="color: #343352;" href="{{ route('logout') }}">{{ __('log out') }}</a> )
                    </h6>
                     <h6>
                        From your account dashboard you can view your recent orders, edit your password and account details.
                    </h6>
                    @if(empty($profile_order))
                    <div class="no-order-box">
                       <a class="return-gallery" href="/gallery"> 
                        <u>Return To Gallery</u>
                    </a>     
                        &nbsp;
                            No order has been made yet.

                    </div>
                    @else
                     <div class="table-responsive" style="margin-top: 2rem;">
                    <table class="table">
                        <thead class="theader">
                            <tr>
                                <th scope = "col" class="thead"> ORDER </th>
                                <th scope = "col" class="thead"> DATE </th>
                                <th scope = "col" class="thead"> STATUS </th>
                                <th scope = "col" class="thead"> SUB-TOTAL </th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach ($profile_orders as $profile_order)
                            <tr>
                                <td class="tdata" >
                                    <img src="{{URL::to('/')}}/images/{{$profile_order->image}}"  class="img-thumbnail" width="100px" height="100px" alt="Image"/>
                                </td>
                                <td class="tdata" > {{ Carbon\Carbon::parse($profile_order->created_at)->format('jS, M, Y') }} </td>
                                <td  class="tdata">{{$profile_order->status}}</td>
                                <td  class="tdata"> K{{ number_format($profile_order->total) }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <strong> Toal Payment:  K{{number_format($sum_order)}}</strong>
                
                </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    

   
@endsection

@section('scripts')

@endsection
