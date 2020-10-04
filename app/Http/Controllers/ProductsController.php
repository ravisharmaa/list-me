<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $product = Product::create([
            'name' => \request('name'),
            'flavour' => \request('flavour'),
            'weight' => \request('weight'),
            'unit' => \request('unit'),
            'price' => \request('price'),
            'minimum_order_quantity' => \request('minimum_order_quantity'),
            'in_stock' => \request('in_stock'),
            'is_new' => \request('is_new'),
            'offer_price' => \request('offer_price'),
            'offer_label' => \request('offer_label'),
            'offer_valid_till' => \request('offer_valid_till'),
            'category_id' => \request('category_id')
        ]);

         return response([$product], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $product->update([
            'name' => \request('name'),
            'flavour' => \request('flavour'),
            'weight' => \request('weight'),
            'unit' => \request('unit'),
            'price' => \request('price'),
            'minimum_order_quantity' => \request('minimum_order_quantity'),
            'in_stock' => \request('in_stock'),
            'is_new' => \request('is_new'),
            'offer_price' => \request('offer_price'),
            'offer_label' => \request('offer_label'),
            'offer_valid_till' => \request('offer_valid_till'),
            'category_id' => \request('category_id')
        ]);

        return response([
            $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response([
            'success' => true
        ], 200);
    }
}
