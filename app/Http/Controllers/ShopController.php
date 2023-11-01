<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
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
    public function store(Request $request): void
    {
     $data= $request->validate([
         'title'=>'required|string|between3,100|unique:shops,title',
             'first_name'=>'required|string',
             'last_name'=>'required|string',
             'telephone'=>'required|string|size:11',
             'email'=>'required|email|unique',
             'username'=>'required|unique:users,name',
             'address'=>'nullable'
         ]);
     //create user in db
     $randPass= rand(1000,9999);
    $user = User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'role'=>'shop',
            'email_verified_at'=>now(),
            'password'=>bcrypt($randPass),
        ]);
        //create shop in db
        User::create([
            'user_id'=>$user->id,
            'title'=>$request->title,
'first_name'=>$request->first_name,
'last_name'=>$request->last_name,
'telephone'=>$request->telephone,
'email'=>$request->email,
'username'=>$request->username,
'address'=>$request->address,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Shop $shop)
    {
        //
    }
}
