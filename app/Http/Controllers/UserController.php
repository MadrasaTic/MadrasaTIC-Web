<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user()->load(['userInformation.position']);
        // dd($user->toArray());
        return view('profile', [
            'request' => $request,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
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

    public function updatePassword(Request $request)
    {
        dd($request);
        $this->validate($request, [

            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);



        $hashedPassword = Auth::user()->password;

        if (\Hash::check($request->oldpassword , $hashedPassword )) {

            if (!\Hash::check($request->newpassword , $hashedPassword)) {

                $users =admin::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                admin::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

                session()->flash('message','password updated successfully');
                return redirect()->back();
            } else {
                    session()->flash('message','new password can not be the old password!');
                    return redirect()->back();
            }

        } else {
            session()->flash('message','old password doesnt matched ');
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
