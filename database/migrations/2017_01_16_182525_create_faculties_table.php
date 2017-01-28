<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacultiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('faculties', function (Blueprint $table) {
			$table->increments('faculty_id');
			$table->string('name', 100);
			$table->string('address', 100);
			$table->string('phone', 100);
			$table->string('email', 100);
			$table->integer('city_id')->unsigned();
			$table->foreign('city_id')->references('city_id')->on('cities');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('faculties');
	}
}
