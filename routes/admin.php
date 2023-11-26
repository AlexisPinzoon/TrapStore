<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@getDashboard')->name('dashboard');

    Route::get('/users/{status}', 'App\Http\Controllers\Admin\UserController@getUsers')->name('user_list');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\Admin\UserController@getUserEdit')->name('user_edit');
    Route::post('/user/{id}/edit', 'App\Http\Controllers\Admin\UserController@postUserEdit')->name('user_edit');

    Route::get('/user/{id}/banned', 'App\Http\Controllers\Admin\UserController@getUserBanned')->name('user_banned');
    Route::get('/user/{id}/permissions', 'App\Http\Controllers\Admin\UserController@getUserPermissions')->name('user_permissions');
    Route::post('/user/{id}/permissions', 'App\Http\Controllers\Admin\UserController@postUserPermissions')->name('user_permissions');





    Route::get('/products', 'App\Http\Controllers\Admin\ProductController@getHome')->name('products');
    Route::get('/product/add', 'App\Http\Controllers\Admin\ProductController@getProductAdd')->name('product_add');
    Route::post('/product/add', 'App\Http\Controllers\Admin\ProductController@postProductAdd')->name('product_add');
    Route::get('/product/{id}/edit', 'App\Http\Controllers\Admin\ProductController@getProductEdit')->name('product_edit');
    Route::post('/product/{id}/edit', 'App\Http\Controllers\Admin\ProductController@postProductEdit')->name('product_edit');
    Route::post('/product/{id}/gallery/add', 'App\Http\Controllers\Admin\ProductController@postProductGalleryAdd')->name('product_gallery_add');
    Route::get('/product/{id}/gallery/{gid}/delete', 'App\Http\Controllers\Admin\ProductController@getProductGalleryDelete')->name('product_gallery_delete');






    Route::get('/categories/{section}', 'App\Http\Controllers\Admin\CategoriesController@getHome')->name('categories');
    Route::post('/category/add', 'App\Http\Controllers\Admin\CategoriesController@postCategoryAdd')->name('category_add');
    Route::get('/category/{id}/edit','App\Http\Controllers\Admin\CategoriesController@getCategoryEdit')->name('category_edit');
    Route::post('/category/{id}/edit','App\Http\Controllers\Admin\CategoriesController@postCategoryEdit')->name('category_edit');
    Route::get('/category/{id}/delete','App\Http\Controllers\Admin\CategoriesController@getCategoryDelete')->name('category_delete');



 });
