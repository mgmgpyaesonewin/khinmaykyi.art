<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Cart_item;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
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
      
        $carts = DB::table('cart_items')
            ->leftJoin('galleries','cart_items.gallery_id',"=",'galleries.id')
            ->leftJoin('carts','cart_items.cart_id',"=",'carts.id')
            ->where('carts.user_id',Auth::user()->id)
                ->get();

        $quantities = $carts->count();
        $total = $carts->sum('price');

          session([ 
            'total' => $total,
            'quantities' => $quantities,
        ]);

        return view('frontend.cart', compact('carts','total','quantities'));
        
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

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->save();
    dd($cart);
         /*$cart = Cart::with('user')->where('user_id', Auth::user()->id)->first(); 

        $cart = Cart::create([
            'user_id' => Auth::user()->id, 
        ]);*/
    
        Cart_item::create([
                'gallery_id' => $request->gallery_id,
                'cart_id' => $cart->id,
            ]);

       return redirect('/cart');
    }
        
      /*  $cart = Cart::with('user')->where('user_id', Auth::user()->id)->first(); 

        $cart = Cart::create([
            'user_id' => Auth::user()->id,   
        ]);
    
        Cart_item::create([
                'gallery_id' => $request->gallery_id,
                'cart_id' => $cart->id,
            ]);

       return redirect('/cart');*/
    
     
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
        $cart = Cart::findOrFail($id);
        $cart->delete();
        $cart_item=Cart_item::where('cart_id', $cart->id)->delete();
        return back()->with('status', 'Item Removed from cart');
    }
}
