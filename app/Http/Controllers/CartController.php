<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartFood;
use App\Models\Food;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $carts = Auth::user()->carts;
        return response(new CartCollection($carts));
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

        try {
            $foodId = $request->post('food_id');

            $food = Food::query()->findOrFail($foodId);

            $restaurantId = $food->restaurant_id;
            $count = $request->count;
            $total = ($food->price * (100 - $food->discount) / 100) * $count;
            $cart = Cart::query()->create([
                'user_id' => Auth::user()->id,
                'restaurant_id' => $restaurantId,
                'total_price' => $total,
            ]);

            CartFood::query()->create([
                'cart_id' => $cart->id,
                'food_id' => $foodId,
                'count' => $count,
            ]);

        } catch (ModelNotFoundException $e) {
            abort(404, "غذایی با این مشخطات پیدا نشد");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {

       return response(new CartResource($cart));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $foodId = $request->post('food_id');
        $count = $request->count;
        $food = Food::query()->find($foodId);
        $cartFood = cartFood::query()->create([
            'cart_id'=>$cart->id,
            'food_id'=>$foodId,
            'count'=>$count,
        ]);
        $extraPrice = ($food->price*(100-$food->discount)/100)*$count;
$cart->update([
    'price_total'=> $extraPrice +$cart->price_total,
]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function pay (Cart $cart)
    {
        try {
            $cartId =$cart->id;
            $cart = Cart::query()->findOrFail($cartId);

            if ($cart->is_paid) {
                return response()->json(['message' => 'This cart has already been paid.']);
            }

            $cart->update([
                'is_paid' => 1,
                Order::query()->create(
                    [
                        'user_id'=>$cart->user_id,
                        'restaurant_id'=>$cart->restaurant_id,
                        'total_price'=>$cart->total_price,
                        'created_at'=>now(),
                        'updated_at'=>now(),

                    ]
                )

            ]);

            return response()->json(['message' => 'Payment successful']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }
    }
}
