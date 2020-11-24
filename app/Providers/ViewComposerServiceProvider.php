<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Cart;
use App\Cart_item;
use App\Galelry;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
   

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {

        view()->composer('layout.app', function ($view)
        {
            if (auth()->user()) {
                $view->with('wishlists', DB::table('galleries')
                    ->join('wishlists','galleries.id',"=",'wishlists.gallery_id')
                    ->where('user_id', Auth::user()->id)
                    ->where('sold_out',1)
                    ->get());
            } else{
                $view->with('wishlists',DB::table('galleries')
                    ->join('wishlists','galleries.id',"=",'wishlists.gallery_id')
                    ->where('sold_out',1)
                    ->get());
            }
        });

        view()->composer('layout.app', function ($view)
        {

            if (auth()->user()) {
                $view->with('cart_items', DB::table('cart_items')
                    ->join('carts','cart_items.cart_id',"=",'carts.id')
                    ->join('galleries','cart_items.gallery_id',"=",'galleries.id')
                    ->where('user_id', Auth::user()->id)
                    ->where('sold_out',1)
                    ->get());
            } else{
                 $view->with('cart_items', DB::table('cart_items')
                    ->join('galleries','cart_items.gallery_id',"=",'galleries.id')
                    ->where('sold_out',1)
                    ->get());
            }
        });
    }     
}


       