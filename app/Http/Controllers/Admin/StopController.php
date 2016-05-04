<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stop;
use App\Area;

class StopController extends Controller
{
    /**
     * Show the Stop index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$stops = Stop::orderBy('name', 'asc')->simplePaginate(10);

        return view('admin.stop.index', [
        	'stops' => $stops,
        ]);
    }

    /**
     * Display form to add stop
     */
    public function create()
    {
    	$areas = Area::orderBy('name', 'asc')->get();

    	return view('admin.stop.create', [
    		'areas' => $areas,
    	]);
    }
}
