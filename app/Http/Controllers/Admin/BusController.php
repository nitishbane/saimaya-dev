<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bus;

class BusController extends Controller
{
    /**
     * Show bus index
     */
	public function index()
	{
		$bus = Bus::orderBy('name', 'asc')->simplePaginate(10);

		return view('admin.bus.index', [
			'buses' => $bus,
		]);
	}

	/**
     * Display form to add bus
     */
    public function create()
    {
    	$bus = new Bus;

    	return view('admin.bus.form', [
    		'bus' => $bus,
    	]);
    }

    /**
     * Edit bus
     */
    public function edit(Request $request, $bus_id)
    {
        $bus = Bus::find($bus_id);

        return view('admin.bus.form', [
            'bus' => $bus,
        ]);
    }

    /**
     * Save bus
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'bus-type' => 'required',
            'bus-name' => 'required',
            'bus-number' => 'required',
            'is-video-coach' => 'required',
            'is-ac' => 'required',
            'cost-per-seat' => 'required',
        ]);

        $bus_id = $request->input('bus-id');

        if($bus_id){
            $bus = Bus::find($bus_id);
        }else{
            $bus = new Bus;
        }

        $bus->type = $request->input('bus-type');
        $bus->name = $request->input('bus-name');
        $bus->number = $request->input('bus-number');
        $bus->is_video_coach = $request->input('is-video-coach');
        $bus->is_ac = $request->input('is-ac');
        $bus->cost_per_seat = $request->input('cost-per-seat');

        $bus->save();

        return redirect('admin/bus');
    }

    /**
     * Delete bus
     */
    public function destroy(Request $request, Bus $bus)
    {
        if($request->ajax()){
            if($bus->delete()){
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
