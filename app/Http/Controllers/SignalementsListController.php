<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\SignalementVersionControl;
use App\Models\Signalement;
use App\Models\Category;
use App\Models\State;
use App\Models\Annexe;
use App\Models\Bloc;
use App\Models\Room;

class SignalementsListController extends Controller
{   
    
    public function show()
    {   
        $categories = Category::all();
        $signs = Signalement::all();
        $states = State::all();
        $signals = SignalementVersionControl::orderByDesc('updated_at')
                                             ->orderBy('priority_id','ASC') 
                                             ->get();

        return view('signalments', compact('signals','signs','categories','states'));
    }
    
    public function search(Request $request){

        $categories = Category::all();
        $signs = Signalement::all();
        $states = State::all();
        // Get the search value from the request
        $search = $request->input('search');
        $signals =$search;
        // Search in the title and body columns from the posts table
        
        if ($signals) {
            $signals = SignalementVersionControl::whereHas('signalement', function($q) use ($search)
            {   
                $q->where('title', 'LIKE','%'.$search.'%');

            })->get();
        
            return view('signalments' , compact('signals','signs','categories','states'));
        }else{
            $signals = SignalementVersionControl::whereHas('category', function($q) use ($search)
            {   
                $q->where('name', 'LIKE','%'.$search.'%');

            })->get();  
            return view('signalments', compact('signals','signs','categories','states'));
        }
        
        
        //dd($signals);
        //$signals = SignalementVersionControl::with('SignalementVersionControl.signalement')->where('id',$signalement_id)->where('title',$search);
        
    }

    
}
