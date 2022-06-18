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
    public function displayJson() {
        $signalements = Signalement::with(['annexe', 'bloc', 'room', 'creator', 'lastSignalementVC', 'report'])->get();
        return $signalements;
    }
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
        return view("addSignalement");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $signalement = new Signalement();
        $signalement->title = $request->get('title');
        $signalement->description = $request->get('description');

        $signalement->annexe_id = $request->get('annexe_id');
        $signalement->bloc_id = $request->get('bloc_id');
        $signalement->room_id = $request->get('room_id');
        $signalement->infrastructure_type = $request->get('infrastructure_type');

        $signalement->creator_id = $request->user()->id;

        $signalement->published = $request->get('published');
        $signalement->save();

        $signalementVersionControl = new SignalementVersionControl();
        $signalementVersionControl->signalement_id = $signalement->id;
        $signalementVersionControl->state_id = State::first()->id;
        $signalementVersionControl->category_id = $request->get('category_id');

        if ($request->hasFile('attachement')) {
            $path = $request->file('attachement')->store('images/signalements', 'public');
            $signalementVersionControl->attachement = $path;
        } else {
            $signalementVersionControl->attachement = "";
        }
        $signalementVersionControl->service_id = Category::find($request->get('category_id'))->services->id;
        $signalementVersionControl->priority_id = Category::find($request->get('category_id'))->priority->id;
        $signalementVersionControl->updated_by = $request->user()->id;
        $signalementVersionControl->save();


        $signalement->isSaved = ($signalement->isSaved()->where('users.id', $user_id)->first()) ? true : false;
        if ($signalement->isReacted()->where('users.id', $user_id)->first()) {
            $signalement->isReacted = $signalement->isReacted()->where('users.id', $user_id)->first()->pivot->reaction_type;
        } else {
            $signalement->isReacted = null;
        }
        return $signalement;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $signalement = Signalement::findOrFail($id);

        return $signalement;
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
        $signalement = Signalement::find($id);
        if ($signalement == null) {
            return "signalment not found";
        }
        $signalement->load(['lastSignalementVC']);
        $signalementVersionControl = $signalement->lastSignalementVC;
        $newVC = $signalementVersionControl->replicate();
        if ($request->has('category_id') && $request->get('category_id') != null
            && $newVC->category_id != $request->get('category_id')) {
            $newVC->category_id = $request->get('category_id');
            $newVC->service_id = Category::find($request->get('category_id'))->services->id;
            $newVC->priority_id = Category::find($request->get('category_id'))->priority->id;
            $newVC->updated_by = $request->user()->id;
            $newVC->save();
        }

        if ($request->has('state_id') && $request->get('state_id') != null
            && $newVC->state_id != $request->get('state_id')) {
            $newVC->state_id = $request->get('state_id');
            $newVC->updated_by = $request->user()->id;
            $newVC->save();
        }
        return $signalement;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $signalement = Signalement::find($id);
        $deleted = $signalement->delete();
        return $deleted;
    }
}
