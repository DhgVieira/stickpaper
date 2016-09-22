<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('adminlte::auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/product', 'ProductController@index');
Route::get('/product/new',  ['as' => 'product.new', 'uses' => 'ProductController@newAction']);
Route::get('/product/create',  ['as' => 'product.create', 'uses' => 'ProductController@createAction']);

Route::get('/client', 'ClientController@index');
Route::get('/client/new',  ['as' => 'client.new', 'uses' => 'ClientController@newAction']);
Route::get('/client/create',  ['as' => 'client.create', 'uses' => 'ClientController@createAction']);


Route::get('/admin', 'AdminController@showRegistrationForm');

