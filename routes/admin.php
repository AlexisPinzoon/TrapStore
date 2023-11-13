<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@getDashboard');
    Route::get('/users', 'App\Http\Controllers\Admin\UserController@getUsers');
 });
