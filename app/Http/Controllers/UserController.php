<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric',
        ]);

        $user = $request->user()->load(['userInformation.position']);
        $user->userInformation->first_name = $request->first_name;
        $user->userInformation->last_name = $request->last_name;
        $user->userInformation->phone_number = $request->phone_number;
        $user->userInformation->save();
        return \Redirect::route('profile')->with('message', 'Vos informations ont été mit a jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'previous_password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $hashedPassword = auth()->user()->password;
        if (Hash::check($request->previous_password , $hashedPassword )) {
            if (!Hash::check($request->new_password , $hashedPassword)) {
                $users = User::find(\Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                User::where( 'id' , \Auth::user()->id)->update( array( 'password' =>  $users->password));
                session()->flash('success','Votre mot de passe a été modifié avec succès');
                return redirect()->back();
            } else {
                session()->flash('error',"Le nouveau mot de passe ne peut pas être identique l'ancien mot de passe !");
                return redirect()->back();
            }
        } else {
            session()->flash('error','Votre ancien mot de passe est incorrect');
            return redirect()->back();
        }
    }

    public function uploadProfilePicture(Request $request)
    {
        $this->validate($request, [
            'profilePicture' => 'required|file|max:2048',
        ]);
        try {
            $filename = \Auth::user()->id . '---' . $request->profilePicture->getClientOriginalName();
            $request->profilePicture->storeAs('images',$filename,'public');
            Auth()->user()->userInformation()->update(['avatar_path'=>$filename]);
            session()->flash('success','Votre photo de profil a été changée avec succès');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('error','Une erreur est survenue');
            return redirect()->back();
        }
        // }
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
