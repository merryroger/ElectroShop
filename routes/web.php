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

Route::get('/', 'ProductController@index')->name('products');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/cart', 'OrderController@index')->name('cart')->middleware('cart');

Route::middleware('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::name('admin.products.')->group(function () {
            Route::get('/admin/products', 'ProductController@index')->name('list');
            Route::get('/admin/products/add', 'ProductController@create')->name('get_form');
        });
        Route::name('admin.categories.')->group(function () {
            Route::get('/admin/categories', 'CategoryController@index')->name('list');
            Route::get('/admin/categories/show/{category}', 'CategoryController@show')->name('show');
            Route::get('/admin/categories/add', 'CategoryController@create')->name('get_form');
            Route::post('/admin/categories', 'CategoryController@store')->name('add');
        });
        Route::name('admin.orders.')->group(function () {
            Route::get('/admin/orders', 'OrderController@index')->name('list');
        });
    });
});

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register');
});

