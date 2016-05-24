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
        $details = array();               
        $details["source"] = $request['hidden_source'];
        $details["destination"] = $request['hidden_dest'];
        $details["date"] = $request["journey_date"]; 
    	$buses = DB::table('routes')
    					->select('buses.*','bus_route_maps.id as bus_route_map_id',DB::raw('count(bookings.seat_no)as total_seats'),'bus_route_maps.id')
                        ->join('bus_route_maps','bus_route_maps.route_id','=','routes.id')
                        ->leftJoin('buses','bus_route_maps.bus_id','=','buses.id')
                        ->where([
                            ['routes.source_city_id','=',$source],
                            ['routes.destination_city_id','=',$destination],
                            ['buses.deleted_at','=',NULL],
                            ['routes.deleted_at','=',NULL]
                            ])
                        ->groupBy('bus_route_maps.id')
                        //->select(DB::raw('count(bookings.seat_no)as total_seats'),)
                        ->leftJoin('bookings',function($join) use(&$request)
                        {
                            $join->on('bookings.bus_route_map_id','=','bus_route_maps.id')
                                    ->where('bookings.journey_date','=',$request["journey_date"]);
                            //,DB::raw('count(bookings.seat_no)as total_seats')
                        })
                        ->get();     
    	
       // echo '<pre>';				
        //print_r($buses);
        //store source and destination in sesion
        $request->session()->put('journey_details',$details);
        return view('buslist',['buses'=>$buses,'details'=>$details]);
    }

    public function bookTicket(Request $request)
    {
        //store all form data in session
        $request->session()->put('seat_details',$request->all());
        $journey_details =  $request->session()->get('journey_details');
        $booking = array();
        foreach($request->pname as $k =>$v)
        {
             $booking[] = [
                'bus_route_map_id' => $request->bus_route_map,
                'seat_no' => $request->seats[$k],
                'passenger_name' =>  $request->pname[$k],
                'gender' => $request->gender[$k],
                'journey_date' => $journey_details["date"]
             ];  
        }
        DB::table('bookings')->insert($booking);
        //echo '<pre>';
        //print_r($request->all());
    }

    public function getSeatInfo(Request $request)
    {
        $seats = DB::table('bookings')
                    ->select('seat_no')
                    ->where([
                            ['journey_date',$request->date],
                            ['bus_route_map_id',$request->bus_route_map_id]
                        ])
                    ->get();

        return response()->json($seats);            
    }
}
