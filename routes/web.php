<?php



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'UserController@loginUsers')->name('login.user');
Route::get('/logout', 'UserController@logout')->name('log-out');


Route::get('manage/index', 'ManageController@index')->name('manage.dashboard')->middleware('auth');

//For all customers
Route::group(['prefix'=>'manage/customers', 'middleware'=>'auth'],function(){

Route::get('/index', 'CustomerController@index')->name('customer.index');
Route::get('/create', 'CustomerController@create')->name('customer.create');
Route::post('/store', 'CustomerController@store')->name('customer.store');
Route::get('/{id}/edit', 'CustomerController@edit')->name('customer.edit');
Route::match(['put', 'patch'],'/update/{id}', 'CustomerController@update')->name('customer.update');
Route::delete('/{id}', 'CustomerController@destroy')->name('customer.delete');
});



//For all users
Route::group(['prefix'=>'manage/users', 'middleware'=>'auth'],function(){
Route::get('/index', 'UserController@index')->name('user.index');
Route::get('/create', 'UserController@create')->name('user.create');
Route::post('/store', 'UserController@store')->name('user.store');
Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
Route::match(['put', 'patch'],'/update/{id}', 'UserController@update')->name('user.update');
Route::delete('/{id}', 'UserController@destroy')->name('user.delete');
});

//For all Roles
Route::group(['prefix'=>'manage/roles', 'middleware'=>'auth'],function(){
Route::get('/index', 'RoleController@index')->name('role.index');
Route::get('/create', 'RoleController@create')->name('role.create');
Route::post('/store', 'RoleController@store')->name('role.store');
Route::get('/{id}/edit', 'RoleController@edit')->name('role.edit');
Route::match(['put', 'patch'],'/update/{id}', 'RoleController@update')->name('role.update');
Route::delete('/{id}', 'RoleController@destroy')->name('role.delete');
});

//For all Permission
Route::group(['prefix'=>'manage/permissions', 'middleware'=>'auth'],function(){
Route::get('/index', 'PermissionController@index')->name('permission.index');
Route::get('/create', 'PermissionController@create')->name('permission.create');
Route::post('/store', 'PermissionController@store')->name('permission.store');
Route::get('/{id}/edit', 'PermissionController@edit')->name('permission.edit');
Route::match(['put', 'patch'],'/update/{id}', 'PermissionController@update')->name('permission.update');
Route::delete('/{id}', 'PermissionController@destroy')->name('permission.delete');
});

Route::get('/verification/{token}', 'UserController@verification');

