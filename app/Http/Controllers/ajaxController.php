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
    	$source = DB::table('areas')
    					->join('routes','areas.id','=','routes.source_city_id')
    					->select('areas.id','areas.name as text')
    					->distinct()
              ->where('areas.deleted_at',NULL)
    					->get();
    	//echo json_encode($source);
		return response()->json($source);
    }

    public function getDestination($source_id)
    {
        $destination = DB::table('areas')
                          ->join('routes','areas.id','=','routes.destination_city_id')  
                          ->select('areas.id','areas.name as text')
                          ->distinct()
                          ->where([
                            ['routes.source_city_id',$source_id],
                            ['routes.deleted_at',NULL]
                            ])
                          ->get();
        //echo json_encode($destination);
        return response()->json($destination);                  
    }
}
