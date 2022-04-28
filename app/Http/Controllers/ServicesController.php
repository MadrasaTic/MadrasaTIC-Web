<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\Models\Service;

class ServicesController extends Controller
{
    protected $serviceModel;

    public function show()
    {    
        $data=Service::simplePaginate(25);
        return view('departments',['services'=>$data]);
    }

    public function Add(Request $request)
    {
        $service= new Service;
        $service->name = $request->name;
        $service->responsable = $request->responsable;
        $service->description = $request->description;
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
        $service->responsable = $request->responsable;
        $service->description = $request->description;
        $service->save();
        
        return redirect('departments');
    }

    public function delete($id){
        
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect('departments');
    }

 
}
