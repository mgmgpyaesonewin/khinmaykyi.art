@extends('layout.app')

@section('title','My Profile')

@section('content')
<br>
    <div class="container">  
        <ol class="breadcrumb breadcrumb-right-arrow">
            <li class="breadcrumb-item">
                <a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item active">Personal info</li>
        </ol>
    </div>
    
       <section id="dashboard">
        <div class="container">
            <div class="row" style="padding-left:50px; padding-bottom: 20px;">
                <h6>Hello <span style="color: #343352; font-weight: bold;"> {{Auth::user()->name}}</span> 
                     (not {{Auth::user()->name}} ? 
                     <a  style="color: #343352;" href="{{ route('logout') }}">{{ __('log out') }}</a> )
                </h6>
            </div>
                <h6 style="padding-left:40px; padding-bottom: 20px;">
                    From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.
                </h6>
        </div>

        <div class="container">
            <div class="row text-center">
            
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                 <i class="profile-icon fas fa-calendar-week fa-3x mb-2"></i>
                                <h5 class="card-title profile-title">ORDERS</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                  <i class="profile-icon fa fa-heart fa-3x mb-2"></i>
                                <h5 class="card-title profile-title">WISHLISTS</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                <i class="profile-icon fas fa-address-card fa-3x mb-2"></i>
                                <h5 class="card-title profile-title">ADDRESS</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mx-auto shadow p-3 mb-5 bg-white rounded profile-card">
                            <div class="card-body text-center">
                                <i class="profile-icon fas fa-key fa-3x mb-2"></i>
                                <h5 class="card-title profile-title">PASSWORD</h5>
                            </div>
                        </div>
                    </div>
                     
            </div>
        </div>

       </section>

                 
        </div>{{-- row --}}
    </div>{{-- container --}}

@endsection

@section('scripts')

@endsection
