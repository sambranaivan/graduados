<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGraduateCareersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('graduate_careers', function (Blueprint $table) {
			$table->increments('graduatecareer_id');
			$table->string('plan_name', 150);
			$table->char('plan_year', 4);
			$table->string('resolution', 100);
			$table->integer('graduate_id')->unsigned();
			$table->foreign('graduate_id')->references('graduate_id')->on('graduates');
			$table->integer('career_id')->unsigned();
			$table->foreign('career_id')->references('career_id')->on('careers');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('graduate_careers');
	}
}
