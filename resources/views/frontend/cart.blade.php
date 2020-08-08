@extends('layout.app')

@section('title','Cart')
@section('content')

<section class="cart_area">
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
<br>
    <h4>Shopping Cart</h4>

    @if($carts->isEmpty())
         <div class="alert" style="margin:5rem;">
            <h4>Sorry, Your cart not found</h4>
        </div>
           
    @else
              
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td><img src="{{URL::to('/')}}/images/{{ $cart->image}}"
                                    class="img-thumbnail" width="100px" height="100px" alt="Image" /></td>
                            <td>{{ $cart->title}}</td>
                            <td>{{ $cart->price}}</td>
                            <td>
                            <form action="{{ route('cart.destroy',$cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
                <strong>Total Quantity : </strong>{{$quantities}}
                <br>
                <strong>Total Price : </strong>{{ $total }} -kyats
                <br>

                <div class="checkout_btn_inner d-flex align-items-center" style="float:right">
                    <a class="border_button" href="{{url('/shipping_info')}}">Proceed To Checkout</a>  
                </div>
                <div class="checkout_btn_inner d-flex align-items-center" style="float:right">
                    <a class="border_button" href="{{-- {{url('/shipping_info')}} --}}">Continue Shopping</a>
                </div>
    @endif

            </div>{{-- table-responsive --}}

        </div>{{-- cart-inner --}}

    </div>{{-- container --}}
</section>

@endsection

@section('scripts')

@endsection