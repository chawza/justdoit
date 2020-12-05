<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('shoe/{shoe_id}', 'Store@shoeDetail');
    Route::get('addShoe', 'Store@addShoe');
    Route::get('update/{shoe_id}', 'Store@updateShoeDetail');

    Route::post('shoe', 'Store@submitShoeToCart');
    Route::post('addShoe', 'Store@submitAddShoe');
    Route::post('update', 'Store@submitShoeDetail');
});

#URL : /transaction/cart
Route::prefix('transaction')->group(function(){
   Route::get('cart', 'Transactions@cartListDetail');
   Route::get('item', 'Transactions@cartItemDetail');
   Route::get('transactions', 'Transactions@viewTransactions');

   Route::post('cart', 'Transactions@checkOut');
   Route::post('item', 'Transactions@updateCartDetail');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
