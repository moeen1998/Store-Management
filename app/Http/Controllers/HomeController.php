<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Purchase;
use App\Models\Purchase_Item;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::count();
        $groups = Group::count();
        $items = Item::count();
        $orders = Order::orderBy('created_at', 'DESC')->Limit(10)->get();
        $purchases = Purchase::orderBy('created_at', 'DESC')->Limit(10)->get();
        $data = ['categories'=> $categories,'groups'=> $groups,'items'=> $items,'orders'=> $orders,'purchases'=> $purchases];
        return view('welcome')->with('data',$data);
    }
    
    public function packing(Item $item){
        return $item->Pakings;
    }

    public function itemhistory(Item $item){
        $orders= Order_Item::where("item_id","=","{$item->id}")->get();
        $purchases= Purchase_Item::where("item_id","=","{$item->id}")->get();
        $data = ['orders' => $orders,'purchases' => $purchases];
        return view('itemhistory')->with('data',$data);
    }
}
