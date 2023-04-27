<?php

namespace App\Http\Controllers;

use App\Models\Waypoint;
use App\Models\District;

// use App\Http\Controllers\RoadController;
use App\Models\Road;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roads = Road::latest()->paginate(10);
        return view('road.index' ,compact('roads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $districts = District::all();
        return view('road.create')->with('districts', $districts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'distance' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'bidirection' => ['required', 'not_in:0'],
            'outstation' => ['required', 'not_in:0'],
        ]);

        $bidirection = $request->input('bidirection') ? 1 : 0;
        $outstation = $request->input('outstation') ? 1 : 0;
        $waypointsInput = $request->input('waypoints');
        $waypointArray = explode(",",$waypointsInput);
        print_r($waypointArray);

        $road = Road::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'distance' => $request->input('distance'),
            'bidirection' => $bidirection,
            'outstation' => $outstation,
        ]);

        $road_id = $road->id;

        $waypoints = Waypoint::whereIn('id', $waypointArray)->get();
        $order = 1; // initial value for the order

        foreach ($waypointArray as $waypointId) {
            $road->waypoints()->attach($waypointId, ['orderr' => $order]);
            $order++; // increment the order value
        }

        return redirect()->route('roads.index')
                        ->with('success','Road created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Road $road): view
    {
        $waypointCoords = [];
        foreach ($road->waypoints as $waypoint)
        {
            $waypointCoords[] = [
                'lat' => $waypoint->lat,
                'lng' => $waypoint->lng,
                // 'name' => $waypoint->name
            ];
        }

        return view('road.show')->with('road', $road)->with('waypoints',$road->waypoints)->with('waypointsCoords',$waypointCoords);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Road $road): view
    {
        // return view('road.edit',compact('road'));
        $districts = District::all();
        return view('road.edit')->with('road', $road)->with('districts', $districts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Road $road): RedirectResponse
    {
        // echo "<br><br>";
        $request->validate([
            'name' => 'required',
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'distance' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'bidirection' => ['not_in:0'],
            'outstation' => ['not_in:0'],
        ]);

        $bidirection = $request->input('bidirection') ? 1 : 0;
        $outstation = $request->input('outstation') ? 1 : 0;
        $waypointsInput = $request->input('waypoints');
        $waypointArray = explode(",",$waypointsInput);
        // print_r($waypointArray);

        $road->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'distance' => $request->input('distance'),
            'bidirection' => $bidirection,
            'outstation' => $outstation,
        ]);

        $road_id = $road->id;

        $road->waypoints()->detach();

        $waypoints = Waypoint::whereIn('id', $waypointArray)->get();
        $order = 1; // initial value for the order

        foreach ($waypointArray as $waypointId) {
            $road->waypoints()->attach($waypointId, ['orderr' => $order]);
            $order++; // increment the order value
        }
        return redirect()->route('roads.index')
                        ->with('success','Road created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Road $road): RedirectResponse
    {
        $road->waypoints()->detach();
        $road->delete();
        return redirect()->route('roads.index')
                        ->with('success','District deleted successfully');
    }
}
