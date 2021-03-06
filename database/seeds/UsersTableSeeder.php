<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        	[
        		'name' => 'Administrator',
        		'email' => 'admin@gmail.com',
        		'password' => bcrypt('admin@admin'),
        		'verified' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user@user'),
                'verified' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ]);
    }
}
