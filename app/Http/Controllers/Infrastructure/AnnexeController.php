<?php

namespace App\Http\Controllers\Infrastructure;

use App\Models\Annexe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnexeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Annexe::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $annexe = new Annexe();
        $annexe->name = $request->get('name');
        $annexe->save();
        return $annexe;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annexe = Annexe::find($id);
        return $annexe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function edit(Annexe $annexe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annexe = Annexe::find($id);
        if($annexe) {
            $annexe->name = $request->get('name');
            $annexe->save();
            return $annexe;
        } else {
            return "annexe not found";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annexe  $annexe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annexe = Annexe::find($id);
        if($annexe) {
            $annexe->delete();
            return "annexe deleted";
        } else {
            return "annexe not found";
        }
    }
}
