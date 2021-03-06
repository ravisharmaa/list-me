<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
        $cart = $user->cart()->get();
        
        return $cart;
        //return response()
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
    public function store(User $user, Request $request)
    {
        $store = Store::whereName(request('storeName'))
        ->select('id')
        ->first();

        $supplier = Supplier::whereName(request('supplierName'))
            ->select('id');

        $product = $user->cart()->create([
            'name' => request('name'),
            'store_id' => $store->id,
            'slug' => Str::slug(request('name'), '-'),
            'supplier_id' => $supplier->first()->id ?? NULL,
            'completed_at' => request('completed_at'),
        ]);

        return response(
            $product
        , 200);
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
    public function edit($id)
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
    public function update(Cart $cart, User $user)
    {
        $user->cart()->whereSlug($cart->slug)->update([
            'completed_at' => now()
        ]);

        return $user->cart()->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, User $user)
    {
        $user->cart()->whereSlug($cart->slug)->delete();

        return $user->cart()->get();
    }
}
