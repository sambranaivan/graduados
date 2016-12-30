<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('graduados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->date('fecha_nacimiento');
            $table->enum('tipo_documento', [
                'dni',
                'cedula',
                'libreta_civica',
                'libreta_enrolamiento',
                'pasaporte'
            ]);
            $table->integer('documento')->unique();
            $table->string('cuil');
            $table->string('lugar_nacimiento');
            $table->string('sexo');
            $table->string('nacionalidad');
            $table->string('estado_civil');
            $table->string('correo_electronico')->unique();
            $table->string('correo_electronico_alt');
            $table->string('telefono_movil');
            $table->string('telefono_fijo');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('domicilio');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('pais');
            $table->string('anio_ingreso');
            $table->string('anio_egreso');
            $table->string('titulo');
            $table->string('plan_nombre');
            $table->string('plan_anio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('users');
    }
}
