<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusMail;
use App\Notifications\OrderStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Cart as Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(5);
        $categories = DB::table('food_categories')->pluck('name');

        return view('order.index',compact('orders','categories'));

    }

    public function update(Request $request, Order $order): RedirectResponse
    { $validatedData = $request->validate(['status' => 'required']);
        $order->update($validatedData);
//        Mail::to($order->user->email)->send(new     OrderStatusMail($order));
        Notification::send($order->user,new OrderStatus($order));
        return redirect()->route('orders.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
