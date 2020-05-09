<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for file Routes
|--------------------------------------------------------------------------
|
| Here we define api routes for file management ajax requiests
|
*/
  
// route for open specific folder
Route::get('/open-folder', 'FileManageController@openFolder');

// route for create folder
Route::post('/create-folder', 'FileManageController@createFolder');

// route for upload new file
Route::post('/upload', 'FileManageController@uploadFile');

// route for delete file, folder'
Route::delete('/delete', 'FileManageController@delete');

// route for rename file, folder
Route::patch('/rename', 'FileManageController@rename');

// route for move file, folder
Route::patch('/move', 'FileManageController@move');

// route for download
Route::get('/download/', 'FileManageController@download')->name('download');