<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Gallery;
use App\Cart;
use App\Address;
use App\Order;
use App\Order_detail;
use App\Cart_item;
use App\Wishlist;
use App\User;

class FrontController extends Controller
{
    
    public function gallery()
    {
         $galleries = Gallery::orderBy('created_at', 'desc')->where('sold_out',1)->paginate(6);
         $remove = DB::table('order_details')
                ->leftJoin('galleries','order_details.gallery_id',"=",'galleries.id')
               ->update([ 'sold_out' => 0 ]);

        return view('frontend.gallery', compact("galleries"));
    }

    public function detailGallery($id)
    {
    	$galleries = Gallery::where('id', $id)
                	->first(); 

        if(\Auth::check()){
            $wishlist_count = Wishlist::where(['gallery_id' => $galleries->id,'user_id' => \Auth::user()->id])
                        ->count();
            }
		return view('frontend.detail', compact('galleries','wishlist_count'));
    }
    
     public function address_update(Request $request, $id){
        $profile = Auth::user();
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->update();
        
        return redirect('/orderConfirm');
    }

    public function orderConfirm(Request $request)
    {
     
        $user = auth()->user();
                            
        $cart=Cart::where('user_id',Auth::user()->id)->first();
      
        $carts = DB::table('cart_items')
                ->leftJoin('galleries','cart_items.gallery_id',"=",'galleries.id')
                ->leftJoin('carts','cart_items.cart_id',"=",'carts.id')
                ->where('carts.user_id',$cart->user_id)
                ->get();

        return view('frontend.order_confirm', compact('user','carts'));
    }

    public function storeOrder(Request $request)
    {
        $cart=Cart::where('user_id',Auth::user()->id)->first();

        $carts = DB::table('cart_items')
                ->leftJoin('galleries','cart_items.gallery_id',"=",'galleries.id')
                ->leftJoin('carts','cart_items.cart_id',"=",'carts.id')
                ->where('carts.user_id',$cart->user_id)
                ->get();
         $quantities = $carts->count();
        $total = $carts->sum('price');

        $order = Order::with('user')->where('user_id', Auth::user()->id)->first(); 

        $order = Order::create([
            'user_id' => Auth::user()->id,
             'total' => $total,
            'payment_method'=>'COD',
            'status'=>'pending',
        ]);

        $carts->each(function ($item) use ($order) {
            Order_detail::create([
                'gallery_id' => $item->gallery_id,
                'order_id' => $order->id,

            ]);
            
        });

        $request->session()->forget(['total', 'quantities']);

        $cart_delete = Cart::where('user_id', Auth::user()->id)->delete();   
        return view('frontend.thankyou');
    }
    
    public function storeCart(Request $request)
    {

        /*$cart = Cart::with('user')->where('user_id', Auth::user()->id)->first(); 
*/
        $cart = Cart::create([
            'user_id' => Auth::user()->id, 
        ]);
    
        $cart_item = Cart_item::create([
                'gallery_id' => $request->gallery_id,
                'cart_id' => $cart->id,
            ]);

       return redirect('/cart');
    }

    public function storeWishlist(Request $request){

        $wishlists = Wishlist::create([
                'gallery_id' => $request->gallery_id,
                'user_id' => Auth::user()->id,
            ]);
     

        return redirect('/wishlist');
    }
    
    public function wishlist(Request $request){

         $wishlists = Wishlist::with('gallery')->where('user_id', Auth::user()->id)->get();     

       return view('frontend.wishlist',compact('wishlists'));
    }

    public function removeWishlist($id){

        $wishlist = Wishlist::findOrFail($id);
        $wishlist -> delete();

        return back()->with('status', 'Item Removed from wishlist');
    
    }
}
