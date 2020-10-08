<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use DB;
use App\Gallery;
use App\Cart;
use App\Address;
use App\Order;
use App\Order_detail;
use App\Cart_item;
use App\Wishlist;
use App\User;
use PDF;

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

         $carts = Cart::with('user')->where('user_id', Auth::id())->pluck('id');

         if (Auth::check())
            {
            $wishlist_count = Wishlist::where(['gallery_id' => $galleries->id,'user_id' => Auth::user()->id])
                        ->count();

            $cart_count=Cart_item::with(['gallery','cart'])->whereIn('cart_id', $carts)->where('gallery_id', $galleries->id)
                        ->count();
            }
            $wishlist_count = Wishlist::where(['gallery_id' => $galleries->id])
                        ->count();
            $cart_count=Cart_item::with(['gallery','cart'])->whereIn('cart_id', $carts)->where('gallery_id', $galleries->id)
                        ->count();

		return view('frontend.detail', compact('galleries','wishlist_count','cart_count'));
    }
    


    public function shipping_info(Request $request){

        $carts = Cart::with('user')
                ->where('user_id', Auth::id())
                ->pluck('id');

        $cart_items = Cart_item::join('galleries','cart_items.gallery_id',"=",'galleries.id')
                    ->whereIn('cart_id', $carts)
                    ->where('sold_out',1)
                    ->get();

        $township_names = DB::table('addresses')->get();
        $total = $request->session()->get('total');

        return view('frontend.shipping_info',compact('carts','township_names','total','cart_items'));

    }

      public function order_confirm(AddressRequest $request){

        $Address = Auth::user();
        $Address->phone = $request->input('phone');
        $Address->address = $request->input('address');
        $Address->township = $request->input('township');
        $Address->update();
 
        $carts = Cart::with('user')
                ->where('user_id', Auth::id())
                ->pluck('id');

        $cart_items = Cart_item::join('galleries','cart_items.gallery_id',"=",'galleries.id')
                    ->whereIn('cart_id', $carts)
                    ->where('sold_out',1)
                    ->get();
        
        $total = $cart_items->sum('price');

        $order = Order::create([
            'user_id' => Auth::user()->id,
             'total' => $total,
            'payment_method'=>'COD',
            'status'=>'pending',
        ]);

        $cart_items->each(function ($item) use ($order) {
            Order_detail::create([
                'gallery_id' => $item->gallery_id,
                'order_id' => $order->id,
            ]);
            
        });
        return redirect('/thankyou');
      
        return view('frontend.thankyou',compact('carts','user','total'));

       
    }
    public function thankyou(Request $request){

        $user = auth()->user();
        $order = Order::with(['order_details','user'])
                 ->where('user_id',Auth::user()->id)
                 ->orderBy('created_at', 'desc')
                 ->first();

        $order_details=Order_detail::with(['gallery','order'])->whereIn('order_id',$order)->get();




        $cart_delete = Cart::where('user_id', Auth::user()->id)->delete();  
        $request->session()->forget(['total', 'quantities']); 
       
        return view('frontend.thankyou',compact('user','order_details','order'));

    } 
    public function downloadPDF(Request $request){
        $user = auth()->user();
        $order = Order::with(['order_details','user'])
        ->where('user_id',Auth::user()->id)
                 ->get();

        $order_details=Order_detail::with(['gallery','order'])->whereIn('order_id',$order)->get();
                $request->session()->forget(['total', 'quantities']); 
         $pdf = PDF::loadView('frontend.thank',compact('user','order_details'));
         return $pdf->download('invoice.pdf');
    }
 
  
}
