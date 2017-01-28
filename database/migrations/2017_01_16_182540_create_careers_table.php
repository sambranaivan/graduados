<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCareersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('careers', function (Blueprint $table) {
			$table->increments('career_id');
			$table->string('name', 150);
			$table->integer('faculty_id')->unsigned();
			$table->foreign('faculty_id')->references('faculty_id')->on('faculties');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('careers');
	}
}
