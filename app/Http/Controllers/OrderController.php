<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart as Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(5);
//        $orderStatus = Order::query()->select('status')->get();
//        dd($orderStatus);
        return view('order.index',compact('orders'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function edit(string $id)
    {

    }

    public function destroy(Order $order)
    {
        $order->delete();
    }
}
