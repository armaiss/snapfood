<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Http\Requests\restaurant\StoreRestaurantRequest;
use App\Http\Requests\restaurant\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('name')->get();

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Restaurant::class);
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
//        dd($request->all());
        $this->authorize('create', Restaurant::class);
        Restaurant::query()->create($request->validated());
        Auth::user()->assignRole(Role::query()->find('2'));
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);
        return view('restaurant.edit', ['restaurant' => $restaurant]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);
        $restaurant->update($request->validated());
        return redirect()->route('restaurants.edit', $restaurant);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
//        $this->authorize('delete',$restaurant);
//        $restaurant->delete();
//
    }

    public function indexApi()
    {
//        return resopnse(new RestaurantResource);
    }

    public function showApi(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }
}



