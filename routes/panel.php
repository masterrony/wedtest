<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
|
| Here we define routes for admin, customer panel
|
*/


Route::get('/customer', 'CustomerController@__invoke')->name('customer');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    
    Route::get('/permission', 'AdminController@permissionManage')->name('permission');

    Route::get('/file', 'AdminController@fileManage')->name('file');

});