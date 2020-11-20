<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use DB;

class WishlistController extends Controller
{
    public function index()
    {
       
        $wishlists=Gallery::join('wishlists','galleries.id',"=",'wishlists.gallery_id')
                    ->where('user_id',Auth::user()->id)
                    ->where('sold_out',1)
                    ->get();

       return view('frontend.wishlist',compact('wishlists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $wishlists = Wishlist::create([
                'gallery_id' => $request->gallery_id,
                'user_id' => Auth::user()->id,
            ]);

        return redirect()->back();
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

    public function destroy($id)
    {
        
        $wishlists = Wishlist::findOrFail($id);
        $wishlists->delete();

         return redirect('/wishlist')->with('status', 'Item Removed from wishlist');
    }
}
