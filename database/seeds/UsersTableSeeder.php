<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
         * 
         */
        
        DB::table('users')->insert([
            'name' => 'k3x4',
            //'role_id' => 0,
            'email' => 'xkexagias@gmail.com',
            'password' => bcrypt('121212'),
	    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'user',
            //'role_id' => 1,
            'email' => 'cckexa@gmail.com',
            'password' => bcrypt('121212'),
	    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        /*
        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });
         * 
         */
    }
}
