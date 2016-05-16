<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Route;
use App\Bus;
use App\Area;

class RouteController extends Controller
{
    /**
     * Show route index
     */
	public function index()
	{
		$routes = Route::orderBy('id', 'desc')->simplePaginate(10);

		return view('admin.route.index', [
			'routes' => $routes,
		]);
	}

	/**
	 * Show new route form
	 */
	public function create()
	{
		$areas = Area::orderBy('name', 'asc')->get();
		$buses = Bus::orderBy('name', 'asc')->get();

		return view('admin.route.form', [
			'areas' => $areas,
			'buses' => $buses,
		]);
	}
}
