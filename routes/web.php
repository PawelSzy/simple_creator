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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user_email/{user_id?}','UserAjaxController@index');

Route::post('/user_email_add/','UserAjaxController@add_user_additional_email');
Route::delete('/user_email/{id?}','UserAjaxController@delete_email');


