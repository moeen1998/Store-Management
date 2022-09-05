<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PakingController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index']);
Route::get('item_packing/{item}', [HomeController::class,'packing']); //for ajax request
Route::get('item_history/{item}', [HomeController::class,'itemhistory'])->name('item_history');


Route::resource('category', CategoryController::class);
Route::resource('group', GroupController::class);
Route::resource('item', ItemController::class);
Route::resource('paking', PakingController::class);
Route::resource('purchase', PurchaseController::class);
Route::resource('order', OrderController::class);