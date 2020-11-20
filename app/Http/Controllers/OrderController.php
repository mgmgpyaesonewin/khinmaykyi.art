<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Order_detail;

class OrderController extends Controller
{
    
    public function index() 
    {
        $orders = Order::with(['order_details','user'])
                 ->paginate(8);
    
        return view('backend.order.index',compact('orders'));
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        $orders = Order::FindOrFail($id);

        $order_details = Order_detail::with(['gallery','order'])->whereIn('order_id',$orders)->get();

        $total = $request->session()->get('total');
        
        return view('backend.order.show', compact('order_details','orders','total'));
    }

    public function edit($id)
    {
        $orders = Order::findorFail($id);

        return view('backend.order.edit')->with('orders', $orders);
    }

    public function update(Request $request, $id)
    {
        
        $orders = Order::findOrFail($id);
        $orders->status = $request->input('status');
        $orders->update();

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
       
        return redirect()->back()->with('error', 'Data deleted for order');
    }
}
