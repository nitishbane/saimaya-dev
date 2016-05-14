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
    	$source = DB::table('cities')
    					->join('routes','cities.id','=','routes.source_city_id')
    					->select('cities.id','cities.name as text')
    					->distinct()
              ->where('cities.is_delete',0)
    					->get();
    	//echo json_encode($source);
      return response()->json($source);
    }

    public function getDestination($source_id)
    {
        $destination = DB::table('cities')
                          ->join('routes','cities.id','=','routes.destination_city_id')  
                          ->select('cities.id','cities.name as text')
                          ->distinct()
                          ->where([
                            ['routes.source_city_id',$source_id],
                            ['routes.is_delete',0]
                            ])
                          ->get();
        //echo json_encode($destination);
        return response()->json($destination);                  
    }
}
