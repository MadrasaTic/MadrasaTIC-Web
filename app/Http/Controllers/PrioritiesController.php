<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\Models\Priority;

class PrioritiesController extends Controller
{
    protected $priorityModel;

    public function show()
    {    
        $data=Priority::simplePaginate(25);
        return view('signalmentsPriority',['priorities'=>$data]);
    }

    public function Add(Request $request)
    {
        $priority= new Priority;
        $priority->name = $request->name;
        $priority->save();

        return redirect('signalmentsPriority');
    }

    public function edit($id)
    {
        $priorities= Priority::findOrFail($id);

        return $priorities;
    }


    public function update(Request $request, $id)
    {
        $priority = Priority::findOrFail($id);
        
        $priority->name = $request->name;
        $priority->save();
        
        return redirect('signalmentsPriority');
    }

    public function delete($id){
        
        $priority = Priority::findOrFail($id);
        $priority->delete();
        return redirect('signalmentsPriority');
    }
}
