<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;

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
        view()->composer('layout.app',function($view){
        $view->with('wishlists',DB::table('wishlists')
                  ->leftJoin('galleries','wishlists.gallery_id',"=",'galleries.id')
                  ->where('user_id',Auth::user()->id)
                  ->where('sold_out',1)
                  ->get());
        });
        view()->composer('layout.app',function($view){
        $view->with('cart_item',DB::table('cart_items')
                ->leftJoin('galleries','cart_items.gallery_id',"=",'galleries.id')
                ->leftJoin('carts','cart_items.cart_id',"=",'carts.id')
                ->where('carts.user_id',Auth::user()->id)
                ->where('sold_out',1)
                ->get());
        });
    }
}
