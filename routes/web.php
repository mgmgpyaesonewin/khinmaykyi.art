<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Auth::routes();*/

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/about', function () {
    return view('frontend.about');
});

/*Route::get('/shipping_info', function () {
    return view('frontend.shipping_info');
});*/
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/gallery','FrontController@gallery');
Route::get('/gallery_detail/{id}','FrontController@detailGallery');




/*Frontend middelware*/
 Route::group(['middleware'=>'auth'],function(){
    Route::get('/checkout','FrontController@shipping_info');
	Route::resource('/cart','CartController');
    Route::resource('/wishlist','WishlistController');
	Route::post('/order_confirm','FrontController@order_confirm');
    Route::get('/thankyou','FrontController@thankyou');
    Route::get('/download-pdf','FrontController@downloadPDF');
    Route::get('/profile','ProfileController@index');
});


Auth::routes();

/*Admin Panel*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    /*Route::get('/home', function() {
        return view('backend.home');
    });*/
    Route::get('/home','AdminHomeController@adminHome');
    Route::resource('gallery','GalleryController');
    Route::get('gallery_search','GalleryController@gallery_search');
    Route::resource('order','OrderController');
    Route::get('/sold_out/gallery/{id}','GalleryController@sold_out');
});
