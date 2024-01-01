<?php

namespace App\Http\Controllers;

use App\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return $unit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Unit;
        $data->uuid = GlobalController::createUuid();
        $data->name = $request->get('name');
        $data->content = $request->get('content');
        $data->save();
        echo $data . "\n";

        if(! $data) {
            return "error saving data!";
        }

        return "success saving data!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit, $uuid)
    {
        return $unit::find($uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit $unit, $uuid)
    {
        $data = $unit::find($uuid);
        $data->name = is_null($request->get('name')) ?
                    $data->name : 
                    $request->get('name');
        $data->content = is_null($request->get('content')) ?
                    $data->content :
                    $request->get('content');
        $data->save();
        echo $data . "\n";

        if(! $data) {
            return "error updating data!";
        }

        return "success updating data!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(unit $unit, $uuid)
    {
        $data = $unit::destroy($uuid);

        if(! $data) {
            return "error deleting data!";
        }

        return "success deleting data!";
    }
}
