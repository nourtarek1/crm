<?php

namespace App\Http\Controllers;

use App\Models\Select;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selects = Select::get();
        return view('select.index', compact('selects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('select.add_list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $select = new Select();
        $select->type = $request->type;
        $select->key = $request->key;
        $select->values = $request->values;
        $select->save();
        session()->flash('add', '  Added Successfully ');
        return redirect('/select');
    }

    /**
     * Display the specified resource.
     */
    public function show(Select $select)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $select = Select::find($id);
        return view('select.edit',compact( 'select'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Select $select)
    {
        $select->type = $request->type;
        $select->key = $request->key;
        $select->values = $request->values;
        $select->save();
          session()->flash('edit', 'Modified Successfully');
        return redirect('/select');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $select = Select::find($id);
        $select->delete();
        session()->flash('delete', 'Deleted');
        return back();
    }
}
