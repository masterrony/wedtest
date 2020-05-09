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

Route::get('/', 'HomeController')->name('home');





// ================================================================================================================
// define route for auth ==========================================================================================
// ================================================================================================================

Route::group([
    'prefix' => 'auth', 
    'as' => 'auth.'
    ], function() {
    
    Route::get('/', 'AuthController@index');

    Route::post('/signin', 'AuthController@signIn')->name('sign_in');
   
    Route::get('/singout', 'AuthController@signOut')->name('sign_out');
});

// ================================================================================================================