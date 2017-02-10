<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt("4dM1NUNNE"),
            'phone' => "12345678",
        ]);
    }
}
