<?php

namespace App\Http\Controllers\Configure;

use Laratrust\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Permission;


class RolesController extends Controller
{
    protected $rolesModel;
    protected $permissionModel;

    public function __construct()
    {
        $this->rolesModel = Config::get('laratrust.models.role');
        $this->permissionModel = Config::get('laratrust.models.permission');
    }

    public function index()
    {
                $permissions = Permission::all();
        $roles = $this->rolesModel::withCount('permissions')->simplePaginate(20);
        return View('roles', compact('roles', 'permissions'));
    }

    public function create()
    {
        return View::make('laratrust::panel.edit', [
            'model' => null,
            'permissions' => $this->permissionModel::all(['id', 'name']),
            'type' => 'role',
        ]);
    }

    public function show(Request $request, $id)
    {
        $role = $this->rolesModel::query()
            ->with('permissions:id,name,display_name')
            ->findOrFail($id);

        return View::make('laratrust::panel.roles.show', ['role' => $role]);
    }

    public function store(Request $request)
    {
        /*$data = $request->validate([
            'name' => 'required|string|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);*/
        $data = [
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description'),

        ];

        $role = $this->rolesModel::create($data);
        $role->syncPermissions($request->get('permissions') ?? []);

        Session::flash('success', 'Rôle créé avec succès');
        return redirect()->back();
    }

    public function edit($id)
    {
        $role = $this->rolesModel::query()
            ->with('permissions:id')
            ->findOrFail($id);
        return $role;
        if (!Helper::roleIsEditable($role)) {
            Session::flash('error', 'Le rôle n\'est pas modifiable');
            return redirect()->back();
        }

        $permissions = $this->permissionModel::all(['id', 'name', 'display_name'])
            ->map(function ($permission) use ($role) {
                $permission->assigned = $role->permissions
                    ->pluck('id')
                    ->contains($permission->id);

                return $permission;
            });

        return View::make('laratrust::panel.edit', [
            'model' => $role,
            'permissions' => $permissions,
            'type' => 'role',
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = $this->rolesModel::findOrFail($id);

        if (!Helper::roleIsEditable($role)) {
            Session::flash('error', 'Le rôle n\'est pas modifiable');
            return redirect()->back();
        }

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $role->update($data);
        $role->syncPermissions($request->get('permissions') ?? []);

        Session::flash('success', 'Rôle mis à jour avec succès');
        return redirect(route('configure.roles.index'));
    }

    public function delete($id)
    {
        $usersAssignedToRole = DB::table(Config::get('laratrust.tables.role_user'))
            ->where(Config::get('laratrust.foreign_keys.role'), $id)
            ->count();
        $role = $this->rolesModel::findOrFail($id);

        if (!Helper::roleIsDeletable($role)) {
            Session::flash('error', 'Le rôle ne peut pas être supprimé');
            return redirect()->back();
        }

        if ($usersAssignedToRole > 0) {
            Session::flash('warning', 'Le rôle est attaché à un ou plusieurs utilisateurs. Il ne peut pas être supprimé');
        } else {
            Session::flash('success', 'Rôle supprimé avec succès');
            $this->rolesModel::destroy($id);
        }

        return redirect(route('configure.roles.index'));
    }
}


