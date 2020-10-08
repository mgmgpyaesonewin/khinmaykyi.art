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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $carts = Cart::with('user')
                ->where('user_id', Auth::id())
                ->pluck('id');

                    
       /* $cart_items=Cart_item::with(['gallery','cart'])
                    ->whereIn('cart_id', $carts)
                    ->get();*/

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::create([
            'user_id' => Auth::user()->id, 
        ]);
    
        $cart_item = Cart_item::create([
                'gallery_id' => $request->gallery_id,
                'cart_id' => $cart->id,
            ]);

       return redirect('/cart');
       
    }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_items = Cart::findOrFail($id);
        $cart_items->delete();
        
        return back()->with('status', 'Item Removed from cart');
    }
}
