<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Item;
use App\Models\Purchase_Item;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $purchases = Purchase::where("created_at",">=","{$request->search}")->get();
            return view('Purchase.index',['purchases'=> $purchases ,'search'=>$request->search]);
        }
        else
        {
            $purchases = Purchase::all();
            return view('Purchase.index')->with('purchases',$purchases);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('Purchase.create')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastparchase = Purchase::create([
            'transaction_number' => $request->transaction_number,
            'from' => $request->from,
        ]);
        foreach($request->items as $index => $item){

            $product = Item::firstWhere('id', $item);

            Purchase_Item::create([
                'purchase_id' => $lastparchase->id,
                'item_id' => $item,
                'qty' => $request->qty[$index],
                'p_type' => $request->packingt[$index],
                'p_value' => $request->packingv[$index]
            ]);
            $newqty = $product->qty + $request->qty[$index] * $request->packingv[$index];
            $product->update([
                'qty' => $newqty,
            ]);
        }
        return response("the purchase create successfully", 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $items = Item::all();
        $data = ['purchase'=>$purchase,'items'=>$items];

        return view('Purchase.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        foreach($purchase->Items as $purchase_item){
            $item = Item::firstWhere('id', $purchase_item->item_id);
            if($item){
                $avilablesunit =  $item->qty - $purchase_item->qty * $purchase_item->p_value ;
                // if($avilablesunit < 0)
                //     return "the amount not enough";
                $item->update([
                    'qty' => $avilablesunit,
                ]);
            }
            $purchase_item->delete();
        }

        $purchase->update([
            'transaction_number' => $request->transaction_number,
            'from' => $request->from,
        ]);
        // return $purchase;
        foreach($request->items as $index => $item){
            $product = Item::firstWhere('id', $item);
            
            Purchase_Item::create([
                'purchase_id' => $purchase->id,
                'item_id' => $item,
                'qty' => $request->qty[$index],
                'p_type' => $request->packingt[$index],
                'p_value' => $request->packingv[$index]
            ]);
            $newqty = $product->qty + $request->qty[$index] * $request->packingv[$index];
            $product->update([
                'qty' => $newqty,
            ]);
        }

        return response("the purchase updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchase.index')->with('message', 'The Paking Deleted Succesfully');
    }
}
