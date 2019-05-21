<?php

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
    return redirect('home');
});

Auth::routes();

Route::get('/addAmount/{articleId}', 'CartController@addAmount');
Route::get('/removeAmount/{articleId}', 'CartController@removeAmount');
Route::get('/deleteFromCart/{articleId}', 'CartController@deleteFromCart');

Route::get('/home', 'CategoryController@index')->name('home');
Route::get('/addToCartViaShop/{articleId}', 'CartController@addToCartViaShop');
Route::get('/addToCartViaArticle/{category}/{article}/{articleId}', 'CartController@addToCartViaArticle');
Route::get('/{category}/{product}', 'ProductController@index');
Route::get('/cart', 'CartController@index');
Route::get('/checkout', 'CartController@checkout');
Route::get('/orders', 'OrderController@index');
