<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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

        return view('order.index',compact('orders'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    { $validatedData = $request->validate(['status' => 'required']);
        $order->update($validatedData);
        return redirect()->route('order.index');
    }



    public function destroy(Order $order)
    {
        $order->delete();
    }
}
