<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/hello', function () {
    return response('hello');
});
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('addresses')->controller(\App\Http\Controllers\AddressController::class)->name('addresses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{address}', 'show')->name('show');
        Route::post('/', 'store')->name('.store');
        Route::put('/{address}', 'update')->name('.update');
        Route::delete('/{address}', 'destroy')->name('.destroy');
        Route::patch('/{address}', 'UpdateUserAddress');

    });

Route::prefix('restaurants')->controller(\App\Http\Controllers\restaurant\RestaurantController::class)
    ->name('restaurants.')->group(function () {
    Route::get('/', 'indexApi')->name('index');
    Route::get('/{restaurant}', 'showApi')->name('show');
});
//food
Route::get('/restaurants/{restaurant}/foods', [\App\Http\Controllers\food\FoodController::class,'indexApi'])->name('Foods');
//cart
Route::prefix('carts')->controller(\App\Http\Controllers\CartController::class)->group(function (){
    Route::get('/','index')->name('.index');
    Route::post('/add','store')->name('.store');
    Route::patch('/{cart}','update')->name('.update');
    Route::get('/{cart}','show')->name('.show');
});
    Route::get('/comments',[\App\Http\Controllers\CommentController::class, 'index'])->name('index');
    Route::post('/comments',[\App\Http\Controllers\CommentController::class, 'store'])->name('show');
});
