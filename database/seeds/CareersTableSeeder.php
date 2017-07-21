<?php

use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\Career;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faculty = Faculty::where('name', 'Ciencias Exactas')->first();

        Career::create([
        	'name' => 'Ciencias Exactas',
        	'faculty_id' => $faculty->faculty_id,
        ]);
    }
}
