<?php 

use Illuminate\Support\Facades\Route;

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






// Route for home page
Route::get('/', 'HomeController')->name('home');

// Route for panel enter
Route::get('/panel', 'PanelController@index')->name('panel')->middleware('check.auth');



// ================================================================================================================
// define route for login or logout ===============================================================================
// ================================================================================================================

Route::group(['prefix' => '/login', 'as' => 'login'], function() {
    
    Route::get('/', 'LoginController@index');

    Route::post('/', 'LoginController@authUser');
    
});

Route::get('/logout', 'LoginController@unauthUser')->name('logout');

// ================================================================================================================







// ================================================================================================================
// define route for file management api with ajax =================================================================
// ================================================================================================================

Route::group(['prefix' => '/file', 'as' => 'file.', 'middleware' => 'check.auth'], function() {

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
});

// =================================================================================================================