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
            'password' => bcrypt("carlos2018"),
            'phone' => "12345678",
        ]);
    }
}
