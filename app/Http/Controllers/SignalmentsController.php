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
use App\Models\User;

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
        $signalments = Signalement::with(['annexe', 'bloc', 'room', 'creator', 'lastSignalementVC'])->get();

        $users_count = User::count();
        $signalements_count = count($signalments);
        $non_traite_count = Signalement::whereHas('lastSignalementVC', function ($query) use ($states) {
            return $query->where('state_id', '=', $states[0]->id);
        })->count();
        $encours_count = Signalement::whereHas('lastSignalementVC', function ($query) use ($states) {
            return $query->where('state_id', '=', $states[1]->id);
        })->count();
        $traite_count = $signalements_count - $encours_count - $non_traite_count;
        // dd($traite_count);
        $stats = [
            "traite_count" => $traite_count * 100 / $signalements_count,
            "signalements_count" => $signalements_count,
            "non_traite_count" => $non_traite_count * 100 / $signalements_count,
            "annonce_count" => 0,
            "encours_count" => $encours_count * 100 / $signalements_count,
            "users_count" => $users_count,
        ];

        return view('signalments', compact('signalments','categories','states','stats'));
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
        $signalments = Signalement::with(['annexe', 'bloc', 'room', 'creator', 'lastSignalementVC'])->get();

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
        $this->validate(request(), [
        'file1' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        ]);

        $signalment = SignalementVersionControl::findOrFail($id);
        $signalment['category_id'] = $request['category'];
        $signalment['state_id'] = $request['state'];
        $filename = $id."-".$request['file1']->getClientOriginalName();
        $signalment['file_path'] = $filename;
        $request->file1->storeAs('public/files', $filename);
        $signalment->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $signalment = SignalementVersionControl::findOrFail($id);
        $signalment->signalement['published'] = 0;
        $signalment->signalement->save();

        return redirect()->back();
    }
}
