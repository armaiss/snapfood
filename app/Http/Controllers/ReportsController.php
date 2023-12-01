<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin')) {
            $orders = Order::paginate(5);
            $categories = DB::table('food_categories')->pluck('name');
            $totalPriceSum = Order::sum('total_price');
        }
        else
        {
            $orders = Order::where('restaurant_id', Auth::user()->restaurant->id)->get();
            $categories = DB::table('food_categories')->pluck('name');
            $totalPriceSum = Order::where('restaurant_id', Auth::user()->restaurant->id)->sum('total_price');

        }
        return view('report.index', compact('orders', 'categories','totalPriceSum'));
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
    public function show(Reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
