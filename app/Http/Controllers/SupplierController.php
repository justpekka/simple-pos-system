<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fresh_data = Supplier::all();
        foreach ($fresh_data as $i => $data) {
            print($data);
        }
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        print('<pre>');
        $name = $request->get('name');
        $brand_name = $request->get('brand-name');
        $phone_number = $request->get('phone-number');
        echo $name, "\n", $brand_name, "\n", $phone_number;
        // print($request);
        print('</pre>');
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get("name");
        $brand_name = $request->get('brand-name');
        $phone_number = $request->get('phone-number');

        $supplier = new Supplier;
        $supplier->uuid = $supplier::createUuid();
        $supplier->name = $name;
        $supplier->brand_name = $brand_name;
        $supplier->phone_number = $phone_number;
        $supplier->save();

        if(!$supplier) {
            return print "Error saving data!";
        }
        
        return print "Data saved!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
