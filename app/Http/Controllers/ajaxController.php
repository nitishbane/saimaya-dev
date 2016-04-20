<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\City;
use App\Route;

class AjaxController extends Controller
{
    public function getSource()
    {
    	$city = new city();
    	$routes = new Route();
    	$all_cities = $city->get();
    	$source = DB::table('cities')
    					->join('routes','cities.id','=','routes.source_city_id')
    					->select('cities.id','cities.name as text')
    					->distinct()
    					->get();
    	echo json_encode($source);
    }
}
