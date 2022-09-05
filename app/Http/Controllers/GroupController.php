<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $groups = Group::where("name","like","%{$request->search}%")->get();
            return view('Group.index',['groups'=> $groups ,'search'=>$request->search]);
        }
        else
        {
            $groups = Group::all();
            return view('Group.index')->with('groups',$groups);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Group.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('group.index')->with('message', 'The Group Created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $Group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $categories = Category::all();
        $data = ['categories'=>$categories,'group'=>$group];
        return view('Group.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $Group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('group.index')->with('message', 'The Group Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $Group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index')->with('message', 'The Group Deleted Succesfully');
    }
}
