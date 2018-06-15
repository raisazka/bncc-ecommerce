<?php

use App\Http\Controllers\LandingPageController;

use App\Http\Controllers\ShopController;

use App\Http\Controllers\VerificationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify'); 
// Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

// Route::view('/', 'landing-page');
Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/about', 'LandingPageController@about')->name('about');
Route::get('/contact-us', 'LandingPageController@contact')->name('contact');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::post('/wishlist', 'WishlistController@store')->name('wishlist.store');
Route::delete('/wishlist/{id}', 'WishlistController@destroy')->name('wishlist.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::post('/contact', 'LandingPageController@storeContact')->name('contact.store');
Route::get('/user', 'UserController@index')->name('user');

//Route::view('/product', 'product');
//
//Route::view('/checkout', 'checkout');
//Route::view('/thankyou', 'thankyou');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Route::get('/mailable', function (){
//    $order = \App\Order::find(1);
//
//    return new App\Mail\OrderPlaced($order);
//});

Route::get('/search', 'ShopController@search')->name('search');