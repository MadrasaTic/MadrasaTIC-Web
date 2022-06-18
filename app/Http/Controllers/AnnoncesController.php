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

    public function index() {
        setlocale(LC_ALL, 'fr_FR');
        Carbon::setLocale('fr');
        $now = Carbon::now();
        $annonces= Annonce::get();
        foreach($annonces as $key => $value) {
            $value->annoncestate = (strtotime($value->beginDate) <= strtotime($now) && strtotime($value->endDate) >= strtotime($now));
        }
        return view('annonces' , compact('annonces'));
    }

    public function create() {
        return view('addAnnonce');
    }

    public function show($id)
    {
        Carbon::setLocale('fr');
        $annonces= Annonce::findOrFail($id);
        return $annonces;
    }

    public function Add(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'beginDate' => 'required',
            'endDate' => 'required',
            'image' => 'required|file|max:2048',
        ]);
        $annonce= new Annonce();
        $annonce->user_id = $request->user()->id;
        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->beginDate = $request->beginDate;
        $annonce->endDate = $request->endDate;
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('images/annonces', 'public');
            $annonce->image = $path;
        } else {
            $annonce->image = "";
        }
        $annonce->save();
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
            $path = $request->file('image')->store('images/annonces', 'public');
            $data->image = $path;
        }
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
