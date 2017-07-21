<?php

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Province;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$province = Province::where('name', 'Corrientes')->first();

        City::create([
            'name' => "Corrientes",
            'province_id' => $province->province_id,
        ]);
    }
}
