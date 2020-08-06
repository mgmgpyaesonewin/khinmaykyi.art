<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Address;
use App\Order;
use App\Order_detail;
use App\Cart_item;

class FrontController extends Controller
{
    
    public function gallery()
    {
         $galleries = Gallery::orderBy('created_at', 'desc')->where('sold_out',1)->paginate(6);
        return view('frontend.gallery', compact("galleries"));
    }
    public function detailGallery($id)
    {
    	$galleries = Gallery::where('id', $id)
                	->first(); 
           
		return view('frontend.detail', compact('galleries'));
    }
    public function addtocart(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->gallery_id = $request->gallery_id;
        $cart->save();
    
         return redirect('/cart');
    }
    public function address(Request $request){
        $validatedData = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        Auth::user()->address()->create($validatedData);

      return redirect('/orderConfirm');
    }
    
    public function orderConfirm(Request $request)
    {
        $shipping_address = Address::where('user_id', Auth::user()->id)
            ->latest()
            ->first();

        $carts = DB::table('galleries')
                ->leftJoin('carts', 'galleries.id', "=", 'carts.gallery_id')
                ->where('user_id', Auth::user()->id)
                ->get();

        return view('frontend.order_confirm', compact('shipping_address','carts'));
    }
    public function storeOrder(Request $request)
    {
         $order=DB::table('orders')->where('user_id', Auth::user()->id)->first(); 

         $cart =  DB::table('galleries')
            ->leftJoin('carts', 'galleries.id', "=", 'carts.gallery_id')
            ->where('user_id', Auth::user()->id)
            ->get();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'payment_method'=>1,
        ]);

        $cart->each(function ($item) use ($order) {
            Order_detail::create([
                'gallery_id' => $item->gallery_id,
                'order_id' => $order->id,
            ]);
            
        });

        $cart_delete = Cart::where('user_id', Auth::user()->id);   
            $cart_delete->delete();

        $request->session()->forget(['total', 'quantities']);
        return view('frontend.thankyou');
    }
    
}
