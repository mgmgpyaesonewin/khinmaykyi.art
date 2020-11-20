<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Cart;
use App\Cart_item;
use App\User;
use Session;


class CartController extends Controller
{
    
    public function index(Request $request){
      
        $carts = Cart::with('user')
                ->where('user_id', Auth::id())
                ->pluck('id');

        $cart_items = Cart_item::join('galleries','cart_items.gallery_id',"=",'galleries.id')
                      ->whereIn('cart_id', $carts)
                      ->where('sold_out',1)
                      ->get();

                      
        $quantities = $cart_items->count();
        $total = $cart_items->sum('gallery.price');
        
        session([ 
            'total' => $total,
            'quantities' => $quantities,
        ]);

        return view('frontend.cart', compact('carts','cart_items','total','quantities'));
        
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request){

        $cart = Cart::create([
            'user_id' => Auth::user()->id, 
        ]);
    
        $cart_item = Cart_item::create([
                'gallery_id' => $request->gallery_id,
                'cart_id' => $cart->id,
            ]);

       return redirect('/cart');
       
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id){
        
        $cart_items = Cart::findOrFail($id);
        $cart_items->delete();
        
        return back()->with('status', 'Item Removed from cart');
    }
}
