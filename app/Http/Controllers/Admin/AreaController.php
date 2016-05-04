<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;

class AreaController extends Controller
{
    /**
     * Show the Area index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$areas = Area::orderBy('name', 'asc')->simplePaginate(10);

        return view('admin.area.index', ['areas' => $areas]);
    }

    /**
     * Save area
     */
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'area-name' => 'required',
    	]);

    	$area_id = $request->input('area-id');

    	if($area_id)
    	{
    		$area = Area::find($area_id);
    	}else
    	{
    		$area = new Area;
    	}

    	$area->name = $request->input('area-name');

    	$area->save();

    	return redirect('admin/area');
    }

    /**
     * Delete area
     */
    public function destroy(Request $request, Area $area)
    {
        if($request->ajax()){
            if($area->delete()){
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
}
