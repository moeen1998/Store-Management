<?php

namespace App\Http\Controllers;

use App\Models\Paking;
use App\Http\Requests\StorePakingRequest;
use App\Http\Requests\UpdatePakingRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class PakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $pakings = Paking::where("name","like","%{$request->search}%")->get();
            return view('Paking.index',['pakings'=> $pakings ,'search'=>$request->search]);
        }
        else
        {
            $pakings = Paking::all();
            return view('Paking.index')->with('pakings',$pakings);
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
        return view('Paking.create')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePakingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePakingRequest $request)
    {
        Paking::create([
            'item_id' => $request->item_id,
            'name' => $request->name,
            'value' => $request->value,
        ]);
        return redirect()->route('paking.index')->with('message', 'The Paking Created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paking  $paking
     * @return \Illuminate\Http\Response
     */
    public function edit(Paking $paking)
    {
        $items = Item::all();
        $data = ['paking'=>$paking,'items'=>$items];

        return view('Paking.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePakingRequest  $request
     * @param  \App\Models\Paking  $paking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePakingRequest $request, Paking $paking)
    {
        $paking->update([
            'item_id' => $request->item_id,
            'name' => $request->name,
            'value' => $request->value,
        ]);
        return redirect()->route('paking.index')->with('message', 'The Paking Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paking  $paking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paking $paking)
    {
        $paking->delete();
        return redirect()->route('paking.index')->with('message', 'The Paking Deleted Succesfully');
    }
}
