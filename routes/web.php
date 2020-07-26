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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/gallery','FrontController@gallery');

Route::get('/detail', function () {
    return view('frontend.detail');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function() {
        return view('backend.home');
    });
    Route::resource('gallery','GalleryController');
});