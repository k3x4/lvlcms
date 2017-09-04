<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User has access to all system functionality.'
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'Control over all content on the site, but restricts the access to website settings.'
            ],
            [
                'name' => 'author',
                'display_name' => 'Author',
                'description' => 'Manage only the content they have created.'
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'Provides solely the ability to log in to the front end interface.'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
        
    }

}
