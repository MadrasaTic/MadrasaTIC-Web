<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Position;

class MembersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // dd(User::all());
        $members = User::all()->load(['userInformation.position']);
        // $members = User::all()->load(['userInformation.position']);
        // dd($members->toArray());
        $roles = Role::all();
        $positions = Position::all();

        return View('members', compact('members', 'roles', 'positions'));
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

        $this->validate($request, [
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $roles = Role::all();

        $user = new User();
        $user->name = $request['first_name'].' '.$request['last_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['new_password']);
        $user->save();

        $user->attachRole($request['role_id']);

        $userInformation = new UserInformation();
        $userInformation->first_name = $request['first_name'];
        $userInformation->last_name = $request['last_name'];
        $userInformation->phone_number = $request['phone_number'];
        $userInformation->user_id = $user->id;
        $userInformation->position_id = $request['position_id'];
        $userInformation->save();
        // $user->role = $request['role'];

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id)->load(['userInformation.position']);

        return $user;
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        $user = User::findOrFail($id)->load(['userInformation.position']);
        if ($request['role_id'] != '' && $request['role_id'] != null) {
            foreach ($user->getRoles() as $key => $value) {
                $user->detachRole($value);
            }
            $user->attachRole($request['role_id']);
        }
        if ($request['position_id'] != '' && $request['position_id'] != null) {
            $user->userInformation->position_id = $request['position_id'];
        }

        $user->email = $request['email'];
        $user->userInformation->first_name = $request['first_name'];
        $user->userInformation->last_name = $request['last_name'];
        if ($request['new_password'] != '' && $request['new_password'] != null
        && $request['confirm_password'] != '' && $request['confirm_password'] != null) {
            $this->validate($request, [
                'new_password' => 'required|same:confirm_password',
                'confirm_password' => 'required',
            ]);
            dd($user);

            // $hashedPassword = $request['password'];
            $users = User::find($user->id);
            $users->password = bcrypt($request['new_password']);
            User::where( 'id' , $user->id)->update( array( 'password' =>  $users->password));
            // session()->flash('success','password updated successfully');
            // return redirect()->back();
        }
        $user->userInformation->save();
        $user->save();

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->acivated = !$user->acivated;
        $user->save();
        return redirect()->back();
        // dd($user);
    }
}
