<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/gallery','FrontController@gallery');
Route::get('/gallery_detail/{id}','FrontController@detailGallery');

/*Frontend middelware*/
 Route::group(['middleware'=>'auth'],function(){
    Route::get('/checkout','FrontController@checkout');
	Route::resource('/cart','CartController');
    Route::resource('/wishlist','WishlistController');
	Route::post('/order_confirm','FrontController@order_confirm');
    Route::get('/thankyou','FrontController@thankyou');
    Route::get('/download-pdf','FrontController@downloadPDF');
    Route::get('/profile','ProfileController@index');
    Route::get('/profile', function () {
        return view('frontend.profile.dashboard');
    });
    Route::get('/profile/add', function () {
        return view('frontend.profile.add');
    });
    Route::get('/profile/order','ProfileController@show');
    Route::post('/profile/create','ProfileController@store');
    Route::get('/profile/account','ProfileController@profile_account');
    Route::post('/profile/change-password', 'ProfileController@update')->name('change.password');
    Route::post('/profile/account', 'ProfileController@updateAddress')->name('change.address');
});

Auth::routes();

/*Admin Panel*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/home','AdminHomeController@adminHome');
    Route::resource('gallery','GalleryController');
    Route::get('gallery_search','GalleryController@gallery_search');
    Route::resource('order','OrderController');
    Route::get('/sold_out/gallery/{id}','GalleryController@sold_out');
});
