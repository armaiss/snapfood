<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\food\FoodCategoryController;
use App\Http\Controllers\food\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\restaurant\RestaurantCategoryController;
use App\Http\Controllers\restaurant\RestaurantController;
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
Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::resource('foodCategories', FoodCategoryController::class);
    Route::resource('restaurantCategories', RestaurantCategoryController::class);
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('foods', FoodController::class);
    Route::resource('orders', OrderController::class);
    Route::get('products', [FoodController::class, 'products'])->name('products');
    Route::post('products/catFilter', [FoodController::class, 'categoryFilter'])->name('categoryFilter');
    Route::post('/filter-foods', [FoodController::class, 'filterFoods'])->name('filterFoods');
    Route::post('products/categoryFilter', [FoodController::class, 'categoryFilter'])->name('categoryFilter');
    Route::post('products/', [CommentController::class, 'store'])->name('comment.store');
    Route::resource('/comments', CommentController::class);
//    Route::get('/comments/indexByStatus', [CommentController::class, 'indexByStatus'])->name('comments.indexByStatus');


});
