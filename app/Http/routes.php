<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProductController@catalog');
Route::get('/products', 'ProductController@index');
Route::get('/detail/{product}', 'ProductController@detail');

Route::get('/edit/{product}', 'ProductController@edit');
Route::post('/update/{product}', 'ProductController@update');
Route::post('/product', 'ProductController@store');
Route::delete('/product/{product}', 'ProductController@destroy');
Route::auth();

Route::get('/home', 'HomeController@index');
