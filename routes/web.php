<?php

use App\Http\Controllers\SearchController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::match(['get', 'post'], '/', 'WelcomeController@welcome');

Route::match(['get', 'post'], '/to-ren', 'WelcomeController@toren');

Route::get('search', [
    'as' => 'search',
    'uses' => 'SearchController@getSearch'
]);

// Route::match(['get', 'post'], '/mainview', 'SearchController@getSearch');

Route::get('/vihicles/{id}', 'VihiclesController@vihicles');

Route::match(['get', 'post'], '/mainview', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::match(['get', 'post'], '/user-info', 'UsersController@userInfos');
    Route::match(['get', 'post'], '/add-info', 'UsersController@addInfo');
    Route::match(['get', 'post'], '/edit-info/{id}', 'UsersController@editInfo');
    Route::match(['get', 'post'], '/user-history', 'UsersController@history');
    Route::match(['get', 'post'], '/user-rentaling', 'UsersController@rentaling');

    Route::match(['get', 'post'], '/rentaling-edit/{id}', 'ContractController@edit');
    Route::match(['get', 'post'], '/rentaling-cancel/{id}', 'ContractController@cancel');
});


Route::get('/logout', 'UsersController@logout');


Auth::routes(['verify' => true]);
Route::prefix('{id}/checkout')->group(function () {
    Route::get('', 'VihiclesController@checkout')->name('checkout')->middleware('verified');
    Route::post('', 'VihiclesController@postCheckout')->name('post.checkout');
    Route::get('/confirm-information', 'VihiclesController@getConfirm')->name('confirm');
    Route::post('/confirm-information', 'VihiclesController@postConfirm')->name('sendinfo');
});
