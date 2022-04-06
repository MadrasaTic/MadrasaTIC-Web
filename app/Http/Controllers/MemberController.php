<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userInformation;
use Illuminate\Support\Facades\Config;
use App\Models\Role;

class MemberController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        // dd(User::all());
        $members = User::where("acivated", 0)->get()->load(['userInformation.position']);
        // $members = User::all()->load(['userInformation.position']);
        $roles = Role::all();

        return View('members', compact('members', 'roles'));
    }

    public function create(Request $request)
    {
        $members = User::all()->load(['userInformation.position']);
        
        return View('members', compact('roles'));
    }

    public function store(Request $request)
    {
        /*$data = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);*/

        $roles = Role::all();

        $user = new User();
        $user->name = $request['first_name'].' '.$request['last_name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        // $user->role = $request['role'];

        $user->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        // dd($request);
        $user = $request->user()->load(['userInformation.position']);
        $user->userInformation->first_name = $request->first_name;
        $user->userInformation->last_name = $request->last_name;
        $user->userInformation->phone_number = $request->phone_number;
        $user->userInformation->save();
        return \Redirect::route('profile')->with('message', 'User has been updated!');
    }

    public function softDelete(Request $request, $id)
    {
        $user = User::find($id);
        $user->acivated = 1;
        $user->save();
        dd($user);
    }
}
