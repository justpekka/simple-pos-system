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
        echo "<pre>";
            $fresh_data = Supplier::all();
            foreach ($fresh_data as $i => $data) {
                echo json_encode($data)."\n";
            }
        echo "</pre>";
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $Supplier = new Supplier;
        $Supplier->uuid = GlobalController::createUuid();
        $Supplier->name = $request->get("name");
        $Supplier->brand_name = $request->get('brand-name');
        $Supplier->phone_number = $request->get('phone-number');
        $Supplier->save();

        echo $Supplier . "\n";

        if(!$Supplier) {
            return "Error saving data!";
        }

        return "Data saved!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier, $uuid)
    {
        $data = $supplier::find($uuid);
        $data->products;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $Supplier, $uuid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $Supplier, $uuid)
    {
        $current_data = $Supplier::find($uuid);
        $current_data->name = is_null($request->get("name")) ? 
                                $current_data->name : 
                                $request->get("name");
        $current_data->brand_name = is_null($request->get('brand-name')) ? 
                                $current_data->brand_name : 
                                $request->get("brand-name");
        $current_data->phone_number = is_null($request->get('phone-number')) ? 
                                $current_data->phone_number : 
                                $request->get('phone-number');
        $current_data->save();

        echo $current_data . "\n";

        if( ! $current_data ) {
            echo "Error updating data!";
            return;
        }

        // print $Supplier::orderBy("updated_at", "desc")->first();
        echo "Success updating data!";
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $Supplier, $uuid)
    {
        $deleteData = $Supplier::destroy($uuid);

        print_r($deleteData);
        if( ! $deleteData ) {
            print "Error deleting data! The message:";
            return;
        }
        return print "Data deleted!";
    }
}
