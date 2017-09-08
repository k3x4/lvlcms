<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name','=','admin')->get()->first();
        
        $userRead = Permission::where('name','=','user-read')->get()->first();
        $userCreate = Permission::where('name','=','user-create')->get()->first();
        $userEdit = Permission::where('name','=','user-edit')->get()->first();
        $userDelete = Permission::where('name','=','user-delete')->get()->first();

        $admin->attachPermission($userRead);
        $admin->attachPermission($userCreate);
        $admin->attachPermission($userEdit);
        $admin->attachPermission($userDelete);
    }
}
