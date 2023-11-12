<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::prefix('dashboard')->middleware('auth')->group(function (){

    Route::resource('foodCategories', \App\Http\Controllers\food\FoodCategoryController::class);
    Route::resource('restaurantCategories', \App\Http\Controllers\restaurant\RestaurantCategoryController::class);
    Route::resource('restaurants', \App\Http\Controllers\restaurant\RestaurantController::class);
    Route::resource('foods', \App\Http\Controllers\food\FoodController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);
    Route::get('allFoods', [\App\Http\Controllers\food\FoodController::class,'products'])->name('allFoods');
});

