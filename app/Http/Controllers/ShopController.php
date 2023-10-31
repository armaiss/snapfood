<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('shop.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('shop.create');
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
    public function show(shop $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shop $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, shop $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(shop $r)
    {
        //
    }
}
