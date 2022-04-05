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
        $members = User::all()->load(['userInformation.position']);


        dd($members, $roles);
        return View('members', compact('members', 'roles'));
    }

    public function create(Request $request)
    {
        $members = User::all()->load(['userInformation.position']);
        // dd($members->toArray());
        
        return View('members', compact('members'));
    }

    public function store(Request $request)
    {
        /*$data = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);*/
        // dd($request);
        $user = new User();
        $user->name = $request['first_name'];
        $user->name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->role = $request['role'];

        $user->save();
        return redirect()->back();
    }
}
