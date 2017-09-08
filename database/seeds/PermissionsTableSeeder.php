<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [
            
            // USER PERMISSIONS
            [
                'name' => 'user-read',
                'display_name' => 'Display Users',
                'description' => 'Display Users'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            
            
            // ROLE PERMISSIONS
            [
                'name' => 'role-read',
                'display_name' => 'Display Roles',
                'description' => 'Display Roles'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            
            
            // PRODUCT PERMISSIONS            
            [
                'name' => 'product-read',
                'display_name' => 'Listing',
                'description' => 'See only listing'
            ],
            [
                'name' => 'product-create',
                'display_name' => 'Create',
                'description' => 'Create'
            ],
            [
                'name' => 'product-edit',
                'display_name' => 'Edit',
                'description' => 'Edit'
            ],
            [
                'name' => 'product-delete',
                'display_name' => 'Delete',
                'description' => 'Delete'
            ]
            
            
        ];
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        
    }

}
