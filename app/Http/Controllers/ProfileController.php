<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function index()
    {
        $user_id = Auth::user()->id;
        $address = User::where('id', $user_id)->get();
        return view('frontend.profile.address', compact('address'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();        
        $user->address = $request->input('address');
        $user->township = $request->input('township');
        $user->update();
        return redirect('profile/account')->with('success', 'Data Added successfuly');
    }

    public function show()
    {
        $user_id = Auth::user()->id;
        $profile_orders = DB::table('order_details')
                        ->leftjoin('galleries', 'galleries.id', '=', 'order_details.gallery_id')
                        ->leftjoin('orders', 'orders.id', '=', 'order_details.order_id')
                        ->where('orders.user_id', '=', $user_id)
                        ->get();
        $sum_order = $profile_orders->sum('total');
        return view('frontend.profile.order', compact('profile_orders', 'sum_order'));
    }

    public function update(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        if (!Hash::check($oldPassword, Auth::user()->password)) {
            return back()->with('msg', 'The specified password does not match to database password');
        } else {
            $request->user()->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            return redirect('profile/account')->with('success', 'Data Added successfuly');
        }
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();
        $user->address = $request->input('address');
        $user->township = $request->input('township');
        $user->update();

        return redirect()->back()
           ->with('success', 'Address updated successfully');
    }

     public function profile_account()
    {
        $user = Auth::user();
        $township_names = DB::table('addresses')->get();
        return view('frontend.profile.my_account',compact('user', 'township_names'));
    }

}

