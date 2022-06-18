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

        $dt = Carbon::now();
        $annonces= Annonce::whereRaw('"'.$dt.'" between `beginDate` and `endDate`')
                        ->get();
            return view('annonces' , compact('annonces'));

        //$annonces->beginTime->addDays(10);
        //dd($annonces);





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

    public function edit($id)
    {
        $data = Annonce::find($id);
        return view('modifyAnnonce' , compact('data'));
    }

    public function update(Request $request)
    {
        $data = Annonce::findOrFail($request->id);
        $data->user_id = $request->user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->beginDate = $request->beginDate;
        $data->endDate = $request->endDate;
        if ($request->hasfile('image')) {
            $image = $request->file('image');

                $path = $image->getClientOriginalName();
                $image->move(public_path().'/images/annonces', $path);
                $data->image= $path;
            }
        //dd($data);
        $data->save();

        return redirect('annonces');
    }
    public function delete($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();

        return redirect('annonces');

    }
}
