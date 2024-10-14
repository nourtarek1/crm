<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Unit;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        // select  role is team leader
        $teamLeaders = User::whereHas('roles', function ($q) {
            $q->where('name', 'TeamLader');
        })->get();
        $users = User::all();
        $units = Unit::all();
        return view('users.add_users', [
            'roles' => $roles,
            'users' => $users,
            'units' => $units,
            'teamLeaders' => $teamLeaders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email',  'unique:users'],
            'phone' => ['required'],
            'user_type' => ['required'],
            'role' => ['required'],
            'password' => ['required'],
        ]);
        $role = Role::find('id');
        $unit = Unit::find('id');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->role_id = $request->role;
        $user->unit = $request->unit;
        $user->parent_id = $request->parent_id;
        $user->save();
        if ($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }
        if ($request->unit != null) {
            $user->units()->attach($request->unit);
            $user->save();
        }
        session()->flash('add', '  Added Successfully ');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $users = User::get();
        $units = Unit::all();
        $teamLeaders = User::whereHas('roles', function ($q) {
            $q->where('name', 'TeamLader');
        })->get();

        //  dd($rolePermission);

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'users' => $users,
            'teamLeaders' => $teamLeaders,
            'units' => $units
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $role = Role::find('id');
        $unit = Unit::find('id');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->role_id = $request->role;
        $user->unit = $request->unit;
        $user->parent_id = $request->parent_id;
        if ($request->password != Null) {
            $user->password = Hash::make($request->password);
        }
        $user->parent_id = $request->parent_id;
        $user->save();
        $user->roles()->detach();
        if ($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }
        if ($request->unit != null) {
            $user->units()->attach($request->unit);
            $user->save();
        }
        session()->flash('edit', 'Modified Successfully');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('delete', 'Deleted');
        return redirect('/users');
    }
}
