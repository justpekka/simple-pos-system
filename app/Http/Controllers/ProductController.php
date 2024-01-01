<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "<pre>";
            $products = Product::all();
            foreach ($products as $key => $value) {
                echo json_encode($value)."\n";
            }
        echo "</pre>";
        return;
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
        $Product = new Product();
        $Product->uuid = GlobalController::createUuid();
        $Product->name = $request->get("name");
        $Product->supplier_uuid = $request->get("supplier-uuid");
        $Product->save();
        echo $Product . "\n";

        if(! $Product) {
            return "Data couldn't saved!";
        }
        
        return "Data saved!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product, $uuid)
    {
        $data = $product->find($uuid);
        $data->supplier;
        $data->stock;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product, $uuid)
    {
        $data = $product->find($uuid);
        $data->name = is_null($request->get("name")) ?
                    $data->name :
                    $request->get("name");
        $data->supplier_uuid = is_null($request->get("supplier-uuid")) ?
                    $data->supplier_uuid :
                    $request->get("supplier-uuid");
        $data->save();

        echo $data . "\n";

        if(! $data) {
            return "error updating data!";
        }

        return "Success updating data!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $uuid)
    {
        $status = $product->destroy($uuid);
        echo $status . "\n";

        if(! $status) {
            return "error deleting data!";
        }

        return "Success deleting data!";
    }
}
