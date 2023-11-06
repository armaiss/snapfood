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

Route::get('/hello',function ()
{
    return response('hello');
});
Route::post('register',[\App\Http\Controllers\AuthController::class ,'register']);
Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('addresses')->controller(\App\Http\Controllers\AddressController::class)->name('addresses.')->group(function (){
        Route::get('/','index')->name('index');
        Route::get('/{address}','show')->name('show');
        Route::post('/','store')->name('.store');
        Route::put('/{address}','update')->name('.update');
        Route::delete('/{address}','destroy')->name('.destroy');
        Route::patch('/{address}','UpdateUserAddress');

    });
});
//Route::prefix('restaurants')->controller(\App\Http\Controllers\)->name('restaurants.')->group(function () {
//    Route::get('/','index')->name('index');
//    Route::get('/{restaurants}','show')->name('show');
//});
