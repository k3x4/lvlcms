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
                'name' => 'post-read',
                'display_name' => 'Display Notebook Listing',
                'description' => 'See only Listing Of Notebook'
            ],
            [
                'name' => 'post-create',
                'display_name' => 'Create Notebook',
                'description' => 'Create New Notebook'
            ],
            [
                'name' => 'post-edit',
                'display_name' => 'Edit Notebook',
                'description' => 'Edit Notebook'
            ],
            [
                'name' => 'post-delete',
                'display_name' => 'Delete Notebook',
                'description' => 'Delete Notebook'
            ]
        ];
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        
    }

}
