@extends('layout.app')

@section('title','Shipping Info')

@section('content')

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="Shipping-text">Shipping Address</h3>

        <form action="{{route('addtoadresss')}}" method="POST" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Phone</label>
              <input class="form-control @error('title') @enderror" 
              type="text" name="phone" value="{{old ('phone')}}">
              @error('phone')
              <p class="help is-danger" style="color: red;">{{$errors->first('phone')}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address</label>
              <input class="form-control @error('address') @enderror" 
              type="text" name="address" value="{{old ('phone')}}">
              @error('address')
              <p class="help is-danger" style="color: red;">{{$errors->first('address')}}</p>
              @enderror
            </div>

             <div class="form-group">
              <input type="checkbox" name="payment_method" value=1 checked>
              Cash on Delivery
            </div>

            <br>
            <div class="checkout_btn_inner d-flex align-items-center" style="float:right; margin: 0.5em 0;">
              <button type="submit" class="border_button">Proceed to payment</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

@endsection