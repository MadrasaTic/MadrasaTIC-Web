<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalementVersionControl;
use App\Models\Signalement;
use App\Models\Category;
use App\Models\State;
use App\Models\Annexe;
use App\Models\Bloc;
use App\Models\Room;

class SignalmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $states = State::all();
        $signalments = SignalementVersionControl::all();

        return view('signalments', compact('signalments','categories','states'));
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
        $categories = Category::all();
        $states = State::all();
        $signalments = SignalementVersionControl::all();

        return view('signalments', compact('signalments','categories','states'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signalement = Signalement::findOrFail($id);

        return $signalement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $signalment = SignalementVersionControl::findOrFail($id);
        dd($request, $id);
        return view('signalments', compact('signalment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
