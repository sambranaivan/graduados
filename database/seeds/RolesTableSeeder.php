<?php

use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ]);
        Role::create([
                'name' => 'Publicador',
                'slug' => 'publicador',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ]);
        Role::create([
                'name' => 'Revisor',
                'slug' => 'revisor',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ]);
        Role::create([
                'name' => 'Empresa',
                'slug' => 'empresa',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ]);
    }
        
}