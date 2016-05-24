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
        $stop = new Stop;

    	return view('admin.stop.form', [
            'stop_detail' => $stop,
    		'areas' => $areas,
    	]);
    }

    /**
     * Edit stop
     */
    public function edit(Request $request, $stop_id)
    {
        $stop = Stop::find($stop_id);
        $areas = Area::orderBy('name', 'asc')->get();

        return view('admin.stop.form', [
            'stop_detail' => $stop,
            'areas' => $areas,
        ]);
    }

    /**
     * Save stop
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'area-name' => 'required',
            'stop-name' => 'required',
            'full-address' => 'required',
            'description' => 'required',
        ]);

        $stop_id = $request->input('stop-id');

        if($stop_id){
            $stop = Stop::find($stop_id);
        }else{
            $stop = new Stop;
        }

        $stop->area_id = $request->input('area-name');
        $stop->name = $request->input('stop-name');
        $stop->full_address = $request->input('full-address');
        $stop->description = $request->input('description');

        $stop->save();

        return redirect('admin/stop');
    }

    /**
     * Delete stop
     */
    public function destroy(Request $request, Stop $stop)
    {
        if($request->ajax()){
            if($stop->delete()){
                return response()->json([
                    'deleted' => "1"
                ]);
            }else{
                return response()->json([
                    'deleted' => "0"
                ]);
            }
        }
    }
    
    /**
     * Get all stops by area
     */
    public function get_stops(Request $request, Area $area)
    {
        if($request->ajax()){
            $stops = Stop::where('area_id', $area->id)
                    ->orderBy('name', 'asc')
                    ->get();
            
            if(count($stops)){
                return response()->json([
                    'data' => $stops
                ]);
            }else{
                return response()->json([
                    'data' => "0"
                ]);
            }
        }else{
            return response()->json([
                'data' => "0"
            ]);
        }
    }
}
