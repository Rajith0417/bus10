<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WaypointController;
use App\Models\Waypoint;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WaypointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $waypoints = Waypoint::latest()->paginate(50);
        return view('waypoint.index',compact('waypoints'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('waypoint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'district_id' => 'required',
            'show' => 'required',
            'parent_id' => 'required',
        ]);

        Waypoint::create($request->all());

        return redirect()->route('waypoints.index')
                        ->with('success','Waypoint created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Waypoint $waypoint): View
    {
        return view('waypoint.show',compact('waypoint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(waypoint $waypoint)
    {
        return view('waypoint.edit',compact('waypoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, waypoint $waypoint): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'district_id' => 'required',
            'show' => 'required',
            'parent_id' => 'required',
        ]);

        $waypoint->update($request->all());

        return redirect()->route('waypoints.index')
                        ->with('success','Waypoint updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(waypoint $waypoint): RedirectResponse
    {
        $waypoint->delete();
        return redirect()->route('waypoints.index')
                        ->with('success','Waypoint deleted successfully');
    }
}
