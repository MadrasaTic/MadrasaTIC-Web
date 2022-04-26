<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use Illuminate\Http\Request;

class BlocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bloc::all();
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
        $bloc = new Bloc();
        $bloc->name = $request->get('name');
        $bloc->annexe_id = $request->get('annexe_id');
        $bloc->save();
        return $bloc;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bloc  $bloc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloc = Bloc::find($id);
        return $bloc;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bloc  $bloc
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloc $bloc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bloc  $bloc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bloc = Bloc::find($id);
        if($bloc) {
            $bloc->name = $request->get('name');
            $bloc->save();
            return $bloc;
        } else {
            return "bloc not found";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloc  $bloc
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $bloc = Bloc::find($id);
        if($bloc) {
            $bloc->name = $request->get('name');
            $bloc->delete();
            return "bloc deleted";
        } else {
            return "bloc not found";
        }
    }
}
