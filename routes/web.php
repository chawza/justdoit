<?php

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

Route::get('/', function () {
    return view('welcome');
});
# Route::redirect('/', '/login/login'); # replace after login function is active

# URL : /login/login
// Route::group('login')->group(function(){
//     Route::get('login', '');
//     Route::get('register', '');
// });

# URL : /store/showcase
Route::prefix('store')->group(function(){
    Route::get('showcase', 'Store@storeShowcase');
    Route::get('shoe', 'Store@showDetail');
    Route::get('addShoe', 'Store@addShoe');
    Route::get('update', 'Store@updateShoeDetail');
});

#URL : /transaction/cart
Route::prefix('transaction')->group(function(){
   Route::get('cart', 'Store@cartListDetail');
   Route::get('transactions', 'Store@viewTransactions');
});
