<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Select;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class leadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $leads = Lead::get();
        $units = Unit::get();
        return view('leads.index', compact('leads', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leads = Lead::all();
        $units = Unit::get();
        $users = User::get();
        $channels = Select::where('type', 'channel')->pluck('key', 'values');
        $actions = Select::where('type', 'action')->pluck('key', 'values');
        $status = Select::where('type', 'status')->pluck('key', 'values');
        return view('leads.add_leads', compact('leads',  'units', 'channels', 'actions', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:11'],
            'channel' => ['required', 'string'],
            'action' => ['required', 'string'],
            'status' => ['required', 'string'],
            'note' => ['required', 'string'],
            'unit_id' => ['required'],
        ]);
        $unit_id = Unit::find('id');
        $lead = new Lead();
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->channel = $request->channel;
        $lead->action = $request->action;
        $lead->status = $request->status;
        $lead->note = $request->note;
        $lead->unit_id = $request->unit_id;
        $lead->sales_id = Auth::user()->name;
        $lead->save();
        session()->flash('add', '  Added Successfully ');
        return redirect('/leads');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leads = Lead::find($id);
        $units = Unit::get();
        $users = User::get();
        return view('leads.edit_leads', compact('leads', 'units', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $unit_id = Unit::find('id');
        $leads = Lead::find($id);
        $leads->name = $request->name;
        $leads->phone = $request->phone;
        $leads->channel = $request->channel;
        $leads->action = $request->action;
        $leads->status = $request->status;
        $leads->note = $request->note;
        $leads->unit_id = $request->unit_id;
        $leads->sales_id = (Auth::user()->name);
        $leads->save();

        session()->flash('edit', 'Modified Successfully');
        return redirect('/leads');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $leads = Lead::find($id);
        $leads->delete();
        session()->flash('delete', 'Deleted');
        return back();
    }
}
