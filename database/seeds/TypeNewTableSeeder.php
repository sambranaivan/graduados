<?php

use Illuminate\Database\Seeder;
use App\Models\TypeNew;

class TypeNewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TypeNew::create([
             'description' => 'General',
             
        ]);
        TypeNew::create([
             'description' => 'Cursos',
             
        ]);
        TypeNew::create([
             'description' => 'Ofertas Laborales',
             
        ]);
        
    }
}