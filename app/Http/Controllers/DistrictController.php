<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DistrictController;
use App\Models\District;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $districts = District::latest()->paginate(10);
        return view('district.index',compact('districts'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('district.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        District::create($request->all());

        return redirect()->route('districts.index')
                        ->with('success','District created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district): View
    {
        return view('district.show',compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(district $district)
    {
        return view('district.edit',compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, district $district): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        $district->update($request->all());

        return redirect()->route('districts.index')
                        ->with('success','District updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(district $district): RedirectResponse
    {
        $district->delete();
        return redirect()->route('districts.index')
                        ->with('success','District deleted successfully');
    }
}
