<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use Carbon\Carbon;

class AnnoncesController extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(){
        
        $annonces = Annonce::all();
        //$annonces->beginTime->addDays(10); 
        //dd($annonces);        
        return view('annonces' , compact('annonces'));
        
        
        
        
    }

    public function show($id)
    {
        $annonces= Annonce::findOrFail($id);

        return $annonces;
    }

    public function Add(Request $request)
    {
        
        $annonce= new Annonce;
        $annonce->user_id = $request->user()->id;
        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->beginDate = $request->beginDate;
        $annonce->endDate = $request->endDate;
        $annonce['public'] = 1;
        
          
        if ($request->hasfile('image')) {
              $image = $request->file('image');
  
                  $path = $image->getClientOriginalName();
                  $image->move(public_path().'/images/annonces', $path);
                  $annonce->image= $path;                    
              }
           
           $annonce->save();
           //dd($annonce);
          return redirect('annonces');
    }
           
    
    
    public function delete($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();

        return redirect('annonces');

    }
}
