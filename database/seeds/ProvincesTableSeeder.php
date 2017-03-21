<?php

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::where('name', 'Argentina')->first();

        Province::create([
            'name' => "Corrientes",
            'country_id' => $country->country_id,
        ]);
    }
}
