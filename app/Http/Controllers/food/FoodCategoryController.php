<?php

namespace App\Http\Controllers\food;

use App\Http\Controllers\Controller;
use App\Http\Requests\food\StoreFoodCategoryRequest;
use App\Http\Requests\food\UpdateFoodCategoryRequest;
use App\Models\FoodCategory;


class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',FoodCategory::class);
        return view('foodCategory.index',['categories'=>FoodCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',FoodCategory::class);
        return view('foodCategory.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodCategoryRequest $request)
    {
        $this->authorize('create',FoodCategory::class);
        FoodCategory::query()->create($request->validated());
        return redirect()->route('foodCategories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(FoodCategory $foodCategory)
    {
        $this->authorize('view',FoodCategory::class);
        return view('foodCategory.show',['category'=>$foodCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodCategory $foodCategory)
    {
        $this->authorize('update',FoodCategory::class);
        return view('foodCategory.edit',['category'=>$foodCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {
        $this->authorize('update',FoodCategory::class);
       $foodCategory->update($request->validated());
        return redirect()->route('foodCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodCategory $foodCategory)
    {
        $this->authorize('delete',FoodCategory::class);
        $foodCategory->delete();
        return redirect()->route('foodCategories.index');
    }
}
