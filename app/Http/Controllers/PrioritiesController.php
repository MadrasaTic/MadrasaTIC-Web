<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\Models\Priority;
use App\Models\Category;

class PrioritiesController extends Controller
{
    protected $priorityModel;

    public function show()
    {    
        $priorities = Priority::all();
        $categories = Category::all();
        // dd($priorities);
        return view('signalmentsPriority',compact('priorities', 'categories'));
    }

    public function Add(Request $request)
    {
        $priority= new Priority;
        $priority->name = $request->name;
        $priority->category_id = $request->category_id;
        $priority->weight = $request->weight;
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
        $priority->category_id = $request->category_id;
        $priority->weight = $request->weight;
        $priority->save();
        
        return redirect('signalmentsPriority');
    }

    public function delete($id){
        
        $priority = Priority::findOrFail($id);
        $priority->delete();
        return redirect('signalmentsPriority');
    }
}
