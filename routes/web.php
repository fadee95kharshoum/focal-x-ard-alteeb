<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DiscountController;
use Illuminate\Support\Facades\Auth;
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
    return view('backend.layout.admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::resource('products', ProductController::class);
    Route::resource('discounts', DiscountController::class);

    Route::resource('users', UserController::class);

});
