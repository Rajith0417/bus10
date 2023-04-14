<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // echo "-0-";
        // $todos = Todo::latest()->get();
        // return view('todos.index', compact('todos'));
        // $districts = District::all();
        // print_r($districts);
        // return view('districts.index')->with('districts', $districts);
        return view('district.index', [
            'districts' => District::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Disctrict $disctrict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disctrict $disctrict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disctrict $disctrict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disctrict $disctrict)
    {
        //
    }
}
