<?php

Auth::routes();
Route::group(['prefix'  =>  'admin'], function () {
 
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
 
    Route::group(['middleware' => ['auth:admin']], function () {
 
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        
        Route::group(['prefix'  =>   'groups'], function() {
 
            Route::get('/', 'Admin\GroupsController@index')->name('admin.groups.index');
            Route::get('/create', 'Admin\GroupsController@create')->name('admin.groups.create');
            Route::post('/store', 'Admin\GroupsController@store')->name('admin.groups.store');
            Route::get('/{id}/edit', 'Admin\GroupsController@edit')->name('admin.groups.edit');
            Route::post('/update', 'Admin\GroupsController@update')->name('admin.groups.update');
            Route::get('/{id}/delete', 'Admin\GroupsController@delete')->name('admin.groups.delete');
         
        });
    });
});