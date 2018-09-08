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
        Route::prefix('admin')->group(function () {
            Route::name('admin.products.')->group(function () {
                Route::resource('products', 'ProductController',
                    ['only' => ['index', 'create'],
                     'names' => ['index' => 'list', 'create' => 'get_form']]);
            });
            Route::name('admin.categories.')->group(function () {
                Route::resource('categories', 'CategoryController',
                    ['only' => ['index', 'show', 'create', 'store'],
                     'names' => ['index' => 'list', 'create' => 'get_form', 'show' => 'show', 'store' => 'add']]);
            });
            Route::name('admin.orders.')->group(function () {
                Route::get('/orders', 'OrderController@index')->name('list');
            });
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

