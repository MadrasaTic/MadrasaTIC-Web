<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $roles = Role::all();
        
        return View('members', compact('members'));
    }

    public function create(Request $request)
    {
        $members = User::all()->load(['userInformation.position']);

        //$user = new User();
        // dd($members->toArray());
        
        return View('members', compact('members'));
    }

    public function store(Request $request)
    {
        dd($request->toArray());
    }
}
