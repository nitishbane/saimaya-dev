<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();

	Route::get('/home', 'HomeController@index');
});

/*
All admin routes will be added here
 */
Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin', 'Admin\AdminController@index');

	// area
	Route::get('/admin/area', 'Admin\AreaController@index');
	Route::post('/admin/area/save', 'Admin\AreaController@save');
	Route::get('/admin/area/delete/{area}', 'Admin\AreaController@destroy');

	// stop
	Route::get('/admin/stop', 'Admin\StopController@index');
	Route::get('/admin/stop/create', 'Admin\StopController@create');
	Route::get('/admin/stop/delete/{stop}', 'Admin\StopController@destroy');
	Route::post('/admin/stop/delete/{stop}', 'Admin\StopController@destroy');
});
