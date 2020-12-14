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

# URL for store realated activitae such as display items and assign db
Route::prefix('store')->group(function(){
    Route::get('showcase', 'Store@storeShowcase');
    Route::get('shoe/{shoe_id}', 'Store@shoeDetail');
    Route::get('addShoe', 'Store@addShoe')->middleware('role:admin');
    Route::get('update/{shoe_id}', 'Store@updateShoeDetail')->middleware('role:admin');

    Route::post('addShoe', 'Store@submitAddShoe')->middleware('role:admin');
    Route::post('update', 'Store@submitUpdateShoeDetail')->middleware('role:admin');
    Route::post('search', 'Store@searchBox')->name('search');
});

# URL related for carting activity
Route::prefix('cart')->group(function(){
    Route::get('', 'Transactions@cartListDetail');
    Route::get('{cart_id}', 'Transactions@cartDetail');

    Route::post('shoe', 'Transactions@submitShoeToCart');
    Route::post('update', 'Transactions@updateCartDetail');
});

#URL related for transactions
Route::prefix('transaction')->group(function(){
   Route::get('', 'Transactions@viewTransactions');
   
   Route::post('cart', 'Transactions@checkOut');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
