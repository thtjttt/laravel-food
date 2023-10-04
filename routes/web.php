<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[FoodController::class,'index']);
Route::get('/shopping-cart', [FoodController::class, 'foodCart'])->name('shopping.cart');
Route::get('/food/{id}',[FoodController::class,'addFoodtoCart'])->name('addfood.to.cart');
Route::patch('/update-shopping-cart', [FoodController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [FoodController::class, 'deleteProduct'])->name('delete.cart.product');