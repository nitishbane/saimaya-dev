<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Bus;
use App\Route;
use App\Bus_route_map;

class BusController extends Controller
{
    public function findBus(Request $request)
    {
    	$source = $request['source'];
    	$destination = $request['destination'];
    	//echo $request['journey_date'];
    	//echo 'Request Received';

    	$bus_map = DB::table('bus_route_maps')
    					->join('routes','bus_route_maps.route_id','=','routes.id')
    					->select('bus_route_maps.bus_id')
    					->where([
    						['routes.source_city_id',$source],	
    						['routes.destination_city_id',$destination]	
    						])
    					->get();
    	$buses = DB::table('buses')
    					->select('*')
    					->where('id','=in','1')
    					->get();	
    	print_r($buses);				
    }
}
