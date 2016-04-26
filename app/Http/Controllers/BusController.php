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
    	$buses = DB::table('routes')
    					->select('buses.*')
                        ->join('bus_route_maps','bus_route_maps.route_id','=','routes.id')
                        ->join('buses','bus_route_maps.bus_id','=','buses.id')
    					->where([
                            ['routes.source_city_id',$source],
                            ['routes.destination_city_id',$destination]
                            ])
    					->get();

        $details = array();               
        $details["source"] = $request['hidden_source'];
        $details["destination"] = $request['hidden_dest'];
        $details["date"] = $request["journey_date"];               
//print_r($buses);
        return view('buslist',['buses'=>$buses,'details'=>$details]);
    }
}
