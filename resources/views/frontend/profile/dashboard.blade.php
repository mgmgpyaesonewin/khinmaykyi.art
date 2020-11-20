@extends('layout.app')

@section('title','My Profile')

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
                 <div class="row text-center mt-4">
            
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                <a href="profile/order">
                                    <i class="profile-icon fas fa-calendar-week fa-3x mb-2"></i>
                                    <h5 class="card-title profile-title">ORDERS</h5>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                 <a href="/wishlist">
                                    <i class="profile-icon fa fa-heart fa-3x mb-2"></i>
                                    <h5 class="card-title profile-title">WISHLISTS</h5>
                               </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                <a href="/profile/account">
                                    <i class="profile-icon fas fa-address-card fa-3x mb-2"></i>
                                    <h5 class="card-title profile-title">PROFILE</h5>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                <a href="{{ route('logout') }}">
                                    <i class="profile-icon fas fa-key fa-3x mb-2"></i>
                                    <h5 class="card-title profile-title">LOGOUT</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                     
            </div>
                </div>
            </div>
        </div>
    </section>
    
       
@endsection

@section('scripts')

@endsection
