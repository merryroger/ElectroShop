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

Route::name('products')->group(function () {
    Route::get('/', 'ProductController@index');
    Route::get('/products/by_category/{category_code}', 'ProductController@showByCategory')->name('.show_by_cats');
});

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/cart', 'OrderController@index')->name('cart')->middleware('cart');

//Route::middleware('user')->group(function () {
//});

Route::middleware('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.products.')->group(function () {
                Route::resource('products', 'ProductController',
                    ['names' => ['index' => 'list', 'create' => 'get_form', 'show' => 'show', 'store' => 'add',
                        'edit' => 'edit', 'update' => 'update', 'destroy' => 'remove']]);
            });
            Route::name('admin.categories.')->group(function () {
                Route::resource('categories', 'CategoryController',
                    ['names' => ['index' => 'list', 'create' => 'get_form', 'show' => 'show', 'store' => 'add',
                        'edit' => 'edit', 'update' => 'update', 'destroy' => 'remove']]);
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

