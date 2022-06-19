<?php

namespace App\Http\Controllers\Configure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    protected $permissionModel;

    public function __construct()
    {
        $this->permissionModel = Config::get('laratrust.models.permission');
    }

    public function index()
    {
        return View::make('permissions', [
            'permissions' => $this->permissionModel::get(),
        ]);
    }

    public function create()
    {
        return View::make('laratrust::panel.edit', [
            'model' => null,
            'permissions' => null,
            'type' => 'permission',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permission = $this->permissionModel::create($data);


        Session::flash('laratrust-success', 'Permission created successfully');
        return redirect(route('permissions'));
    }

    public function edit($id)
    {
        $permissions = $this->permissionModel::findOrFail($id);

        return $permissions;
    }


    public function update(Request $request, $id)
    {
        $permission = $this->permissionModel::findOrFail($id);

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permission->update($data);

        Session::flash('laratrust-success', 'Permission updated successfully');
        return redirect(route('permissions'));
    }
    public function delete($id){

        $permission = $this->permissionModel::findOrFail($id);
        $permission->delete();
        return redirect('permissions');
    }
}
