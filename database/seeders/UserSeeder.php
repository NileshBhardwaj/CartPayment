<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('users')->insert([
			'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        //Added 2nd admin user seeders
        DB::table('users')->insert([
			'id' => '2',
            'name' => 'admin',
            'email' => 'nilesh@csgroupchd.com',
            'password' => Hash::make('password'),
        ]);
        //Added 3rd admin user seeders
        DB::table('users')->insert([
			'id' => '3',
            'name' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
        ]);

		DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '1',
        ]);
        //Assign admin role id to 2nd admin user
        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '2',
        ]);	
        //Assign admin role id to 3rd admin user
        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '3',
        ]);	
    }
}
