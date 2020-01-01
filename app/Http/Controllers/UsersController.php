<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Middleware
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:editor,user administrator');
    }


    public function index()
    {
        $users = User::all();
        return  view('users.index', compact('users')); // send $users to view
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)       //  admin/users/1/edit
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(User $user, Request $request)
    {

        // back-end validation
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'min:3', 'max:50', 'email']
        ]);
        //$attributes['last_modified_by'] = Auth::user()->id;
        $user->update($attributes);
        $user->roles()->sync($request->role);

        $user->last_modified_by = Auth::user()->id;
        $user->save();

        return redirect('/admin/users')->with('info','User updated successfully!');
    }


    public function destroy(User $user)
    {
        //dd($user->id);
        if ($user->id == 1) {
            return redirect('/admin/users')->with('error', 'No one can delete root administrator!');
        }

        //dd($user);
        $user->delete();

        $user->deleted_by = Auth::user()->id;
        $user->save();

        return redirect('/admin/users')->with('info', 'User soft deleted');
    }
}
