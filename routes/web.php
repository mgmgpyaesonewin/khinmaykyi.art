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
    return view('Frontend.index');
});
Route::get('/about', function () {
    return view('Frontend.about');
});
Route::get('/gallery', function () {
    return view('Frontend.gallery');
});
Route::get('/detail', function () {
    return view('Frontend.detail');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function() {
        return view('backend.home');
    });
    Route::get('/gallery', function() {
        return view('backend.gallery.index');
    });
});