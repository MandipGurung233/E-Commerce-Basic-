<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kitcont;
use App\Http\Controllers\KitchenProduct;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect ('login');
});

Route::view('/register','register');
Route::post('/login',[kitcont::class,'login']);
Route::post('/register',[kitcont::class,'register']);
Route::get("/",[KitchenProduct::class,'index']);
Route::get("detail/{id}",[KitchenProduct::class,'detail']);
Route::post("add_to_cart",[KitchenProduct::class,'addToCart']);
Route::get("cartList",[KitchenProduct::class,'cartList']);
Route::get("removecart/{id}",[KitchenProduct::class,'removeCart']);
Route::get("order",[KitchenProduct::class,'order']);
Route::post("ordered",[KitchenProduct::class,'ordered']);
Route::get("meroOrder",[KitchenProduct::class,'meroOrder']);

