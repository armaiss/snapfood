<?php

namespace App\Http\Controllers;

use App\Http\Requests\address\StoreAddressRequest;
use App\Models\Address;
use App\Models\AddressUser;
use http\Env\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|Application|ResponseFactory
    {
       $addresses = Auth::user()->addresses;
       return response([
           'addresses'=>$addresses
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request): ResponseFactory|Application|\Illuminate\Http\Response|\Illuminate\Foundation\Application
    {
        $address = Address::query()->create($request->validated());
        AddressUser::query()->create([
                'user_id'=>Auth::user()->id,
                'user_address'=>$address->id,
            ]);
        return response([
            'message'=>"Address added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address): \Illuminate\Foundation\Application|\Illuminate\Http\Response|Application|ResponseFactory
    {
        try {
            $this->authorize('myAddress', $address);
        } catch (AuthorizationException) {
        }
        return response(
            ['address' =>$address
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $this->authorize('myAddress',$address);
        $address->update($request->validated());
        return response([
            'message'=>'address updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $this->authorize('myAddress',$address);
        $address->delete();
    }
}
