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
                <div class="col-lg-4 mt-5 d-none d-md-block">
                    @include('frontend.profile.menu')
                   
                </div>
                <div class="col-lg-8 mt-5">
                    <h6>Hello <span style="color: #343352; font-weight: bold;"> {{Auth::user()->name}}</span> 
                        (not {{Auth::user()->name}} ? 
                        <a  style="color: #343352;" href="{{ route('logout') }}">{{ __('log out') }}</a> )
                    </h6>
                     <h6>
                        From your account dashboard you can view your recent orders, edit your password and account details.
                    </h6>
                    <div class="form mx-auto">
                        <form name="form1" id="form1" action="/profile/create" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @php
                            $township_names = DB::table('addresses')->get();
                        @endphp

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Township</label>
                            <select id="Search" type="text" name="township" class="form-control @error('township') @enderror">
                                <option value="">Select an option</option>
                                    @foreach($township_names as $township_name)
                                    <option value="{{$township_name->township}}">{{$township_name->township}}</option>
                                    @endforeach
                            </select>
                                @error('township')
                                    <p class="help is-danger" style="color: red;">{{$errors->first('township')}}</p>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Street Address</label>
                            <input class="form-control @error('address') @enderror" 
                            type="text" name="address" value="{{Auth::user()->address}}" placeholder="11, Pyay Road, 4 Quarter" autocomplete="off">
                                @error('address')
                                    <p class="help is-danger" style="color: red;">{{$errors->first('address')}}</p>
                                @enderror
                        </div>
                            <button type="submit" class="purple-button">Save Address</button>
                    </div>{{-- form --}}
                   
                </div>
            </div>
        </div>
    </section>
    
       
@endsection

@section('scripts')

@endsection
