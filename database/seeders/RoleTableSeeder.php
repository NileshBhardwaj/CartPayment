<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'editor']);
        $role = Role::create(['name' => 'user']);
    }
}
