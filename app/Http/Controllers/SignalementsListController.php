<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\SignalementVersionControl;
use App\Models\Signalement;
use App\Models\Category;
use App\Models\State;

class SignalementsListController extends Controller
{   
    
    public function show()
    {   
        $categories = Category::all();
        $signs = Signalement::all();
        $states = State::all();
        $signals = SignalementVersionControl::orderBy('created_at','DESC')
                                             ->orderBy('priority_id','DESC')
                                             ->get();

        return view('signalments', compact('signals','signs','categories','states'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $signals = SignalementVersionControl::whereHas('signalement', function($q) use ($search)
        {   
            $q->where('title', 'LIKE','%'.$search.'%');

        })->get();
        if ($signals) {
            return view('signalments' , compact('signals'));
        } else {
            $signals = SignalementVersionControl::whereHas('category', function($q) use ($search)
            {   
                $q->where('name', 'LIKE','%'.$search.'%');

            })->get();  
        }

        return view('signalments' , compact('signals'));
        //dd($signals);
        //$signals = SignalementVersionControl::with('SignalementVersionControl.signalement')->where('id',$signalement_id)->where('title',$search);
        
    }

    public function filter(Request $resquest){

    }
}
