<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@getDashboard');
    Route::get('/users', 'App\Http\Controllers\Admin\UserController@getUsers');

    Route::get('/products', 'App\Http\Controllers\Admin\ProductController@getHome');
    Route::get('/product/add', 'App\Http\Controllers\Admin\ProductController@getProductAdd');

 });
