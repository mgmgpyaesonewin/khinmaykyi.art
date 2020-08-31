<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;
use App\Gallery;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Address;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['order_details','user'])
                 ->get();
    
        return view('backend.order.index',compact('orders'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::FindOrFail($id);

        $orders = Order::with('user')->where('orders.user_id', $order->user_id)->get();
            
        $order_details =  DB::table('order_details')
            ->leftJoin('galleries', 'order_details.gallery_id', "=", 'galleries.id')
            ->leftJoin('orders', 'order_details.order_id', "=", 'orders.id')
            ->where('orders.user_id', $order->user_id)
            ->get();
        $total = $order::where('orders.user_id', $order->user_id)->pluck('total')->first();
        
        $count= Order_detail::where(['order_id'=>$order->id])->count(); 
       
        $shipping_address = Address::where('user_id', $order->user_id)
            ->latest()
            ->first();
        return view('backend.order.show', compact('order_details','count','shipping_address',
            'order','orders','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::findorFail($id);
        return view('backend.order.edit')->with('orders', $orders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->update();
       
        return redirect()->back()->with('status', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
       
        return redirect()->back()->with('status', 'Data deleted for order');
    }
}
