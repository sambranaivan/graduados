<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvincesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('provinces', function (Blueprint $table) {
			$table->increments('province_id');
			$table->string('name', 100);
			$table->integer('country_id')->unsigned();
			$table->foreign('country_id')->references('country_id')->on('countries');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('provinces');
	}
}
