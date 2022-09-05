<?php

namespace App\Http\Controllers;

use App\Models\Purchase_Item;
use App\Http\Requests\StorePurchase_ItemRequest;
use App\Http\Requests\UpdatePurchase_ItemRequest;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePurchase_ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchase_ItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase_Item  $purchase_Item
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase_Item $purchase_Item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase_Item  $purchase_Item
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase_Item $purchase_Item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchase_ItemRequest  $request
     * @param  \App\Models\Purchase_Item  $purchase_Item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchase_ItemRequest $request, Purchase_Item $purchase_Item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase_Item  $purchase_Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase_Item $purchase_Item)
    {
        //
    }
}
