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
                'name' => 'node-read',
                'display_name' => 'Node listing',
                'description' => 'See only listing of nodes'
            ],
            [
                'name' => 'node-create',
                'display_name' => 'Create node',
                'description' => 'Create new node'
            ],
            [
                'name' => 'node-edit',
                'display_name' => 'Edit node',
                'description' => 'Edit node'
            ],
            [
                'name' => 'node-delete',
                'display_name' => 'Delete node',
                'description' => 'Delete node'
            ]
        ];
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        
    }

}
