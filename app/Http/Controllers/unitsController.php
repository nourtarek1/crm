<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class unitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $units = Unit::get();

        return view('units.index', compact('units'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::get();
        $users = User::get();

        return view('units.add_units', compact('units', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $units = new Unit();
        $units->title = $request->title;
        $units->description = $request->description;
        $units->user = (Auth::user()->name);
        $units->save();
        if ($request->user != null) {
            $units->users()->attach($request->user);
            $units->save();
        }
        session()->flash('add', '  Added Successfully ');
        return redirect('/units');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $units = Unit::find($id);
        $users = User::get();
        return view('units.edit', compact('units','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $units = Unit::find($id);
        $units->title = $request->title;
        $units->description = $request->description;
        $units->user = (Auth::user()->name);
        $units->save();
        $units->users()->detach();
        if ($request->user != null) {
            $units->users()->attach($request->user);
            $units->save();
        }
        session()->flash('edit', 'Modified Successfully');
        return redirect('/units');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        session()->flash('delete', 'Deleted');
        return back();
    }
}
