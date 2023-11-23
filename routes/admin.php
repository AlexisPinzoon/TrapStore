<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@getDashboard');
    Route::get('/users', 'App\Http\Controllers\Admin\UserController@getUsers');

    Route::get('/products', 'App\Http\Controllers\Admin\ProductController@getHome');
    Route::get('/product/add', 'App\Http\Controllers\Admin\ProductController@getProductAdd');
    Route::post('/product/add', 'App\Http\Controllers\Admin\ProductController@postProductAdd');
    Route::get('/product/{id}/edit', 'App\Http\Controllers\Admin\ProductController@getProductEdit');
    Route::post('/product/{id}/edit', 'App\Http\Controllers\Admin\ProductController@postProductEdit');
    Route::post('/product/{id}/gallery/add', 'App\Http\Controllers\Admin\ProductController@postProductGalleryAdd');
    Route::get('/product/{id}/gallery/{gid}/delete', 'App\Http\Controllers\Admin\ProductController@getProductGalleryDelete');






    Route::get('/categories/{section}', 'App\Http\Controllers\Admin\CategoriesController@getHome');
    Route::post('/category/add', 'App\Http\Controllers\Admin\CategoriesController@postCategoryAdd');
    Route::get('/category/{id}/edit','App\Http\Controllers\Admin\CategoriesController@getCategoryEdit');
    Route::post('/category/{id}/edit','App\Http\Controllers\Admin\CategoriesController@postCategoryEdit');
    Route::get('/category/{id}/delete','App\Http\Controllers\Admin\CategoriesController@getCategoryDelete');



 });
