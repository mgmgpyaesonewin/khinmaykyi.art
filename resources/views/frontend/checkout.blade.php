@extends('layout.app')

@section('title','Checkout-Gallery')

@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"> --}}
<!--================Checkout Area =================-->

  <section class="checkout_area section_gap">
    <div class="container">
      <div class="row">

        <div class="col-lg-7 col-md-7 col-12">
        <h3 style="text-align: left; color: #343352; margin-top: 1rem;">CONTENT INFO</h3>
          
          <div class="form mx-auto">
            <form name="form1" id="form1" action="/order_confirm" method="POST" enctype="multipart/form-data">  
              @csrf

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Full name</label>
                  <input class="form-control @error('name') @enderror" 
                  type="text" name="phone" value="{{Auth::user()->name}}" autocomplete="off">
                    @error('name')
                      <p class="help is-danger" style="color: red;">{{$errors->first('name')}}</p>
                    @enderror
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email address</label>
                  <input class="form-control @error('email') @enderror" 
                  type="text" name="phone" value="{{Auth::user()->email}}" autocomplete="off">
                    @error('email')
                      <p class="help is-danger" style="color: red;">{{$errors->first('email')}}</p>
                    @enderror
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phone number</label>
                  <input class="form-control @error('phone') @enderror" 
                  type="text" name="phone" value="{{Auth::user()->phone}}" autocomplete="off">
                    @error('phone')
                      <p class="help is-danger" style="color: red;">{{$errors->first('phone')}}</p>
                    @enderror
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Township</label>
                  @if(empty(Auth::user()->township))
                    <select id="Search" type="text" name="township" class="form-control @error('township') @enderror">
                      <option value="">Select an option</option>
                        @foreach($township_names as $township_name)
                          <option value="{{$township_name->township}}">{{$township_name->township}}</option>
                        @endforeach
                    </select>
                      @error('township')
                        <p class="help is-danger" style="color: red;">{{$errors->first('township')}}</p>
                      @enderror
                  @else
                    <input type="text" name="township" value=" {{Auth::user()->township}} " class="form-control">
                  @endif
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Street Address</label>
                  <input class="form-control @error('address') @enderror" 
                  type="text" name="address" value="{{Auth::user()->address}}" placeholder="11, Pyay Road, 4 Quarter" autocomplete="off">
                @error('address')
                  <p class="help is-danger" style="color: red;">{{$errors->first('address')}}</p>
                @enderror
              </div>

          </div>{{-- form --}}
        </div>{{-- col-lg-7 --}}
    
        <div class="col-lg-5 col-md-5 col-12">
          <div class="card mx-auto order-summary-card">
            <div class="card-body">
              <p class="order-summary-title" style="">Order Summary</p>
                <table class="table">
                  <thead class="theader">
                    <tr></tr>
                  </thead>
                  <tbody class="tbody">
                    @foreach ($cart_items as $cart_item)
                      <tr>
                        <td class="tdata text-muted" style="border-top: none;">
                          <img src="{{URL::to('/')}}/images/{{$cart_item->gallery->image}}"  class="img-thumbnail" 
                          width="100px" height="100px" alt="Image"/>
                        </td>
                        <td class="tdata text-muted" style="border-top: none;"> 
                          {{$cart_item->gallery->title}}
                          <br>
                          K{{ number_format($cart_item->gallery->price) }}
                        </td>
                      </tr>
                    @endforeach
                      <tr class="total-row">
                        <td class="tdata" style="height: 50px;" >
                         Total : 
                        </td>
                         <td class="tdata" style="height: 50px;" >
                         K{{ number_format($total) }}
                        </td>
                      </tr>
                  </tbody>
                </table>

                <p class="text-muted">
                  <input type="radio" name="payment_method" value=1 id="cash_on_delivery">
                    Cash on Delivery
                </p>
          
                <p class="text-muted">
                  <input type="checkbox" class="filled-in" value="1" id="terms_and_conditions" />
                  I have read and agree to the website terms and conditions *
                </p>

                <div class="checkout_btn_inner d-flex align-items-center" style="float:right; margin: 0.5em 0;">
                  <button type="submit" class="pink-button" id="submit_button" disabled>Place Order</button>
                </div>
              </form>
            </div>{{-- card-body --}}
          </div>{{-- card --}}
        </div>{{-- col-lg-5 --}}

        </div>{{-- row --}}
    </div>{{-- container --}}
  </section>

@endsection

@section('scripts')

<script>
  $('#cash_on_delivery','#terms_and_conditions').click(function(){
    //If the checkbox is checked.
    if($(this).is(':checked')){
        //Enable the submit button.
        $('#submit_button').attr("disabled", false);
    } else{
        //If it is not checked, disable the button.
        $('#submit_button').attr("disabled", true);
    }
});
</script>
<script>
  $('#terms_and_conditions').click(function(){
    //If the checkbox is checked.
    if($(this).is(':checked')){
        //Enable the submit button.
        $('#submit_button').attr("disabled", false);
    } else{
        //If it is not checked, disable the button.
        $('#submit_button').attr("disabled", true);
    }
});
</script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script> --}}
<script>
$("#Search").chosen({no_results_text: "Oops, nothing found!"}); 
</script>

@endsection
