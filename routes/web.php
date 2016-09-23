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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/product', 'ProductController@index');
    Route::get('/product/new',  ['as' => 'product.new', 'uses' => 'ProductController@newAction']);
    Route::get('/product/create',  ['as' => 'product.create', 'uses' => 'ProductController@createAction']);
    Route::get('/product/edit/{id}',  ['as' => 'product.edit', 'uses' => 'ProductController@editAction']);
    Route::get('/product/update',  ['as' => 'product.update', 'uses' => 'ProductController@updateAction']);
    Route::get('/product/remove/{id}',  ['as' => 'product.remove', 'uses' => 'ProductController@removeAction']);

    Route::get('/client', 'ClientController@index');
    Route::get('/client/new',  ['as' => 'client.new', 'uses' => 'ClientController@newAction']);
    Route::get('/client/create',  ['as' => 'client.create', 'uses' => 'ClientController@createAction']);
    Route::get('/client/edit/{id}',  ['as' => 'client.edit', 'uses' => 'ClientController@editAction']);
    Route::get('/client/update',  ['as' => 'client.update', 'uses' => 'ClientController@updateAction']);
    Route::get('/client/remove/{id}',  ['as' => 'client.remove', 'uses' => 'ClientController@removeAction']);

    Route::get('/order', 'OrderController@index');
    Route::get('/order/new',  ['as' => 'order.new', 'uses' => 'OrderController@newAction']);
    Route::get('/order/create',  ['as' => 'order.create', 'uses' => 'OrderController@createAction']);
    Route::get('/order/edit/{id}',  ['as' => 'product.edit', 'uses' => 'ProductController@editAction']);
    Route::get('/order/update',  ['as' => 'product.update', 'uses' => 'ProductController@updateAction']);
    Route::get('/order/remove/{id}',  ['as' => 'product.remove', 'uses' => 'ProductController@removeAction']);


    Route::get('/admin', 'AdminController@showRegistrationForm');
    Route::get('/admin/create', 'AdminController@create');
});

