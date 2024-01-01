<?php

namespace App\Http\Controllers;

use App\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all();
        return $stock;
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
        $data = new Stock;
        $data->uuid = GlobalController::createUuid();
        $data->product_uuid = $request->get("product-uuid");
        $data->unit_uuid = $request->get("unit-uuid");
        $data->amount = $request->get("amount");
        $data->save();
        echo $data;

        if(! $data) {
            return "error saving data!";
        }

        return "success saving data!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock, $uuid)
    {
        return $stock::find($uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock, $uuid)
    {
        $status = $stock->destroy($uuid);
        print $status;

        if(! $status) {
            return "error deleting data!";
        }

        return "success deleting data!";

    }
}
