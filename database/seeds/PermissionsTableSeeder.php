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
            [
                'name' => 'role-read',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
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
            [
                'name' => 'content-read',
                'display_name' => 'Content listing',
                'description' => 'See only listing of content'
            ],
            [
                'name' => 'content-create',
                'display_name' => 'Create content',
                'description' => 'Create new content'
            ],
            [
                'name' => 'content-edit',
                'display_name' => 'Edit content',
                'description' => 'Edit content'
            ],
            [
                'name' => 'content-delete',
                'display_name' => 'Delete content',
                'description' => 'Delete content'
            ]
        ];
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        
    }

}
