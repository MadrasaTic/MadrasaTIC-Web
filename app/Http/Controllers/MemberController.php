<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        // dd($members->toArray());
        
        return View('members', compact('members'));
    }
}
