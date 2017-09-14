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

Route::get('/','UsersController@show_all');
Route::get('/user/{id}','UsersController@show');
Route::get('/user_add/','UsersController@add');
Route::post('/user_add/','UsersController@add_user');
Route::get('/user_edit/{id}','UsersController@edit');
Route::patch('/user_edit/{id}','UsersController@edit_user');
Route::get('/user_delete/{id}','UsersController@delete');
