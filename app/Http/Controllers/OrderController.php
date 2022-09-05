<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Item;
use App\Models\Order_Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $orders = Order::where("created_at",">=","{$request->search}")->get();
            return view('Order.index',['orders'=> $orders ,'search'=>$request->search]);
        }
        else
        {
            $orders = Order::all();
            return view('Order.index')->with('orders',$orders);
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
        return view('Order.create')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastorder = Order::create([
            'transaction_number' => $request->transaction_number,
            'to' => $request->from,
        ]);
        foreach($request->items as $index => $item){

            $product = Item::firstWhere('id', $item);
            
            Order_Item::create([
                'order_id' => $lastorder->id,
                'item_id' => $item,
                'qty' => $request->qty[$index],
                'p_type' => $request->packingt[$index],
                'p_value' => $request->packingv[$index]
            ]);
            $newqty = $product->qty - $request->qty[$index] * $request->packingv[$index];
            $product->update([
                'qty' => $newqty,
            ]);
        }
        return response("the purchase create successfully", 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $items = Item::all();
        $data = ['order'=>$order,'items'=>$items];

        return view('order.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        foreach($order->Items as $purchase_item){
            $item = Item::firstWhere('id', $purchase_item->item_id);
            if($item){
                $avilablesunit =  $item->qty + $purchase_item->qty * $purchase_item->p_value ;
                // if($avilablesunit < 0)
                //     return "the amount not enough";
                $item->update([
                    'qty' => $avilablesunit,
                ]);
            }
            $purchase_item->delete();
        }

        $order->update([
            'transaction_number' => $request->transaction_number,
            'to' => $request->from,
        ]);
        // return $purchase;
        foreach($request->items as $index => $item){
            $product = Item::firstWhere('id', $item);
            
            Order_Item::create([
                'order_id' => $order->id,
                'item_id' => $item,
                'qty' => $request->qty[$index],
                'p_type' => $request->packingt[$index],
                'p_value' => $request->packingv[$index]
            ]);
            $newqty = $product->qty - $request->qty[$index] * $request->packingv[$index];
            $product->update([
                'qty' => $newqty,
            ]);
        }

        return response("the purchase updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('message', 'The Paking Deleted Succesfully');
    }
}
