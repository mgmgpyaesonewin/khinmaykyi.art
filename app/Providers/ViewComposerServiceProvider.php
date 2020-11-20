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
       /*if (Auth::check()) 
        {
                View()->composer('layout.app', function ($view) {
                $view->with('wishlists',DB::table('galleries')
                    ->Join('wishlists','galleries.id',"=",'wishlists.gallery_id')
                    ->where('user_id', Auth::user()->id)
                    ->where('sold_out',1)
                    ->get());
                });
            }
            else{
                View()->composer('layout.app', function ($view) {
               $view->with('wishlists',DB::table('galleries')
                    ->Join('wishlists','galleries.id',"=",'wishlists.gallery_id')
                    ->where('user_id', Auth::user()->id)
                    ->where('sold_out',1)
                    ->get());
                });
            }*/
    }
           
}


      

       