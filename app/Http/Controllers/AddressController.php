<?php

namespace App\Http\Controllers;

use App\Http\Requests\address\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\AddressUser;
use http\Env\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $addresses = Auth::user()->addresses;
        return  response(AddressResource::collection($addresses));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
       
        $address = Address::query()->create($request->validated());
        AddressUser::query()->create([
            'user_id' => Auth::user()->id,
            'address_id' => $address->id,
        ]);
        if (Auth::user()->current_address ==null)
        {
            Auth::user()->update([
                'current_address'=>$address->id,
            ]);
        }
        return response([
            'message' => "Address added successfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        $this->authorize('myAddress', $address);
        return response(
            ['address' => $address
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address): \Illuminate\Foundation\Application|\Illuminate\Http\Response|Application|ResponseFactory
    {
        $this->authorize('myAddress', $address);
        $address->update($request->validated());
        return response([
            'message' => 'address updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address): void
    {
        $this->authorize('myAddress', $address);
        $address->delete();
    }

    public function updateUserAddress(Address $address)
    {
        $this->authorize('myAddress',$address);
        Auth::user()->update([
            'current_address'=>$address->id,
        ]);
        dd(Auth::user());
    }
}
