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
        
        DB::table('users')->insert([
            'name' => 'k3x4',
            'email' => 'xkexagias@gmail.com',
            'password' => bcrypt('121212'),
	    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'cckexa@gmail.com',
            'password' => bcrypt('121212'),
	    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
