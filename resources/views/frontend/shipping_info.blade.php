@extends('layout.app')

@section('title','Shipping Info')

@section('content')

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h3 style="text-align: center; color: #343352; margin-top: 1rem;">Shipping Address</h3>
  
        <form action="/address/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Phone</label>
              <input class="form-control @error('title') @enderror" 
              type="text" name="phone" value="{{Auth::user()->phone}}">
              @error('phone')
              <p class="help is-danger" style="color: red;">{{$errors->first('phone')}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address</label>
              <input class="form-control @error('address') @enderror" 
              type="text" name="address" value="{{Auth::user()->address}}">
              @error('address')
              <p class="help is-danger" style="color: red;">{{$errors->first('address')}}</p>
              @enderror
            </div>

             <div class="form-group">
              <input type="checkbox" name="payment_method" value=1 checked>
              Cash on Delivery
            </div>
          
            <div class="checkout_btn_inner d-flex align-items-center" style="float:right; margin: 0.5em 0;">
              <button type="submit" class="button">Proceed to payment</button>
            </div>
            
        </form>

      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

@endsection
