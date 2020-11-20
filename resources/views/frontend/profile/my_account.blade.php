@extends('layout.app')

@section('title','My Profile')

@section('content')
<style>
   *:focus {
    outline: none;
}
</style>

<div class="page-header text-center" style="background-image: url('./frontend/images/page-header-bg.jpg');">
        <div class="container">
          <h3 class="page-title">Account</h3>
        </div><!-- End .container -->
    </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
      <p class="message" style="color: #117f36;">{{$message}}</p>
    </div>
  @endif

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
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Full name</label>
                        <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
                    </div>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email address</label>
                        <input class="form-control" type="email" value="{{Auth::user()->email}}" readonly>
                    </div>


                    <div class="update-password">
                        <fieldset style="margin-bottom: 20px; padding: 20px 40px; border: 2px solid #E6E6E6">
                        <legend style="width: inline;">UPDATE CHANGE</legend>

                            <form action="{{url('profile/change-password')}} " method="POST" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="method" value="PUT">
                                    <div class="form-group password{{$errors->has('oldPassword')?'has-error':''}}">
                                        <label class="password-label" for="oldPassword">Current Password </label>
                                        <input type="password" class="form-control password-input"  name="oldPassword" id="oldPassword" placeholder="Old Password">
                                        <span class="text-danger">{{$errors->first('')}}</span>
                                    </div>  
                                    <div class="form-group password {{$errors->has('')?'has-error':''}}">
                                        <label class="password-label" for="newPassword">New Password</label>
                                        <input type="password" class="form-control password-input" name="newPassword" id="newPassword" placeholder="New Password">
                                        <span class="text-danger">{{$errors->first('')}}</span>
                                    </div> 

                                    <button type="submit" class="purple-button float-right">Update Password</button>
                                </fieldset>
                            </form>
                    </div>


                    <div class="address-box mt-5">
                        @if(empty(Auth::user()->address))
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h3  class="d-inline" style="font-weight: 700;">SHIPPING ADDRESS</h3>
                            <a href="{{ url('profile/add') }}" class="icon-button d-inline" style="display: inline-block;">Add</a>
                            <p>You have not set up this type of address yet.</p>
                             
                        @else

                        <fieldset style="margin-bottom: 20px; padding: 20px 40px; border: 2px solid #E6E6E6">
                        <legend style="width: inline;">ADDRESS CHANGE</legend>
                            <form action="{{ url('profile/add') }}" method="POST" role="form">  
                            @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Township</label>
                                    <select id="Search" type="text" name="township" class="form-control @error('township') @enderror">
                                        <option value="{{Auth::user()->township}}" selected="selected">{{Auth::user()->township}}</option>
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

                                <button type="submit" class="purple-button float-right">Update Address</button>
                             <fieldset>
                            </form>
                
                        @endif
                    </div>{{-- address --}}
                  
                   
                </div>
            </div>
        </div>
    </section>
    

   
@endsection

@section('scripts')

@endsection
