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
        
        $roleRead = Permission::where('name','=','role-read')->get()->first();
        $roleCreate = Permission::where('name','=','role-create')->get()->first();
        $roleEdit = Permission::where('name','=','role-edit')->get()->first();
        $roleDelete = Permission::where('name','=','role-delete')->get()->first();
        
        $productRead = Permission::where('name','=','product-read')->get()->first();
        $productCreate = Permission::where('name','=','product-create')->get()->first();
        $productEdit = Permission::where('name','=','product-edit')->get()->first();
        $productDelete = Permission::where('name','=','product-delete')->get()->first();
        
        $mediaSizeRead = Permission::where('name','=','mediasize-read')->get()->first();
        $mediaSizeCreate = Permission::where('name','=','mediasize-create')->get()->first();
        $mediaSizeEdit = Permission::where('name','=','mediasize-edit')->get()->first();
        $mediaSizeDelete = Permission::where('name','=','mediasize-delete')->get()->first();
        
        $mediaRead = Permission::where('name','=','media-read')->get()->first();
        $mediaCreate = Permission::where('name','=','media-create')->get()->first();
        $mediaEdit = Permission::where('name','=','media-edit')->get()->first();
        $mediaDelete = Permission::where('name','=','media-delete')->get()->first();
        
        $categoryRead = Permission::where('name','=','category-read')->get()->first();
        $categoryCreate = Permission::where('name','=','category-create')->get()->first();
        $categoryEdit = Permission::where('name','=','category-edit')->get()->first();
        $categoryDelete = Permission::where('name','=','category-delete')->get()->first();

        $admin->attachPermission($userRead);
        $admin->attachPermission($userCreate);
        $admin->attachPermission($userEdit);
        $admin->attachPermission($userDelete);
        
        $admin->attachPermission($roleRead);
        $admin->attachPermission($roleCreate);
        $admin->attachPermission($roleEdit);
        $admin->attachPermission($roleDelete);
        
        $admin->attachPermission($productRead);
        $admin->attachPermission($productCreate);
        $admin->attachPermission($productEdit);
        $admin->attachPermission($productDelete);
        
        $admin->attachPermission($mediaSizeRead);
        $admin->attachPermission($mediaSizeCreate);
        $admin->attachPermission($mediaSizeEdit);
        $admin->attachPermission($mediaSizeDelete);
        
        $admin->attachPermission($mediaRead);
        $admin->attachPermission($mediaCreate);
        $admin->attachPermission($mediaEdit);
        $admin->attachPermission($mediaDelete);
        
        $admin->attachPermission($categoryRead);
        $admin->attachPermission($categoryCreate);
        $admin->attachPermission($categoryEdit);
        $admin->attachPermission($categoryDelete);
        
    }
}
