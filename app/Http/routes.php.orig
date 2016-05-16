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
	Route::get('/admin/stop/edit/{stop}', 'Admin\StopController@edit');
	Route::post('/admin/stop/save', 'Admin\StopController@save');
	Route::get('/admin/stop/delete/{stop}', 'Admin\StopController@destroy');

	// bus
	Route::get('/admin/bus', 'Admin\BusController@index');
	Route::get('/admin/bus/create', 'Admin\BusController@create');
	Route::get('/admin/bus/edit/{bus}', 'Admin\BusController@edit');
	Route::post('/admin/bus/save', 'Admin\BusController@save');
	Route::get('/admin/bus/delete/{bus}', 'Admin\BusController@destroy');

	// route
	Route::get('/admin/route', 'Admin\RouteController@index');
	Route::get('/admin/route/create', 'Admin\RouteController@create');
});
