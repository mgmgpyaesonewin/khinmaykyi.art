<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Cart_item;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $carts =  DB::table('galleries')
            ->leftJoin('carts', 'galleries.id', "=", 'carts.gallery_id')
            ->where('user_id', Auth::user()->id)
            ->get();
            $carts->map(function ($item) {
            $item->total = $item->price;
            return $item;
        });
        
        $total = $carts->sum('total');

        $quantities = Cart::where('user_id',Auth::user()->id)->count();

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
        
       /* $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->gallery_id = $request->gallery_id;
        $cart->save();
    
        return redirect('/home');*/
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
        $carts = Cart::FindOrFail($id);
        $carts->delete();
     /*   return redirect()->route("product.index")->with('status', 'Data deleted for products');*/
        return back()->with('status', 'Item Removed from cart');
    }
}
