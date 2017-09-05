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

//Route::get('admin', 'AdminController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('admin/login', 'AdminController@login');

Route::group(['middleware' => ['admin', 'role:admin|editor|author']], function() {
    Route::get('admin', 'AdminController@index');
});
