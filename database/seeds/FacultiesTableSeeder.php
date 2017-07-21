<?php

use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\City;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $city = City::where('name', 'Corrientes')->first();

        Faculty::create([
        	'name' => 'Ciencias Exactas',
        	'address' => '9 de Julio',
        	'phone' => '444444',
        	'email' => 'ciencias@exactas.com',
        	'city_id' => $city->city_id,
        ]);
    }
}
