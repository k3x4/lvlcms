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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'namespace' => 'Admin', 
    'middleware' => ['auth']
    ], function() {
    
    // ADMIN PANEL
    Route::get('admin', [
        'as' => 'admin.index', 
        'middleware' => 'role:admin|editor|author', 
        'uses' => 'AdminController@index'
        ]);
    
    // USERS
    Route::get('admin/users', [
        'as' => 'admin.users.index', 
        'uses' => 'UserController@index', 
        'middleware' => ['permission:user-read|user-create|user-edit|user-delete']
        ]);
    
    Route::get('admin/users/create', [
        'as' => 'admin.users.create', 
        'uses' => 'UserController@create', 
        'middleware' => ['permission:user-create']
        ]);
    
    Route::post('admin/users/create', [
        'as' => 'admin.users.store', 
        'uses' => 'UserController@store', 
        'middleware' => ['permission:user-create']
        ]);
    
    Route::get('admin/users/{id}/edit', [
        'as' => 'admin.users.edit', 
        'uses' => 'UserController@edit', 
        'middleware' => ['permission:user-edit']
        ]);
    
    Route::patch('admin/users/{id}', [
        'as' => 'admin.users.update', 
        'uses' => 'UserController@update', 
        'middleware' => ['permission:user-edit']
        ]);
    
    Route::delete('admin/users/{id}', [
        'as' => 'admin.users.destroy', 
        'uses' => 'UserController@destroy', 
        'middleware' => ['permission:user-delete']
        ]);
    
    
    // ROLES
    Route::get('admin/roles', [
        'as' => 'admin.roles.index', 
        'uses' => 'RoleController@index', 
        'middleware' => ['permission:role-read|role-create|role-edit|role-delete']
        ]);
    
    Route::get('admin/roles/create', [
        'as' => 'admin.roles.create', 
        'uses' => 'RoleController@create', 
        'middleware' => ['permission:role-create']
        ]);
    
    Route::post('admin/roles/create', [
        'as' => 'admin.roles.store', 
        'uses' => 'RoleController@store', 
        'middleware' => ['permission:role-create']
        ]);
    
    Route::get('admin/roles/{id}/edit', [
        'as' => 'admin.roles.edit', 
        'uses' => 'RoleController@edit', 
        'middleware' => ['permission:role-edit']
        ]);
    
    Route::patch('admin/roles/{id}', [
        'as' => 'admin.roles.update', 
        'uses' => 'RoleController@update', 
        'middleware' => ['permission:role-edit']
        ]);
    
    Route::delete('admin/roles/{id}', [
        'as' => 'admin.roles.destroy', 
        'uses' => 'RoleController@destroy', 
        'middleware' => ['permission:role-delete']
        ]);

    
    //PRODUCTS
    Route::get('admin/products', [
        'as' => 'admin.products.index', 
        'uses' => 'ProductController@index', 
        'middleware' => ['permission:product-read|product-create|product-edit|product-delete']
        ]);
    
    Route::get('admin/products/create', [
        'as' => 'admin.products.create', 
        'uses' => 'ProductController@create', 
        'middleware' => ['permission:product-create']
        ]);
    
    Route::post('admin/products/create', [
        'as' => 'admin.products.store', 
        'uses' => 'ProductController@store', 
        'middleware' => ['permission:product-create']
        ]);
    
    Route::get('admin/products/{id}/edit', [
        'as' => 'admin.products.edit', 
        'uses' => 'ProductController@edit', 
        'middleware' => ['permission:product-edit']
        ]);
    
    Route::patch('admin/products/{id}', [
        'as' => 'admin.products.update', 
        'uses' => 'ProductController@update', 
        'middleware' => ['permission:product-edit']
        ]);
    
    Route::delete('admin/products/{id}', [
        'as' => 'admin.products.destroy', 
        'uses' => 'ProductController@destroy', 
        'middleware' => ['permission:product-delete']
        ]);
    
    //MEDIA SIZES
    Route::get('admin/mediasizes', [
        'as' => 'admin.mediasizes.index', 
        'uses' => 'MediaSizeController@index', 
        'middleware' => ['permission:mediasize-read|mediasize-create|mediasize-edit|mediasize-delete']
        ]);
    
    Route::get('admin/mediasizes/create', [
        'as' => 'admin.mediasizes.create', 
        'uses' => 'MediaSizeController@create', 
        'middleware' => ['permission:mediasize-create']
        ]);
    
    Route::post('admin/mediasizes/create', [
        'as' => 'admin.mediasizes.store', 
        'uses' => 'MediaSizeController@store', 
        'middleware' => ['permission:mediasize-create']
        ]);
    
    Route::get('admin/mediasizes/{id}/edit', [
        'as' => 'admin.mediasizes.edit', 
        'uses' => 'MediaSizeController@edit', 
        'middleware' => ['permission:mediasize-edit']
        ]);
    
    Route::patch('admin/mediasizes/{id}', [
        'as' => 'admin.mediasizes.update', 
        'uses' => 'MediaSizeController@update', 
        'middleware' => ['permission:mediasize-edit']
        ]);
    
    Route::delete('admin/mediasizes/{id}', [
        'as' => 'admin.mediasizes.destroy', 
        'uses' => 'MediaSizeController@destroy', 
        'middleware' => ['permission:mediasize-delete']
        ]);
    
});
