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

Route::get('/',function(){
	return redirect('/product');
});

//Product route
Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create','ProductController@create')->name('product.create')->middleware('auth');
Route::post('/product','ProductController@store')->name('product.store')->middleware('auth');
Route::get('/product/{product}','ProductController@show')->name('product.show');
Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit')->middleware('auth');
Route::patch('/product/{product}','ProductController@update')->name('product.update')->middleware('auth');
Route::delete('/product/{product}','ProductController@destroy')->name('product.destroy')->middleware('auth');

Route::get('/customer','CustomerController@show')->name('customer.profile');
Route::patch('/address/{address}','AdresseController@update')->name('address.update')->middleware('auth');
Route::delete('/address/{address}','AdresseController@destroy')->name('address.delete')->middleware('auth');
Route::post('/address','AdresseController@store')->name('address.store')->middleware('auth');
Route::patch('/password','PasswordController@update')->name('password.change')->middleware('auth');




Route::post('/cart/add','CartController@addToCart')->name('cart.add');
Route::get('/cart/show','CartController@showCart')->name('cart.show');
Route::post('/cart/update','CartController@updateCart')->name('cart.update');



//authentication
Auth::routes();