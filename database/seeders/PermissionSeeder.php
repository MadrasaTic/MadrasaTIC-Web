<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {

        $permissons = [
            [
                'name' => 'RolesController@index',
                'display_name' => 'Role Index',
                'description' => 'Role Index'
            ],
            [
                'name' => 'RolesController@store',
                'display_name' => 'Create Role',
                'description' => 'Create Role'
            ],
            [
                'name' => 'RolesController@show',
                'display_name' => 'Show Role',
                'description' => 'Show Role'
            ],
            [
                'name' => 'RolesController@update',
                'display_name' => 'Update Role',
                'description' => 'Update Role'
            ],
            [
                'name' => 'RolesController@delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],

            [
                'name' => 'PermissionsController@index',
                'display_name' => 'Permission Index',
                'description' => 'Permission Index'
            ],
            [
                'name' => 'PermissionsController@store',
                'display_name' => 'Create Permission',
                'description' => 'Create Permission'
            ],
            [
                'name' => 'PermissionsController@show',
                'display_name' => 'Show Permission',
                'description' => 'Show Permission'
            ],
            [
                'name' => 'PermissionsController@update',
                'display_name' => 'Update Permission',
                'description' => 'Update Permission'
            ],
            [
                'name' => 'PermissionsController@delete',
                'display_name' => 'Delete Permission',
                'description' => 'Delete Permission'
            ],

            [
                'name' => 'MembersController@index',
                'display_name' => 'Member Index',
                'description' => 'Member Index'
            ],
            [
                'name' => 'MembersController@store',
                'display_name' => 'Create Member',
                'description' => 'Create Member'
            ],
            [
                'name' => 'MembersController@show',
                'display_name' => 'Show Member',
                'description' => 'Show Member'
            ],
            [
                'name' => 'MembersController@update',
                'display_name' => 'Update Member',
                'description' => 'Update Member'
            ],
            [
                'name' => 'MembersController@delete',
                'display_name' => 'Delete Member',
                'description' => 'Delete Member'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description']
            ]);

            Role::first()->attachPermission($permission);
            User::first()->attachPermission($permission);
        }
    }
}
