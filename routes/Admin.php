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

        Route::group(['prefix'  =>   'admins'], function() {
 
            Route::get('/', 'Admin\AdminsController@index')->name('admin.admins.index');
            Route::get('/create', 'Admin\AdminsController@create')->name('admin.admins.create');
            Route::post('/store', 'Admin\AdminsController@store')->name('admin.admins.store');
            Route::get('/{id}/profile', 'Admin\AdminsController@profile')->name('admin.admins.profile');
            Route::get('/{id}/edit', 'Admin\AdminsController@edit')->name('admin.admins.edit');
            Route::post('/update', 'Admin\AdminsController@update')->name('admin.admins.update');
            Route::get('/{id}/delete', 'Admin\AdminsController@delete')->name('admin.admins.delete');
         
        });
        Route::group(['prefix'  =>   'groups'], function() {
 
            Route::get('/', 'Admin\GroupsController@index')->name('admin.groups.index');
            Route::get('/create', 'Admin\GroupsController@create')->name('admin.groups.create');
            Route::post('/store', 'Admin\GroupsController@store')->name('admin.groups.store');
            Route::get('/{id}/edit', 'Admin\GroupsController@edit')->name('admin.groups.edit');
            Route::post('/update', 'Admin\GroupsController@update')->name('admin.groups.update');
            Route::get('/{id}/delete', 'Admin\GroupsController@delete')->name('admin.groups.delete');
         
        });

        Route::group(['prefix'  =>   'combination'], function() {
            /**user groups combination */
            Route::get('/Createcombination', 'Admin\GroupConbinationController@combination')->name('admin.combination.combination');
            Route::post('/storeCombination', 'Admin\GroupConbinationController@storeCombination')->name('admin.combination.storeCombination');
            Route::get('/indexCombination', 'Admin\GroupConbinationController@indexCombination')->name('admin.combination.indexCombination');
            Route::get('/{id}/edit', 'Admin\GroupConbinationController@edit')->name('admin.combination.editCombination');
            Route::post('/update', 'Admin\GroupConbinationController@update')->name('admin.combination.updateCombination');
            Route::get('/{id}/delete', 'Admin\GroupConbinationController@delete')->name('admin.combination.deleteCombination');
            /**end */
        });
    });
});