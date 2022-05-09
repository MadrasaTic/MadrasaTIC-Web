<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\Models\Service;
use App\Models\User;

class ServicesController extends Controller
{
    protected $serviceModel;

    public function show()
    {
        $services = Service::with('responsable')->simplePaginate(25);
        $users = User::all();
        return view('departments',compact('services', 'users'));
    }

    public function Add(Request $request)
    {
        $service= new Service;
        $service->name = $request->name;
        $service->parent_id = $request->parent_id;
        $service->description = $request->description;
        // dd($request, $service);
        $service->save();

        return redirect('departments');
    }

    public function edit($id)
    {
        $services = Service::findOrFail($id);

        return $services;
    }


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->name = $request->name;
        $service->parent_id = $request->parent_id;
        $service->description = $request->description;
        $service->save();

        return redirect('departments');
    }

    public function delete($id){

        $service = Service::findOrFail($id);
        $service->delete();
        return redirect('departments');
    }

    /*public function delete ($id) {
        $service = Service::find($id);
        $service->acivated = !$service->activated;
        $service->save();
        return redirect()->back();
    }*/
}
