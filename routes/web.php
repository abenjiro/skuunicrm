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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'UserController@logout')->name('log-out');

Route::group(['prefix'=>'manage', 'middleware'=>'auth'],function(){
Route::get('/index', 'ManageController@index')->name('manage.dashboard');
Route::get('/create', 'CustomerController@create')->name('customer.create');
Route::post('/store', 'CustomerController@store')->name('customer.store');
Route::get('/{id}/edit', 'CustomerController@edit')->name('customer.edit');
Route::match(['put', 'patch'],'/customer/update/{id}', 'CustomerController@update')->name('customer.update');
Route::delete('customer/{id}', 'CustomerController@destroy')->name('customer.delete');
});
Route::get('/manage/customer/getdata', 'CustomerController@getdata')->name('customer.getdata');

Route::group(['prefix'=>'manage/users', 'middleware'=>'auth'],function(){
Route::get('/index', 'UserController@index')->name('user.index');
Route::get('/create', 'UserController@create')->name('user.create');
Route::post('/store', 'UserController@store')->name('user.store');
Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
Route::match(['put', 'patch'],'/update/{id}', 'UserController@update')->name('user.update');
});
Route::get('/verification/{token}', 'Auth\RegisterController@verification');

