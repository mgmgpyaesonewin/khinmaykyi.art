@extends('layout.app')

@section('title','Detail')
@section('content')
<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="Shipping-text">Checkout</h3>
                        <form action="{{route('addtoadresss')}}" method="POST" enctype="multipart/form-data">
        @csrf
       
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Phone</label>
          <input type="text" name="phone" class="form-control">
        </div>
         <div class="form-group">
          <label for="recipient-name" class="col-form-label">Address</label>
          <input type="text" name="address" class="form-control">
        </div>
        <input type="checkbox" name="payment_method" value=1 checked>
        Cash on Delivery
        <br>
        <button type="submit" class="border_button">Proceed to payment</button>
      </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection