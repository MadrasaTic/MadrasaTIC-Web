<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnoncesController extends Controller
{
    public function index(){
        $annonces = Annonce::all();

        return view('annonces' , compact('annonces'));
    }

    public function show($id)
    {
        $annonces= Annonce::findOrFail($id);

        return $annonces;
    }


     public function delete($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce['public'] = 0;
        $annonce->save();

        return redirect('annonces');

    }
}
