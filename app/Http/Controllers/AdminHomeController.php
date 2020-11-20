<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Gallery;

class AdminHomeController extends Controller
{
    public function adminHome()
    {
    	$total_customer = User::where('admin')->count();
    	$total_order = Order::count();
    	$total_gallery = Gallery::count();
    	$total_sale = Order::sum('total');
    	/*$order = Order::where('status','=','pending')->count();*/
    	 return view('backend.home', compact('total_customer','total_order','total_gallery','total_sale'));
    }

}
