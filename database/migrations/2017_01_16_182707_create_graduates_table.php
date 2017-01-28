<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGraduatesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('graduates', function (Blueprint $table) {
			$table->increments('graduate_id');
			$table->string('name', 150);
			$table->dateTime('birth_date');
			$table->enum('document_type', ['DNI', 'Libreta de Enrolamiento', 'Libreta Cívica', 'Pasaporte del país de origen', 'Cédula de Identidad del Mercosur', 'Pat. de Nacimiento-Identidad', 'Otros']);
			$table->string('document', 100);
			$table->string('cuil', 100);
			$table->integer('city_id')->unsigned();
			$table->foreign('city_id')->references('city_id')->on('cities');
			$table->enum('sex', ['Femenino', 'Masculino', 'Otros']);
			$table->integer('maritalstatus_id')->unsigned();
			$table->foreign('maritalstatus_id')->references('maritalstatus_id')->on('marital_statuses');
			$table->string('main_email', 100);
			$table->string('alternate_email', 100)->nullable();
			$table->string('mobile_phone', 30);
			$table->string('phone', 30)->nullable();
			$table->string('twiter', 250)->nullable();
			$table->string('facebook', 250)->nullable();
			$table->string('linkedin', 250)->nullable();
			$table->string('place_of_residence', 150);
			$table->integer('city_of_residence');
			$table->char('year_of_income', 4);
			$table->char('senior_year', 4);
			$table->string('title', 150);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('graduates');
	}
}
